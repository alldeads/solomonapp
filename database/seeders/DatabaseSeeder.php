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
        \App\Models\Voucher::factory(1000)->create();

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
            'payment' => true
        ]);

        PaymentMethod::create([
            'name' => 'Paypal',
            'abbr' => 'paypal',
            'status' => 'inactive',
            'payment' => true
        ]);

        PaymentMethod::create([
            'name' => 'Gcash',
            'abbr' => 'gcash',
            'status' => 'inactive',
            'payment' => true
        ]);

        PaymentMethod::create([
            'name' => 'Fund Transfer',
            'abbr' => 'ft',
            'status' => 'active',
            'transaction' => true,
            'payment' => true
        ]);

        PaymentMethod::create([
            'name' => 'Bank Deposit',
            'abbr' => 'deposit',
            'status' => 'active',
            'payment' => true
        ]);

        PaymentMethod::create([
            'name' => 'Cash',
            'abbr' => 'cash',
            'status' => 'active',
            'transaction' => true
        ]);

        PaymentMethod::create([
            'name' => 'Cheque',
            'abbr' => 'cheque',
            'status' => 'active',
            'transaction' => true
        ]);

        PaymentMethod::create([
            'name' => 'M Lhuillier',
            'abbr' => 'mlhuillier',
            'status' => 'active',
            'transaction' => true
        ]);

        PaymentMethod::create([
            'name' => 'Palawan',
            'abbr' => 'palawan',
            'status' => 'inactive',
            'transaction' => true
        ]);

        Product::create([
            'name'           => 'Charcoal Soap',
            'description'    => '',
            'original_price' => 125,
            'members_price'  => 100,
            'avatar'         => 'products/charcoal.jpg'
        ]);

        Product::create([
            'name'           => 'Calamansi Soap',
            'description'    => '',
            'original_price' => 125,
            'members_price'  => 100,
            'avatar'         => 'products/calamansi.jpg'
        ]);

        Product::create([
            'name'           => 'Carrot Soap',
            'description'    => '',
            'original_price' => 125,
            'members_price'  => 100,
            'avatar'         => 'products/carrot.jpg'
        ]);

        Product::create([
            'name'           => 'Tomato Soap',
            'description'    => '',
            'original_price' => 125,
            'members_price'  => 100,
            'avatar'         => 'products/tomato.jpg'
        ]);

        Product::create([
            'name'           => 'Peppermint Soap',
            'description'    => '',
            'original_price' => 125,
            'members_price'  => 100,
            'avatar'         => 'products/peppermint.jpg'
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

        Product::create([
            'name'           => 'Scent of Queen',
            'description'    => '',
            'original_price' => 499,
            'members_price'  => 299,
            'avatar'         => 'products/scent_of_queen.jpg'
        ]);

        Product::create([
            'name'           => 'Scent of King',
            'description'    => '',
            'original_price' => 499,
            'members_price'  => 299,
            'avatar'         => 'products/scent_of_king.jpg'
        ]);

        Item::create([
            'name'    => 'Univeral Power Bank',
            'points'  => 15,
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
            'name'    => '2,500 Pesos Cash',
            'points'  => 400,
            'avatar'  => 'items/twothousand.jpg'
        ]);

        Item::create([
            'name'    => 'Oppo F1s Selfie Expert',
            'points'  => 600,
            'avatar'  => 'items/oppo.jpg'
        ]);

        Item::create([
            'name'    => '10,000 Pesos Cash',
            'points'  => 1500,
            'avatar'  => 'items/tenthousand.jpg'
        ]);

        Item::create([
            'name'    => 'Brand New HP Laptop',
            'points'  => 2000,
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
