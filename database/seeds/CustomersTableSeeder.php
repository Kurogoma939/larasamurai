<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $param = [
            'id' => '1',
            'last_name' => '武井',
            'first_name' => '壮',
            'last_kana' => 'たけい',
            'first_kana' => 'そう',
            'gender' => '1',
            'birthday' => '1999/03/03',
            'post_code' => '390-1401',
            'pref_id' => '1',
            'address' => '長野県松本市波田5511-1',
            'tel' => '0263-92-9999',
            'mobile' => '080-1233-4456',
            'email' => 'kan.sss.939@gmail.com',
            'remarks' => '偽物の百獣の王です。',
            'created_at' => '2020/10/15 21:12:34',
            'updated_at' => '2020/10/16 21:11:11',
        ];
        DB::table('customers')->insert($param);

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
