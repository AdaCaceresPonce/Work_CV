<?php

namespace Database\Seeders;

use App\Models\ContactInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $info = [
            'phone' => null,
            'cellphone' => '950924989',
            'email' => 'patriciacm_199@hotmail.com',
            'facebook_link' => null,
            'twitter_link' => null,
            'instagram_link' => null
        ];

        ContactInformation::create($info);
    }
}
