<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder {

    /**
     * Run the Setting model database seed.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            [
                'slug'  => 'title',
                'value' => 'Patient Management System'
            ],
            [
                'slug'  => 'description',
                'value' => 'PMS is the information system that is developed by the hospital in managing the records of the people that are involved in the organization.'
            ],
            [
                'slug'  => 'address',
                'value' => 'Dillibazar, ktm',
            ],
            [
                'slug'  => 'phone',
                'value' => '9843228246',
            ],
            [
                'slug'  => 'email',
                'value' => 'info@pms.com.np'
            ],
            [
                'slug'  => 'postbox',
                'value' => ''
            ],
            [
                'slug'  => 'facebook',
                'value' => 'https://www.facebook.com'
            ],
            [
                'slug'  => 'twitter',
                'value' => 'https://www.twitter.com'
            ],
            [
                'slug'  => 'google_plus',
                'value' => 'https://www.google.com'
            ],
            [
                'slug'  => 'logo',
                'value' => '/img/logo.png'
            ],
            [
                'slug'  => 'notification-emails',
                'value' => 'admin@pms.com.np'
            ],
            [
                'slug'  => 'placeholder',
                'value' => '/img/logo.jpg'
            ]
        ];

        DB::table('settings')->truncate();

        DB::table('settings')->insert($settings);
    }
}
