<?php

use Illuminate\Database\Seeder;

class InpatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inpatient = ([
            [
                'name' => 'Ram',
                'address' => 'thaiba',
                'phone' => '9863283764',
                'skills' => 'run',
                'admit_type' => 'Normal',
                'admit_time' => '9:30',
                'medicine' => 'Sabril',
                'ward_no' => '34',
                'room_no' => '12',
                'doctor_id' => '1',
                'staff_id' => '1',
            ], [
                'name' => 'Hari',
                'address' => 'kalimati',
                'phone' => '986833034',
                'skills' => 'run',
                'admit_type' => 'Normal',
                'admit_time' => '9:30',
                'medicine' => 'Sabril',
                'ward_no' => '34',
                'room_no' => '12',
                'doctor_id' => '2',
                'staff_id' => '2',
            ], [
                'name' => 'Meera',
                'address' => 'patan',
                'phone' => '982329923',
                'skills' => 'run',
                'admit_type' => 'Normal',
                'admit_time' => '9:30',
                'medicine' => 'Sabril',
                'ward_no' => '34',
                'room_no' => '12',
                'doctor_id' => '3',
                'staff_id' => '3',
            ]
        ]);

        App\Inpatient::insert($inpatient);
    }
}
