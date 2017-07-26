<?php

use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\DefPage::insert([
            [
                'name'=>'Clinical  Management',
                'system_name'=>'clinical_management',
            ],
            [
                'name'=>'Infection Prevention & Control',
                'system_name'=>'infection_prevention',
            ],
            [
                'name'=>'Practice  Operations',
                'system_name'=>'practice_operations',
            ],
            [
                'name'=>'Patient Management',
                'system_name'=>'patient_management',
            ],
            [
                'name'=>'Privacy & Data Protection ',
                'system_name'=>'privacy',
            ],
            [
                'name'=>'Human Resources',
                'system_name'=>'human_resources',
            ],
            [
                'name'=>'Finances',
                'system_name'=>'finances',
            ],
            [
                'name'=>'Health & Safety ',
                'system_name'=>'health',
            ],
            [
                'name'=>'Emergency & Disaster Recovery',
                'system_name'=>'emergency',
            ],
        ]);
    }
}
