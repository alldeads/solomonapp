<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Inventory;
use App\Models\Product;

class InventoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        foreach ($products as $product) {
        	$product->inventory()->create([
	            'quantity'         => 0,
	            'threshold'        => 0,
	            'reserved'         => 0,
	            'minimum_purchase' => 100
        	]);
        }
    }
}
