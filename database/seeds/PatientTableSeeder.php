<?php

use Illuminate\Database\Seeder;

class PatientTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $patient = ([
            [
                'name'     => 'Ram',
                'username' => 'ram',
                'address'  => 'thaiba',
                'phone'    => '9863283764',
                'age'      => '22',
                'gender'   => 'Male'
            ], [
                'name'     => 'Hari',
                'username' => 'hari',
                'address'  => 'kalimati',
                'phone'    => '986833034',
                'age'      => '28',
                'gender'   => 'Male'
            ], [
                'name'     => 'Meera',
                'username' => 'meera',
                'address'  => 'patan',
                'phone'    => '982329923',
                'age'      => '30',
                'gender'   => 'Female'
            ]
        ]);

        App\Patient::insert($patient);
    }
}