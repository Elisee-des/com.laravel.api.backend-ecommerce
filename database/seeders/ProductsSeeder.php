<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'product_name' => "Women's Short Sleeve Shirt",
                'product_category' => "women's clothing",
                'product_description' => "Double layered placket, collar and cuff for a more structured look. This shirt combines timeless style with comfort. Stretch, opaque fabric.",
                'product_price' => 14.99,
                'product_stock' => 0,
                'product_image' => 'https://fakestoreapi.com/img/61pHAEJ4NML._AC_UX679_.jpg',
            ],
            [
                'product_name' => "WD 4TB Gaming Drive Works with Playstation 4 Portable External Hard Drive",
                'product_category' => "electronics",
                'product_description' => "Expand your PS4 gaming experience, Play anywhere",
                'product_price' => 114.55,
                'product_stock' => 0,
                'product_image' => 'https://fakestoreapi.com/img/61mtL65D4cL._AC_SX679_.jpg',
            ],
            [
                'product_name' => "Acrylic Coffin False Nail Tips",
                'product_category' => "women's clothing",
                'product_description' => "Diy nail art: great for nails salon,professional nail artists diy nail art,acrylic nails, gel nails, false nails, nail tips, press on nails, nail art stickers, nail decor, nail decorations",
                'product_price' => 7.99,
                'product_stock' => 0,
                'product_image' => 'https://fakestoreapi.com/img/81XH0e8fefL._AC_UL640_QL65_ML3_.jpg',
            ],
            [
                'product_name' => "SanDisk SSD PLUS 1TB Internal SSD - SATA III 6 Gb/s",
                'product_category' => "electronics",
                'product_description' => "Easy upgrade for faster boot-up, shutdown, application load and response (As compared to 5400 RPM SATA 2.5” hard drive. Based on published specifications and internal benchmarking tests using PCMark vantage scores.)",
                'product_price' => 109,
                'product_stock' => 0,
                'product_image' => 'https://fakestoreapi.com/img/61U7T1koQqL._AC_SX679_.jpg',
            ],
            [
                'product_name' => "USB-C to USB 3.0 Adapter (3-Pack)",
                'product_category' => "electronics",
                'product_description' => "USB C to USB adapter connects type-c devices (MacBook Pro, Chromebook Pixel, Galaxy Note 7, etc.) to USB-A devices (laptops, hard drives, power banks, wall/car chargers, etc.)",
                'product_price' => 9.85,
                'product_stock' => 0,
                'product_image' => 'https://fakestoreapi.com/img/61IBBVJvSDL._AC_SY879_.jpg',
            ],
            [
                'product_name' => "BIYLACLESEN Women's 3-in-1 Snowboard Jacket Winter Coats",
                'product_category' => "women's clothing",
                'product_description' => "Note: The Jackets are US standard size, Please choose size as your usual wear",
                'product_price' => 56.99,
                'product_stock' => 0,
                'product_image' => 'https://fakestoreapi.com/img/51Y5NI-I5jL._AC_UX679_.jpg',
            ],
            [
                'product_name' => "Samsung Galaxy Tab A 8.0\"",
                'product_category' => "electronics",
                'product_description' => "1280 x 800 Resolution Display, Quad-Core Processor, 16GB Storage, 1.5GB RAM, micro-SD Card Slot (Up to 256GB), Headphone Jack, 5MP Rear Camera, 2MP Front Camera, Android 7.0 OS",
                'product_price' => 149.99,
                'product_stock' => 0,
                'product_image' => 'https://fakestoreapi.com/img/81Zt42ioCgL._AC_SX679_.jpg',
            ],
            [
                'product_name' => "Columbia Casual Jacket for Men, Cotton, Zippered",
                'product_category' => "men's clothing",
                'product_description' => "Great for Casual and Sport Wear, Going Out, School, Vacation or outdoor activities.",
                'product_price' => 59,
                'product_stock' => 0,
                'product_image' => 'https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg',
            ],
            // Ajoutez d'autres enregistrements ici...
        ]);
    }
}
