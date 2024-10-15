<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Agent;
use App\Models\Customer;
use App\Models\Call;

class TruncateTablesSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks for SQLite
        DB::statement('PRAGMA foreign_keys = OFF;');

        // Delete all records from the tables
        Agent::query()->delete();
        Customer::query()->delete();
        Call::query()->delete();

        // Reset the auto-increment value for SQLite
        DB::statement('DELETE FROM sqlite_sequence WHERE name="agents";');
        DB::statement('DELETE FROM sqlite_sequence WHERE name="customers";');
        DB::statement('DELETE FROM sqlite_sequence WHERE name="calls";');

        // Enable foreign key checks again
        DB::statement('PRAGMA foreign_keys = ON;');
    }
}

