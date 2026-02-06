<?php

namespace Database\Seeders;

use App\Helpers\PageHelper;
use App\Models\SeoMeta;
use Illuminate\Database\Seeder;

class SeoMetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = PageHelper::labels();

        $seoData = [
            'landing' => [
                'meta_title' => 'Digital Marketing Agency | Meta IT Services',
                'meta_description' => 'Transform your business with data-driven digital marketing strategies. SEO, PPC, social media, and content marketing services.',
                'meta_keywords' => 'digital marketing, SEO services, PPC advertising, social media marketing, content marketing',
                'is_active' => 1,
            ],
            'services' => [
                'meta_title' => 'Digital Marketing Services | Meta IT Services',
                'meta_description' => 'Explore our comprehensive digital marketing services including SEO, PPC, social media, email marketing, and more.',
                'meta_keywords' => 'digital marketing services, SEO, PPC, social media marketing, email marketing, content strategy',
                'is_active' => 1,
            ],
            'about' => [
                'meta_title' => 'About Us | Meta IT Services',
                'meta_description' => 'Learn about Meta IT Services - your trusted partner in digital marketing. Discover our mission, values, and expertise.',
                'meta_keywords' => 'about us, digital marketing agency, company profile, team, expertise',
                'is_active' => 1,
            ],
            'industry' => [
                'meta_title' => 'Industries We Serve | Meta IT Services',
                'meta_description' => 'We provide tailored digital marketing solutions for various industries including healthcare, finance, retail, and more.',
                'meta_keywords' => 'industries, digital marketing solutions, healthcare marketing, finance marketing, retail marketing',
                'is_active' => 1,
            ],
            'blog' => [
                'meta_title' => 'Digital Marketing Blog | Meta IT Services',
                'meta_description' => 'Read our latest articles on digital marketing trends, SEO tips, social media strategies, and industry insights.',
                'meta_keywords' => 'digital marketing blog, SEO tips, marketing trends, social media strategies, industry insights',
                'is_active' => 1,
            ],
            'portfolio' => [
                'meta_title' => 'Our Portfolio | Meta IT Services',
                'meta_description' => 'Explore our successful digital marketing projects and case studies showcasing our expertise and results.',
                'meta_keywords' => 'portfolio, case studies, successful projects, digital marketing results, client testimonials',
                'is_active' => 1,
            ],
            'case_study' => [
                'meta_title' => 'Case Studies | Meta IT Services',
                'meta_description' => 'Discover how we helped businesses achieve their digital marketing goals through our proven strategies and solutions.',
                'meta_keywords' => 'case studies, success stories, digital marketing results, client success, ROI improvement',
                'is_active' => 1,
            ],
            'privacy_policy' => [
                'meta_title' => 'Privacy Policy | Meta IT Services',
                'meta_description' => 'Read our privacy policy to understand how we collect, use, and protect your personal information.',
                'meta_keywords' => 'privacy policy, data protection, personal information, privacy rights',
                'is_active' => 1,
            ],
            'terms_and_conditions' => [
                'meta_title' => 'Terms and Conditions | Meta IT Services',
                'meta_description' => 'Review our terms and conditions for using our website and services.',
                'meta_keywords' => 'terms and conditions, terms of service, legal terms, service agreement',
                'is_active' => 1,
            ],
            'disclaimer' => [
                'meta_title' => 'Disclaimer | Meta IT Services',
                'meta_description' => 'Read our disclaimer regarding the information and services provided on our website.',
                'meta_keywords' => 'disclaimer, legal disclaimer, website disclaimer, liability',
                'is_active' => 1,
            ],
        ];

        foreach ($pages as $pageKey => $pageLabel) {
            // Check if SEO meta already exists for this page
            $exists = SeoMeta::where('page_name', $pageKey)->exists();

            if (!$exists && isset($seoData[$pageKey])) {
                SeoMeta::create([
                    'page_name' => $pageKey,
                    'meta_title' => $seoData[$pageKey]['meta_title'],
                    'meta_description' => $seoData[$pageKey]['meta_description'],
                    'meta_keywords' => $seoData[$pageKey]['meta_keywords'],
                    'is_active' => $seoData[$pageKey]['is_active'],
                ]);
            }
        }
    }
}
