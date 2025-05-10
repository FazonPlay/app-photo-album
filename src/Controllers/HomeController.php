<?php 

namespace App\Controllers;

use App\Models\User;

class HomeController extends BaseController {

    public function about() {
        return $this->render('global/about', [
            'title' => 'About Us - PhotoGallery'
        ]);
    }

    public function contact() {
        return $this->render('global/contact', [
            'title' => 'Contact Us - PhotoGallery'
        ]);
    }

    public function index() {
        return $this->render('home', [
            'title' => 'PhotoGallery - Capture Beautiful Moments',
            'heroTitle' => 'Capture Life\'s Beautiful Moments',
            'heroText' => 'Explore our curated collection of stunning photographs from talented artists around the world.',
            'currentYear' => date('Y'),
            'featuredPhotos' => [
                [
                    'imageUrl' => 'https://source.unsplash.com/random/600x400/?nature',
                    'title' => 'Beautiful Nature',
                    'description' => 'Mountains and lakes captured at sunset'
                ],
                [
                    'imageUrl' => 'https://source.unsplash.com/random/600x400/?portrait',
                    'title' => 'Portrait Photography',
                    'description' => 'Expressive portrait in natural light'
                ],
                [
                    'imageUrl' => 'https://source.unsplash.com/random/600x400/?city',
                    'title' => 'Urban Landscapes',
                    'description' => 'City skyline at night'
                ],
                [
                    'imageUrl' => 'https://source.unsplash.com/random/600x400/?architecture',
                    'title' => 'Modern Architecture',
                    'description' => 'Contemporary building designs'
                ],
                [
                    'imageUrl' => 'https://source.unsplash.com/random/600x400/?travel',
                    'title' => 'Travel Moments',
                    'description' => 'Exploring hidden gems around the world'
                ],
                [
                    'imageUrl' => 'https://source.unsplash.com/random/600x400/?wildlife',
                    'title' => 'Wildlife',
                    'description' => 'Animals in their natural habitat'
                ]
            ],
            'categories' => [
                [
                    'icon' => 'fa-mountain',
                    'name' => 'Landscapes',
                    'count' => 42
                ],
                [
                    'icon' => 'fa-user',
                    'name' => 'Portraits',
                    'count' => 38
                ],
                [
                    'icon' => 'fa-city',
                    'name' => 'Urban',
                    'count' => 27
                ],
                [
                    'icon' => 'fa-camera',
                    'name' => 'Abstract',
                    'count' => 15
                ]
            ]
        ]);
    }

}