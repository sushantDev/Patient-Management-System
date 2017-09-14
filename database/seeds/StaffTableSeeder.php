<?php

use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff = ([
            [
                'name' => 'Ram',
                'staff_type' => 'Accounts',
                'username' => 'ram',
                'address' => 'thaiba',
                'phone' => '9863283764',
                'email' => 'ram@pms.com',
                'age' => '22',
                'gender' => 'Male',
                'dob' => '2076-21-02',
                'marital_status' => 'Married'
            ], [
                'name' => 'Hari',
                'staff_type' => 'Accounts',
                'username' => 'hari',
                'address' => 'kalimati',
                'phone' => '986833034',
                'email' => 'hari@pms.com',
                'age' => '28',
                'gender' => 'Male',
                'dob' => '2076-13-02',
                'marital_status' => 'Unmarried'
            ], [
                'name' => 'Meera',
                'staff_type' => 'Accounts',
                'username' => 'meera',
                'address' => 'patan',
                'phone' => '982329923',
                'email' => 'meera@pms.com',
                'age' => '30',
                'gender' => 'Female',
                'dob' => '2065-14-03',
                'marital_status' => 'Married'
            ]
        ]);

        App\Staff::insert($staff);
    }
}
