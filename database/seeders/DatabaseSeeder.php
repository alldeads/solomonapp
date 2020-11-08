<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'first_name' => "Solomon",
    		'last_name'  => "Solomon",
    		'email' => 'contact@solomonapp.com',
    		'username' => 'solomon',
    		'phone' => '123456',
    		'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
            'status' => 'active'
    	]);

    	for ($i=1; $i < 10; $i++) { 
    		\App\Models\User::factory(2)->create([
    			'sponsor_id' => $i,
    			'available_points' => 0,
                'status' => 'active'
    		]);

    		$user = User::find($i);

    		$user->direct_recruits = 2;
    		$user->save();
    	}

        Product::create([
            'name'           => 'Charcoal Soap',
            'description'    => '',
            'original_price' => 180,
            'avatar'         => asset('products/charcoal.jpg')
        ]);

        Product::create([
            'name'           => 'Calamansi Soap',
            'description'    => '',
            'original_price' => 180,
            'avatar'         => asset('products/charcoal.jpg')
        ]);

        Product::create([
            'name'           => 'Carrot Soap',
            'description'    => '',
            'original_price' => 180,
            'avatar'         => asset('products/charcoal.jpg')
        ]);

        Product::create([
            'name'           => 'Tomato Soap',
            'description'    => '',
            'original_price' => 180,
            'avatar'         => asset('products/charcoal.jpg')
        ]);

        Product::create([
            'name'           => 'Singkamas Soap',
            'description'    => '',
            'original_price' => 180,
            'avatar'         => asset('products/charcoal.jpg')
        ]);

        Product::create([
            'name'           => 'Banana Soap',
            'description'    => '',
            'original_price' => 180,
            'avatar'         => asset('products/charcoal.jpg')
        ]);
    }
}
