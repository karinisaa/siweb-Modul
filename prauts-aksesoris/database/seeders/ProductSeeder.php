<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {
    public function run(): void {
        // Ambil admin user (pastikan sudah ada)
        $admin = User::where('role', 'admin')->first();

        if (!$admin) {
            $admin = User::create([
                'name'     => 'Admin',
                'email'    => 'admin@aksesoris.com',
                'password' => bcrypt('password'),
                'role'     => 'admin',
            ]);
        }

        $products = [
            [
                'name'        => 'Gelang Bunga Rose Gold',
                'description' => 'Gelang cantik berbahan dasar alloy premium dengan desain bunga yang elegan. Cocok untuk tampilan sehari-hari maupun acara formal.',
                'price'       => 45000,
                'stock'       => 20,
                'categories'  => ['Gelang'],
            ],
            [
                'name'        => 'Kalung Mutiara Klasik',
                'description' => 'Kalung mutiara sintetis berkualitas tinggi dengan rantai emas. Memberikan kesan mewah dan anggun pada penampilanmu.',
                'price'       => 75000,
                'stock'       => 15,
                'categories'  => ['Kalung'],
            ],
            [
                'name'        => 'Anting Kristal Warna-warni',
                'description' => 'Anting dengan batu kristal warna-warni yang memantulkan cahaya. Ringan dan nyaman dipakai seharian.',
                'price'       => 35000,
                'stock'       => 30,
                'categories'  => ['Anting'],
            ],
            [
                'name'        => 'Cincin Silver Minimalis',
                'description' => 'Cincin silver dengan desain minimalis dan modern. Bisa dipakai di berbagai jari dan cocok untuk semua outfit.',
                'price'       => 55000,
                'stock'       => 25,
                'categories'  => ['Cincin'],
            ],
            [
                'name'        => 'Bros Kupu-kupu Pastel',
                'description' => 'Bros berbentuk kupu-kupu dengan warna pastel yang lucu dan feminin. Terbuat dari bahan akrilik ringan berkualitas.',
                'price'       => 28000,
                'stock'       => 40,
                'categories'  => ['Bros'],
            ],
            [
                'name'        => 'Jepit Rambut Pita Satin',
                'description' => 'Jepit rambut dengan pita satin yang lembut dan elegan. Tersedia dalam berbagai warna pastel yang menggemaskan.',
                'price'       => 22000,
                'stock'       => 50,
                'categories'  => ['Jepit Rambut'],
            ],
            [
                'name'        => 'Set Gelang & Kalung Matching',
                'description' => 'Set perhiasan yang terdiri dari gelang dan kalung dengan desain serasi. Sempurna sebagai hadiah untuk orang tersayang.',
                'price'       => 110000,
                'stock'       => 10,
                'categories'  => ['Gelang', 'Kalung'],
            ],
            [
                'name'        => 'Anting Hoop Pearl',
                'description' => 'Anting hoop dengan aksen mutiara kecil yang anggun. Desain timeless yang cocok untuk berbagai kesempatan.',
                'price'       => 48000,
                'stock'       => 18,
                'categories'  => ['Anting'],
            ],
        ];

        foreach ($products as $data) {
            $product = Product::create([
                'user_id'     => $admin->id,
                'name'        => $data['name'],
                'description' => $data['description'],
                'price'       => $data['price'],
                'stock'       => $data['stock'],
            ]);

            // Attach categories
            $catIds = [];
            foreach ($data['categories'] as $catName) {
                $cat = Category::firstOrCreate(['name' => $catName]);
                $catIds[] = $cat->id;
            }
            $product->categories()->sync($catIds);
        }
    }
}