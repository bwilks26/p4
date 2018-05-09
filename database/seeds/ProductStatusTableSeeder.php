<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Status;

class ProductStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            102486 => ['Needs Update'],
            101183 => ['Ready For Use']
        ];

        foreach ($products as $item_number => $statusCodes) {
            $product = Product::where('item_number', 'like', $item_number)->first();

            foreach ($statusCodes as $statusCode) {
                $status = Status::where('status_code', 'like', $statusCode)->first();
                $product->statuses()->save($status);
            }
        }
    }
}
