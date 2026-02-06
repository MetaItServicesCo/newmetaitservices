<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CaseStudy;
use App\Models\Industry;
use App\Models\Portfolio;
use App\Models\Services;
use App\Models\SubService;
use Illuminate\Support\Facades\Log;

class SitemapController extends Controller
{
    /**
     * Generate XML sitemap
     */
    public function sitemap()
    {
        try {
            $urls = [];

            // Static pages
            $staticPages = [
                ['url' => route('home'), 'priority' => '1.0', 'changefreq' => 'weekly'],
                ['url' => route('services'), 'priority' => '0.9', 'changefreq' => 'weekly'],
                ['url' => route('about.page'), 'priority' => '0.8', 'changefreq' => 'monthly'],
                ['url' => route('industries'), 'priority' => '0.9', 'changefreq' => 'weekly'],
                ['url' => route('blogs.page'), 'priority' => '0.9', 'changefreq' => 'daily'],
                ['url' => route('portfolio'), 'priority' => '0.8', 'changefreq' => 'weekly'],
                ['url' => route('case-study.page'), 'priority' => '0.8', 'changefreq' => 'weekly'],
                ['url' => route('contact'), 'priority' => '0.7', 'changefreq' => 'monthly'],
                ['url' => route('contact.policy'), 'priority' => '0.5', 'changefreq' => 'yearly'],
                ['url' => route('contact.term'), 'priority' => '0.5', 'changefreq' => 'yearly'],
                ['url' => route('contact.disclaimer'), 'priority' => '0.5', 'changefreq' => 'yearly'],
            ];

            $urls = array_merge($urls, $staticPages);

            // Dynamic Services
            $services = Services::where('is_active', 1)->get();
            foreach ($services as $service) {
                $urls[] = [
                    'url' => route('service', $service->slug),
                    'priority' => '0.8',
                    'changefreq' => 'weekly',
                    'lastmod' => $service->updated_at->toAtomString(),
                ];

                // Sub Services
                $subServices = SubService::where('service_id', $service->id)
                    ->where('is_active', 1)
                    ->get();

                foreach ($subServices as $subService) {
                    $urls[] = [
                        'url' => route('service.subservice', [
                            'serviceSlug' => $service->slug,
                            'subServiceSlug' => $subService->slug,
                        ]),
                        'priority' => '0.7',
                        'changefreq' => 'weekly',
                        'lastmod' => $subService->updated_at->toAtomString(),
                    ];
                }
            }

            // Dynamic Industries
            $industries = Industry::get();
            foreach ($industries as $industry) {
                $urls[] = [
                    'url' => route('industry.detail', $industry->slug),
                    'priority' => '0.8',
                    'changefreq' => 'weekly',
                    'lastmod' => $industry->updated_at->toAtomString(),
                ];
            }

            // Dynamic Blogs
            $blogs = Blog::where('is_active', 1)->get();
            foreach ($blogs as $blog) {
                $urls[] = [
                    'url' => route('blog.detail', $blog->slug),
                    'priority' => '0.7',
                    'changefreq' => 'weekly',
                    'lastmod' => $blog->updated_at->toAtomString(),
                ];
            }

            return response()->view('sitemap', ['urls' => $urls], 200, [
                'Content-Type' => 'application/xml; charset=utf-8',
            ]);
        } catch (\Exception $e) {
            Log::error('Sitemap generation error: '.$e->getMessage());

            return response()->view('sitemap-error', [], 500, [
                'Content-Type' => 'application/xml; charset=utf-8',
            ]);
        }
    }

    /**
     * Generate sitemap index for large sites
     */
    public function sitemapIndex()
    {
        try {
            $sitemaps = [
                ['url' => route('sitemap'), 'lastmod' => now()->toAtomString()],
            ];

            return response()->view('sitemap-index', ['sitemaps' => $sitemaps], 200, [
                'Content-Type' => 'application/xml; charset=utf-8',
            ]);
        } catch (\Exception $e) {
            Log::error('Sitemap index generation error: '.$e->getMessage());

            return response()->view('sitemap-error', [], 500, [
                'Content-Type' => 'application/xml; charset=utf-8',
            ]);
        }
    }
}
