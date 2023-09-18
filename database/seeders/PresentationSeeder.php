<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => json_encode([
                    'ar' => 'Ducimus reprehender',
                    'en' => 'Tempor qui voluptas',
                    'fr' => 'Rerum velit neque e'
                ]),
                'description' => json_encode([
                    'ar' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia

                                    modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur

                                    porro laborum molestias.

                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet

                                    aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis

                                    quam?</p>',
                    'en' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia

                                    modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur

                                    porro laborum molestias.

                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet

                                    aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis

                                    quam?</p>',
                    'fr' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia

                                    modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur

                                    porro laborum molestias.

                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet

                                    aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis

                                    quam?</p>',
                ]),
                'sub_desc' => json_encode([
                    'ar' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia

                                    modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur

                                    porro laborum molestias.

                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet

                                    aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis

                                    quam?</p>',
                    'en' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia

                                    modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur

                                    porro laborum molestias.

                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet

                                    aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis

                                    quam?</p>',
                    'fr' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus inventore aspernatur, officia

                                    modi sint aliquid beatae dolorem? Deserunt unde cumque aut, fuga tempora nesciunt. Tempora magni consectetur

                                    porro laborum molestias.

                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt earum adipisci recusandae nobis eveniet

                                    aut neque voluptatibus repellat quae! Libero, beatae quo corrupti ipsam rem sed eos ducimus perferendis

                                    quam?</p>',
                ]),
                'images' => json_encode([
                    "assets/front/assets/photo/about_img.png",
                    "assets/front/assets/photo/evn-img-2.jpg",
                    "assets/front/assets/photo/inner_b1.jpg",
                ]),
                'experience_year' => '25',
                'category_id' => '1',
                'created_at' => Carbon::now(),
            ],
        ];
        DB::table('presentations')->insert($data);

}
}
