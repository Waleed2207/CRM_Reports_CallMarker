<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agent;

class AgentSeeder extends Seeder
{
    public function run()
    {
        Agent::create(['name' => 'Agent Smith']);
        Agent::create(['name' => 'Agent Johnson']);
        Agent::create(['name' => 'Agent Williams']);  // agent_id = 3
        Agent::create(['name' => 'Agent Brown']);  // agent_id = 4
        Agent::create(['name' => 'Agent Taylor']);  // agent_id = 5
        Agent::create(['name' => 'Agent Davis']);  // agent_id = 6
        Agent::create(['name' => 'Agent Clark']);  // agent_id = 7
        Agent::create(['name' => 'Agent Lewis']);  // agent_id = 8
    }
}
