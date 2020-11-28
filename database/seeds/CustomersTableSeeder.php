<?php

use App\Models\Customer;
use Illuminate\Database\Seeder;

/**
 * Class CustomersTableSeeder
 */
class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Customer::class, 100)->create();
    }

}
