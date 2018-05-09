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
        # Define starting data for status codes mapped to products
        $products = [
            #Engines
            102486 => ['Needs Update', 'In Progress'],
            101183 => ['Ready For Use'],
            102290 => ['Needs Update', 'In Progress'],
            101138 => ['Marked For Deletion'],
            101238 => ['Marked For Deletion'],
            102289 => ['In Progress'],
            #Coolers
            102400 => ['Ready For Use'],
            102340 => ['Marked For Deletion'],
            102365 => ['Needs Update', 'In Progress'],
            101253 => ['Needs Update', 'In Progress'],
            102322 => ['Ready For Use'],
            #Compressors
            101187 => ['Ready For Use'],
            102280 => ['Ready For Use'],
            102279 => ['Ready For Use'],
            102281 => ['Needs Update', 'In Progress'],
            102278 => ['Marked For Deletion'],
            #Panels
            102405 => ['Ready For Use'],
            100211 => ['Needs Update', 'In Progress'],
            100401 => ['Needs Update', 'In Progress'],
            102478 => ['Marked For Deletion'],
            103180 => ['Marked For Deletion'],
            100838 => ['Ready For Use'],
            #Motors
            103297 => ['Marked For Deletion'],
            102477 => ['Needs Update', 'In Progress'],
            102742 => ['Ready For Use'],
            102295 => ['Ready For Use'],
            103070 => ['Ready For Use']

        ];

        # Fill in status codes/products starting relations into database
        foreach ($products as $item_number => $statusCodes) {
            $product = Product::where('item_number', 'like', $item_number)->first();

            foreach ($statusCodes as $statusCode) {
                $status = Status::where('status_code', 'like', $statusCode)->first();
                $product->statuses()->save($status);
            }
        }
    }
}
