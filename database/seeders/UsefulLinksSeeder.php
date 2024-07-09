<?php

namespace Database\Seeders;

use App\Models\FooterUsefulLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsefulLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usefulLinks = [
            ['name' => 'Home', 'url' => '/'],
            ['name' => 'About', 'url' => '/about'],
            ['name' => 'Services', 'url' => '/services'],
            ['name' => 'Blog', 'url' => '/blogs'],
            ['name' => 'Portfolio', 'url' => '/portfolios'],
            ['name' => 'Gallery', 'url' => '/gallery'],
            ['name' => 'Contact', 'url' => '/contact'],
        ];

        FooterUsefulLink::insert($usefulLinks);
    }
}
