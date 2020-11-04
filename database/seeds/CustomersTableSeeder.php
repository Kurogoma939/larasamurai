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


        $customers = [
            'id' => '1',
            'last_name' => '武井',
            'first_name' => '壮',
            'last_kana' => 'たけい',
            'first_kana' => 'そう',
            'gender' => '1',
            'birthday' => '1999-03-03',
            //日付については、1999-09-09のようにハイフン表記を使わないといけない。
            'post_code' => '390-1401',
            'pref_id' => '1',
            'address' => '長野県松本市波田5511-1',
            'tel' => '0263-92-9999',
            'mobile' => '080-1233-4456',
            'email' => 'kan.sss.939@gmail.com',
            'remarks' => '偽物の百獣の王です。',

        ];
        DB::table('customers')->insert($customers);

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
