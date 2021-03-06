<?php

use Illuminate\Database\Seeder;

class DefaultUsersDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\Models\Permission::insert([
            [
                'name'=>'all',
                'display_name'=>'Full Permission',
                'description'=>'Admin full access.',
                'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name'=>'public_part',
                'display_name'=>'Public Part',
                'description'=>'Public part access.',
                'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name'=>'admin_part',
                'display_name'=>'Admin Part',
                'description'=>'Admin part access.',
                'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            ],
        ]);

        \App\Models\Role::insert([
            [
                'name'=>'admin',
                'display_name'=>'Administrator',
                'description'=>'User with administrator role is pillaged user',
                'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name'=>'newuser',
                'display_name'=>'User',
                'description'=>'User with administrator role is pillaged user',
                'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name'=>'doctor',
                'display_name'=>'Doctor',
                'description'=>'Doctor',
                'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name'=>'practice_partner',
                'display_name'=>'Practice Partner',
                'description'=>'Practice Partner',
                'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name'=>'nurse',
                'display_name'=>'Nurse',
                'description'=>'Nurse',
                'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name'=>'practice_manager',
                'display_name'=>'Practice Manager',
                'description'=>'Practice Manager',
                'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name'=>'receptionist',
                'display_name'=>'Receptionist',
                'description'=>'Receptionist',
                'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'name'=>'locum_doctor',
                'display_name'=>'Locum Doctor',
                'description'=>'Locum Doctor',
                'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
            ],
        ]);

        \App\User::insert([
            [
                'role_id' => 1,
                'prev_role_id' => 1,
                'title' => 'title',
                'email' => 'admin@admin.com',
                'avatar' => 'avatar.jpg',
                'password' => bcrypt('test'),
                'remember_token' => str_random(10),
                'first_name' => 'Test Admin',
                'last_name' => 'Test',
                'date_of_birth' => \Carbon\Carbon::now()->toDateTimeString(),
                'position_type' => 'Administrator',
                'gender' => 'Male',
                'phone' => '5252811122',
                'occupation' => 'None',
                'med_reg_number' => '8282828',
                'authorised_user' => 0,
                'approved' => 1,
                'active' => 1,
            ],
        ]);



        \DB::table('permission_role')->insert([
            [
                'permission_id'=>1,
                'role_id'=>1,
            ],
            [
                'permission_id'=>2,
                'role_id'=>1,
            ],
            [
                'permission_id'=>3,
                'role_id'=>1,
            ],
        ]);

        // \DB::table('role_user')->insert([
        //     [
        //         'user_id'=>1,
        //         'role_id'=>1,
        //     ],
        //     [
        //         'user_id'=>2,
        //         'role_id'=>2,
        //     ],
        //     [
        //         'user_id'=>3,
        //         'role_id'=>3,
        //     ],
        //     [
        //         'user_id'=>4,
        //         'role_id'=>4,
        //     ],
        //     [
        //         'user_id'=>5,
        //         'role_id'=>5,
        //     ],
        //     [
        //         'user_id'=>6,
        //         'role_id'=>6,
        //     ],
        //     [
        //         'user_id'=>7,
        //         'role_id'=>7,
        //     ],
        // ]);

        \DB::table('practices')->insert([
            [
                'user_id' => 1,
        				'name' => 'Example',
        				'description' => 'Example',
        				'address' => 'Example',
        				'fax' => 'Example',
                'phone' => '424242',
                'avatar' => 'avatars/avatar.png',
        				'email' => 'Example',
        				'site' => 'Example',
            ],
        ]);

        \DB::table('billing_address')->insert([
            [
              'practices_id' => 1,
              'first_name' => 'test',
              'last_name' => 'test',
              'phone' => 'test',
              'email' => 'test',
              'company' => 'test',
              'address_1' => 'test',
              'address_2' => 'test',
              'city' => 'test',
              'state' => 'test',
              'country' => 'test',
              'zip' => '545454',
            ],
        ]);

        \DB::table('subscriptions')->insert([
            [
              'user_id' => 1,
              'name' => 'test',
              'stripe_id' => 'test',
              'stripe_plan' => 'test',
              'quantity' => 5,
              'billing_address_id' => 1,
              'ends_at' => \Carbon\Carbon::now()->addDays(10),
            ],
        ]);
    }
}
