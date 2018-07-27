<?php

use Illuminate\Database\Seeder;

class AppointmentTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appointment = ([
            [
                'name'      => 'Ram',
                'address'   => 'thaiba',
                'phone'     => '9863283764',
                'date'      => '9/14/2017',
                'time'      => '10:12',
                'doctor_id' => '1'
            ], [
                'name'      => 'Hari',
                'address'   => 'kalimati',
                'phone'     => '986833034',
                'date'      => '9/14/2017',
                'time'      => '10:13',
                'doctor_id' => '2'
            ], [
                'name'      => 'Meera',
                'address'   => 'patan',
                'phone'     => '982329923',
                'date'      => '9/14/2017',
                'time'      => '12:01',
                'doctor_id' => '3'
            ]
        ]);

        App\Appointment::insert($appointment);
    }
}
