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
        factory(Customer::class, 10)->create();
    }


    /*
        factory使いたいなら以下の通り。
        public function run()
        {
            factory(Customer::class,10)->create();
        }
        起動しなければコマンドで一回クリアすると良さそう。

    */
}
