<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class work_flow_engine extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\work_flow_engine::create(['name'=>'Draft']);
        \App\Models\work_flow_engine::create(['name'=>'In Review']);
        \App\Models\work_flow_engine::create(['name'=>'Approved']);
        \App\Models\work_flow_engine::create(['name'=>'Rejected']);        
    }
}
