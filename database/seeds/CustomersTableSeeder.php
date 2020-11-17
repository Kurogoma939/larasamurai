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
            'birthday' => '1989/03/03',
            'post_code' => '390-1401',
            'pref_id' => '1',
            'city_id' => '1',
            'address' => '長野県松本市波田5511-1',
            'tel' => '0263-92-9999',
            'mobile' => '080-1233-4456',
            'email' => 'kan.sss.939@gmail.com',
            'remarks' => '偽物の百獣の王です。',

        ];
        DB::table('customers')->insert($customers);

        $customers = [
            'id' => '2',
            'last_name' => '奥原',
            'first_name' => '優子',
            'last_kana' => 'おくはら',
            'first_kana' => 'ゆうこ',
            'gender' => '2',
            'birthday' => '1989-12-30',
            //日付については、1999-09-09のようにハイフン表記を使わないといけない。
            'post_code' => '143-5678',
            'pref_id' => '24',
            'city_id' => '73',
            'address' => '三重県津市山手234-23',
            'tel' => '06-2345-3456',
            'mobile' => '090-9876-5432',
            'email' => 'yuko.oku@gmail.com',
            'remarks' => '一般女性です。',

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
