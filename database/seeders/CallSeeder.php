<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Call;

class CallSeeder extends Seeder
{
    public function run()
    {
        Call::create(['customer_id' => 1, 'agent_id' => 1, 'duration' => 300]);
        Call::create(['customer_id' => 2, 'agent_id' => 2, 'duration' => 600]);
        Call::create(['customer_id' => 3, 'agent_id' => 1, 'duration' => 450]); // Mark Spencer with Agent Smith
        Call::create(['customer_id' => 4, 'agent_id' => 1, 'duration' => 250]); // Lucy Smith with Agent Smith
        Call::create(['customer_id' => 5, 'agent_id' => 1, 'duration' => 350]); // Paul Allen with Agent Smith
        Call::create(['customer_id' => 6, 'agent_id' => 1, 'duration' => 500]); // Emma Watson with Agent Smith
        Call::create(['customer_id' => 7, 'agent_id' => 1, 'duration' => 400]); // Tom Cruise with Agent Smith
        Call::create(['customer_id' => 8, 'agent_id' => 1, 'duration' => 550]); // Natalie Portman with Agent Smith
        Call::create(['customer_id' => 9, 'agent_id' => 2, 'duration' => 300]); // Bruce Wayne with Agent Johnson
        Call::create(['customer_id' => 10, 'agent_id' => 5, 'duration' => 450]); // Arthur Curry with Agent Davis
        Call::create(['customer_id' => 11, 'agent_id' => 6, 'duration' => 450]); // Arthur Curry with Agent Davis

        // New calls associated with other agents
        Call::create(['customer_id' => 12, 'agent_id' => 3, 'duration' => 400]); // Peter Parker with Agent Williams
        Call::create(['customer_id' => 13, 'agent_id' => 4, 'duration' => 500]); // Clark Kent with Agent Brown
        Call::create(['customer_id' => 14, 'agent_id' => 7, 'duration' => 350]); // Diana Prince with Agent Clark
        Call::create(['customer_id' => 15, 'agent_id' => 8, 'duration' => 600]); // Bruce Banner with Agent Lewis
    }
}
