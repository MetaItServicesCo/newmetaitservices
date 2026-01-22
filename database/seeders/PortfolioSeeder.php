<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'category_id' => 1,
                'title' => 'E-commerce Website',
                'slug' => 'e-commerce-website',
                'sub_title' => 'Modern online shopping platform',
                'description' => 'A comprehensive e-commerce solution with advanced features.',
                'thumbnail' => null,
                'gallery_images' => [],
                'image_alt' => 'E-commerce website screenshot',
                'is_active' => true,
            ],
            [
                'category_id' => 2,
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'sub_title' => 'Cross-platform mobile applications',
                'description' => 'Developing high-quality mobile apps for iOS and Android.',
                'thumbnail' => null,
                'gallery_images' => [],
                'image_alt' => 'Mobile app interface',
                'is_active' => true,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
