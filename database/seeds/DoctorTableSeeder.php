<?php

use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = ([
            [
                'name'       => 'Ram',
                'username'   => 'ram',
                'address'    => 'thaiba',
                'phone'      => '9863283764',
                'email'      => 'ram@pms.com',
                'age'        => '22',
                'gender'     => 'Male',
                'department' => 'neck'
            ], [
                'name'       => 'Hari',
                'username'   => 'hari',
                'address'    => 'kalimati',
                'phone'      => '986833034',
                'email'      => 'hari@pms.com',
                'age'        => '28',
                'gender'     => 'Male',
                'department' => 'skin'
            ], [
                'name'       => 'Meera',
                'username'   => 'meera',
                'address'    => 'patan',
                'phone'      => '982329923',
                'email'      => 'meera@pms.com',
                'age'        => '30',
                'gender'     => 'Female',
                'department' => 'bone'
            ]
        ]);

        App\Doctor::insert($doctor);
    }
}
