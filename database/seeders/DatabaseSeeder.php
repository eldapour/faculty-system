<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PageSeeder::class);
        $this->call(WordSeeder::class);
        $this->call(UniversitySettingSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(ReasonRedresseSeeder::class);
        $this->call(PresentationSeeder::class);
        $this->call(AdvertisementSeeder::class);
        $this->call(CertificateTypeSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(InternalAdsSeeder::class);
    }
}
