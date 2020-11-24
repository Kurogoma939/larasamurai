<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */

    public function run()
    {
        $params = [
            ['id'=>'2','pref_id'=>'1','name'=>'札幌市'],
            ['id'=>'3','pref_id'=>'1','name'=>'中央区'],
            ['id'=>'4','pref_id'=>'1','name'=>'北区'],
            ['id'=>'5','pref_id'=>'2','name'=>'青森市'],
            ['id'=>'6','pref_id'=>'2','name'=>'弘前市'],
            ['id'=>'7','pref_id'=>'2','name'=>'八戸市'],
            ['id'=>'8','pref_id'=>'3','name'=>'盛岡市'],
            ['id'=>'9','pref_id'=>'3','name'=>'宮古市'],
            ['id'=>'10','pref_id'=>'3','name'=>'大船渡市'],
            ['id'=>'11','pref_id'=>'4','name'=>'仙台市'],
            ['id'=>'12','pref_id'=>'4','name'=>'青葉区'],
            ['id'=>'13','pref_id'=>'4','name'=>'宮城野区'],
            ['id'=>'14','pref_id'=>'5','name'=>'秋田市'],
            ['id'=>'15','pref_id'=>'5','name'=>'能代市'],
            ['id'=>'16','pref_id'=>'5','name'=>'横手市'],
            ['id'=>'17','pref_id'=>'6','name'=>'山形市'],
            ['id'=>'18','pref_id'=>'6','name'=>'米沢市'],
            ['id'=>'19','pref_id'=>'6','name'=>'鶴岡市'],
            ['id'=>'20','pref_id'=>'7','name'=>'福島市'],
            ['id'=>'21','pref_id'=>'7','name'=>'会津和歌山市'],
            ['id'=>'22','pref_id'=>'7','name'=>'郡山市'],
            ['id'=>'23','pref_id'=>'8','name'=>'水戸市'],
            ['id'=>'24','pref_id'=>'8','name'=>'日立市'],
            ['id'=>'25','pref_id'=>'8','name'=>'土浦市'],
            ['id'=>'26','pref_id'=>'9','name'=>'宇都宮市'],
            ['id'=>'27','pref_id'=>'9','name'=>'足利市'],
            ['id'=>'28','pref_id'=>'9','name'=>'栃木市'],
            ['id'=>'29','pref_id'=>'10','name'=>'前橋市'],
            ['id'=>'30','pref_id'=>'10','name'=>'高崎市'],
            ['id'=>'31','pref_id'=>'10','name'=>'桐生市'],
            ['id'=>'32','pref_id'=>'11','name'=>'さいたま市'],
            ['id'=>'33','pref_id'=>'11','name'=>'西区'],
            ['id'=>'34','pref_id'=>'11','name'=>'北区'],
            ['id'=>'35','pref_id'=>'12','name'=>'千葉市'],
            ['id'=>'36','pref_id'=>'12','name'=>'中央区'],
            ['id'=>'37','pref_id'=>'12','name'=>'花見川区'],
            ['id'=>'38','pref_id'=>'13','name'=>'千代田区'],
            ['id'=>'39','pref_id'=>'13','name'=>'中央区'],
            ['id'=>'40','pref_id'=>'13','name'=>'港区'],
            ['id'=>'41','pref_id'=>'14','name'=>'横浜市'],
            ['id'=>'42','pref_id'=>'14','name'=>'鶴見区'],
            ['id'=>'43','pref_id'=>'14','name'=>'神奈川区'],
            ['id'=>'44','pref_id'=>'15','name'=>'新潟市'],
            ['id'=>'45','pref_id'=>'15','name'=>'北区'],
            ['id'=>'46','pref_id'=>'15','name'=>'東区'],
            ['id'=>'47','pref_id'=>'16','name'=>'富山市'],
            ['id'=>'48','pref_id'=>'16','name'=>'高岡市'],
            ['id'=>'49','pref_id'=>'16','name'=>'魚津市'],
            ['id'=>'50','pref_id'=>'17','name'=>'福井市'],
            ['id'=>'51','pref_id'=>'17','name'=>'敦賀市'],
            ['id'=>'52','pref_id'=>'17','name'=>'小浜市'],
            ['id'=>'53','pref_id'=>'18','name'=>'福井市'],
            ['id'=>'54','pref_id'=>'18','name'=>'敦賀市'],
            ['id'=>'55','pref_id'=>'18','name'=>'小浜市'],
            ['id'=>'56','pref_id'=>'19','name'=>'甲府市'],
            ['id'=>'57','pref_id'=>'19','name'=>'富士吉野市'],
            ['id'=>'58','pref_id'=>'19','name'=>'都留市'],
            ['id'=>'59','pref_id'=>'20','name'=>'長野市'],
            ['id'=>'60','pref_id'=>'20','name'=>'松本市'],
            ['id'=>'61','pref_id'=>'20','name'=>'上田市'],
            ['id'=>'62','pref_id'=>'21','name'=>'岐阜市'],
            ['id'=>'63','pref_id'=>'21','name'=>'大垣市'],
            ['id'=>'64','pref_id'=>'21','name'=>'高山市'],
            ['id'=>'65','pref_id'=>'22','name'=>'静岡市'],
            ['id'=>'66','pref_id'=>'22','name'=>'葵区'],
            ['id'=>'67','pref_id'=>'22','name'=>'駿河区'],
            ['id'=>'68','pref_id'=>'23','name'=>'名古屋区'],
            ['id'=>'69','pref_id'=>'23','name'=>'千種区'],
            ['id'=>'70','pref_id'=>'23','name'=>'東区'],
            ['id'=>'71','pref_id'=>'24','name'=>'津市'],
            ['id'=>'72','pref_id'=>'24','name'=>'四日市市'],
            ['id'=>'73','pref_id'=>'24','name'=>'伊勢市'],
            ['id'=>'74','pref_id'=>'25','name'=>'大津市'],
            ['id'=>'75','pref_id'=>'25','name'=>'彦根市'],
            ['id'=>'76','pref_id'=>'25','name'=>'長浜市'],
            ['id'=>'77','pref_id'=>'26','name'=>'京都市'],
            ['id'=>'78','pref_id'=>'26','name'=>'北区'],
            ['id'=>'79','pref_id'=>'26','name'=>'上京区'],
            ['id'=>'80','pref_id'=>'27','name'=>'大阪市'],
            ['id'=>'81','pref_id'=>'27','name'=>'都島区'],
            ['id'=>'82','pref_id'=>'27','name'=>'福島区'],
            ['id'=>'83','pref_id'=>'28','name'=>'神戸市'],
            ['id'=>'84','pref_id'=>'28','name'=>'東灘区'],
            ['id'=>'85','pref_id'=>'28','name'=>'灘区'],
            ['id'=>'86','pref_id'=>'29','name'=>'奈良市'],
            ['id'=>'87','pref_id'=>'29','name'=>'大和高山市'],
            ['id'=>'88','pref_id'=>'29','name'=>'大和郡山市'],
            ['id'=>'89','pref_id'=>'30','name'=>'和歌山市'],
            ['id'=>'90','pref_id'=>'30','name'=>'海南市'],
            ['id'=>'91','pref_id'=>'30','name'=>'橋下市'],
            ['id'=>'92','pref_id'=>'31','name'=>'鳥取市'],
            ['id'=>'93','pref_id'=>'31','name'=>'米子市'],
            ['id'=>'94','pref_id'=>'31','name'=>'倉吉市'],
            ['id'=>'95','pref_id'=>'32','name'=>'松江市'],
            ['id'=>'96','pref_id'=>'32','name'=>'浜田市'],
            ['id'=>'97','pref_id'=>'32','name'=>'出雲市'],
            ['id'=>'98','pref_id'=>'33','name'=>'岡山市'],
            ['id'=>'99','pref_id'=>'33','name'=>'北区'],
            ['id'=>'100','pref_id'=>'33','name'=>'中区'],
            ['id'=>'101','pref_id'=>'34','name'=>'広島市'],
            ['id'=>'102','pref_id'=>'34','name'=>'中区'],
            ['id'=>'103','pref_id'=>'34','name'=>'東区'],
            ['id'=>'104','pref_id'=>'35','name'=>'下関市'],
            ['id'=>'105','pref_id'=>'35','name'=>'宇部市'],
            ['id'=>'106','pref_id'=>'35','name'=>'山口市'],
            ['id'=>'107','pref_id'=>'36','name'=>'徳島市'],
            ['id'=>'108','pref_id'=>'36','name'=>'鳴門市'],
            ['id'=>'109','pref_id'=>'36','name'=>'小松島市'],
            ['id'=>'110','pref_id'=>'37','name'=>'高松市'],
            ['id'=>'111','pref_id'=>'37','name'=>'丸亀市'],
            ['id'=>'112','pref_id'=>'37','name'=>'坂出市'],
            ['id'=>'113','pref_id'=>'38','name'=>'松山市'],
            ['id'=>'114','pref_id'=>'38','name'=>'今治市'],
            ['id'=>'115','pref_id'=>'38','name'=>'宇和島市'],
            ['id'=>'116','pref_id'=>'39','name'=>'高知市'],
            ['id'=>'117','pref_id'=>'39','name'=>'室戸市'],
            ['id'=>'118','pref_id'=>'39','name'=>'安芸市'],
            ['id'=>'119','pref_id'=>'40','name'=>'北九州市'],
            ['id'=>'120','pref_id'=>'40','name'=>'門司区'],
            ['id'=>'121','pref_id'=>'40','name'=>'若松区'],
            ['id'=>'122','pref_id'=>'41','name'=>'佐賀市'],
            ['id'=>'123','pref_id'=>'41','name'=>'唐津市'],
            ['id'=>'124','pref_id'=>'41','name'=>'鳥栖市'],
            ['id'=>'125','pref_id'=>'42','name'=>'長崎市'],
            ['id'=>'126','pref_id'=>'42','name'=>'島原市'],
            ['id'=>'127','pref_id'=>'42','name'=>'佐世保市'],
            ['id'=>'128','pref_id'=>'43','name'=>'熊本市'],
            ['id'=>'129','pref_id'=>'43','name'=>'中央区'],
            ['id'=>'130','pref_id'=>'43','name'=>'東区'],
            ['id'=>'131','pref_id'=>'44','name'=>'大分市'],
            ['id'=>'132','pref_id'=>'44','name'=>'別府市'],
            ['id'=>'133','pref_id'=>'44','name'=>'中津市'],
            ['id'=>'134','pref_id'=>'45','name'=>'宮崎市'],
            ['id'=>'135','pref_id'=>'45','name'=>'都城市'],
            ['id'=>'136','pref_id'=>'45','name'=>'延岡市'],
            ['id'=>'137','pref_id'=>'46','name'=>'鹿児島市'],
            ['id'=>'138','pref_id'=>'46','name'=>'鹿屋市'],
            ['id'=>'139','pref_id'=>'46','name'=>'枕崎市'],
            ['id'=>'140','pref_id'=>'47','name'=>'那覇市'],
            ['id'=>'141','pref_id'=>'47','name'=>'宜野湾市'],
            ['id'=>'142','pref_id'=>'47','name'=>'石垣市'],
         ];

         DB::table('cities')->insert($params);
    }
}


