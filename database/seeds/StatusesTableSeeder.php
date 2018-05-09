<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Needs Update', 'In Progress', 'Ready For Use', 'Marked For Deletion'];

        foreach ($statuses as $statusItem) {
            $status = new Status();
            $status->status_code = $statusItem;
            $status->save();
        }
    }
}
