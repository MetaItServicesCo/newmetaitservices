<?php

namespace App\Helpers;

class PageHelper
{
    public static function labels(): array
    {
        $labels = [
            'landing' => 'Landing Page',
            'services' => 'Services Main Page',
            'about' => 'About Us',
            'industry' => 'Industry Main Page',
            'blog' => 'Blog Main Page',
            'portfolio' => 'Portfolio Main Page',
            'case_study' => 'Case Study Main Page',
            'privacy_policy' => 'Privacy Policy',
            'terms_and_conditions' => 'Terms and Conditions',
            'disclaimer' => 'Disclaimer',
        ];

        ksort($labels); // ASC
        return $labels;
    }
}
