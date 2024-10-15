<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Array of customer data
        $customers = [
            ['name' => 'John Doe', 'email' => 'john.doe@example.com', 'phone_number' => '0509873748', 'agent_id' => 1],
            ['name' => 'Jane Doe', 'email' => 'jane.doe@example.com', 'phone_number' => '0509873749', 'agent_id' => 2],
            ['name' => 'Mark Spencer', 'email' => 'mark.spencer@example.com', 'phone_number' => '0509873750', 'agent_id' => 1],
            ['name' => 'Lucy Smith', 'email' => 'lucy.smith@example.com', 'phone_number' => '0509873751', 'agent_id' => 1],
            ['name' => 'Paul Allen', 'email' => 'paul.allen@example.com', 'phone_number' => '0509873752', 'agent_id' => 1],
            ['name' => 'Emma Watson', 'email' => 'emma.watson@example.com', 'phone_number' => '0509873753', 'agent_id' => 1],
            ['name' => 'Tom Cruise', 'email' => 'tom.cruise@example.com', 'phone_number' => '0509873754', 'agent_id' => 1],
            ['name' => 'Natalie Portman', 'email' => 'natalie.portman@example.com', 'phone_number' => '0509873755', 'agent_id' => 1],
            ['name' => 'Bruce Wayne', 'email' => 'bruce.wayne@example.com', 'phone_number' => '0509873756', 'agent_id' => 2],
            ['name' => 'Barry Allen', 'email' => 'barry.allen@example.com', 'phone_number' => '0509873757', 'agent_id' => 5],
            ['name' => 'Arthur Curry', 'email' => 'arthur.curry@example.com', 'phone_number' => '0509873758', 'agent_id' => 6],
            ['name' => 'Peter Parker', 'email' => 'peter.parker@example.com', 'phone_number' => '0509873759', 'agent_id' => 3],
            ['name' => 'Clark Kent', 'email' => 'clark.kent@example.com', 'phone_number' => '0509873760', 'agent_id' => 4],
            ['name' => 'Diana Prince', 'email' => 'diana.prince@example.com', 'phone_number' => '0509873761', 'agent_id' => 7],
            ['name' => 'Bruce Banner', 'email' => 'bruce.banner@example.com', 'phone_number' => '0509873762', 'agent_id' => 8],
        ];

        // Loop through each customer and update or create the record
        foreach ($customers as $customerData) {
            Customer::updateOrCreate(
                ['email' => $customerData['email']], // Search by unique column
                $customerData
            );
        }
    }
}
