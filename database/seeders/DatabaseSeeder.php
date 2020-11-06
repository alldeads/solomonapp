<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
    	]);

    	for ($i=1; $i < 10; $i++) { 
    		\App\Models\User::factory(2)->create([
    			'sponsor_id' => $i
    		]);
    	}
        
    }
}
