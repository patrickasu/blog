<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'site_name' => 'Ape Blog',
            'contact_number' => '08184453288',
            'contact_email' => 'contact@cabadelicacies.com',
            'contact_address' => 'No. 25 Adewale Avenue,',
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
    }
}
