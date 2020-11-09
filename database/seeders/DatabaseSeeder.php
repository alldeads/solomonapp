<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Product;
use App\Models\PaymentMethod;
use App\Models\Address;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$user = User::create([
    		'first_name' => "Solomon",
    		'last_name'  => "Solomon",
    		'email' => 'contact@solomonapp.com',
    		'username' => 'solomon',
    		'phone' => '123456',
    		'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
            'status' => 'active'
    	]);

        Address::create([
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address'  => '',
            'state'  => '',
            'city'  => '',
            'zip'  => ''
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

            Address::create([
                'user_id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address'  => '',
                'state'  => '',
                'city'  => '',
                'zip'  => ''
            ]);
    	}

        PaymentMethod::create([
            'name' => 'Cash On Delivery',
            'abbr' => 'cod',
        ]);

        PaymentMethod::create([
            'name' => 'Paypal',
            'abbr' => 'paypal',
            'status' => 'inactive'
        ]);

        PaymentMethod::create([
            'name' => 'Gcash',
            'abbr' => 'gcash',
            'status' => 'inactive'
        ]);

        Product::create([
            'name'           => 'Charcoal Soap',
            'description'    => '',
            'original_price' => 150,
            'members_price'  => 90,
            'avatar'         => 'products/charcoal.jpg'
        ]);

        Product::create([
            'name'           => 'Calamansi Soap',
            'description'    => '',
            'original_price' => 150,
            'members_price'  => 90,
            'avatar'         => 'products/calamansi.jpg'
        ]);

        Product::create([
            'name'           => 'Carrot Soap',
            'description'    => '',
            'original_price' => 150,
            'members_price'  => 90,
            'avatar'         => 'products/carrot.jpg'
        ]);

        Product::create([
            'name'           => 'Tomato Soap',
            'description'    => '',
            'original_price' => 150,
            'members_price'  => 90,
            'avatar'         => 'products/tomato.jpg'
        ]);

        Product::create([
            'name'           => 'Singkamas Soap',
            'description'    => '',
            'original_price' => 150,
            'members_price'  => 90,
            'avatar'         => 'products/singkamas.jpg'
        ]);

        Product::create([
            'name'           => 'Banana Soap',
            'description'    => '',
            'original_price' => 150,
            'members_price'  => 90,
            'avatar'         => 'products/banana.jpg'
        ]);

        Product::create([
            'name'           => 'Turmeric Oil',
            'description'    => '',
            'original_price' => 150,
            'members_price'  => 125,
            'avatar'         => 'products/turmeric.jpg'
        ]);

        Product::create([
            'name'           => 'Eucalyptus Oil',
            'description'    => '',
            'original_price' => 150,
            'members_price'  => 125,
            'avatar'         => 'products/eucalyptus.jpg'
        ]);

        Item::create([
            'name'    => 'Romoss Power Bank',
            'points'  => 10,
            'avatar'  => 'items/romoss.jpg'
        ]);

        Item::create([
            'name'    => '100 Pesos Cash',
            'points'  => 20,
            'avatar'  => 'items/100peso.jpg'
        ]);

        Item::create([
            'name'    => 'Smart Watch',
            'points'  => 30,
            'avatar'  => 'items/smart-watch.jpg'
        ]);

        Item::create([
            'name'    => 'Smart Watch',
            'points'  => 30,
            'avatar'  => 'items/smart-watch.jpg'
        ]);

        Item::create([
            'name'    => '5kl Premium Rice(Ganador)',
            'points'  => 50,
            'avatar'  => 'items/5klganador.jpg'
        ]);

        Item::create([
            'name'    => 'Samsung Keystone SMB 1053',
            'points'  => 100,
            'avatar'  => 'items/samsungkeystone.jpg'
        ]);

        Item::create([
            'name'    => 'Half Sack Rice + 500 Pesos Cash',
            'points'  => 250,
            'avatar'  => 'items/ganador-25kg.jpg'
        ]);

        Item::create([
            'name'    => 'Half Sack Rice + 500 Pesos Cash',
            'points'  => 250,
            'avatar'  => 'items/ganador-25kg.jpg'
        ]);

        Item::create([
            'name'    => 'Brand New Samsung A10s',
            'points'  => 800,
            'avatar'  => 'items/samsung-a10.jpg'
        ]);

        Item::create([
            'name'    => 'Brand New HP Laptop',
            'points'  => 1750,
            'avatar'  => 'items/hplaptop.jpg'
        ]);

        Item::create([
            'name'    => '35,000 Pesos Cash',
            'points'  => 5000,
            'avatar'  => 'items/35pesos.jpg'
        ]);

        Item::create([
            'name'    => 'Suzuki Smash 115 or Honda Beat 110i',
            'points'  => 8000,
            'avatar'  => 'items/motor.jpg'
        ]);

        Item::create([
            'name'    => '80,000  Pesos Cash',
            'points'  => 10000,
            'avatar'  => 'items/eightythousand.jpg'
        ]);
    }
}
