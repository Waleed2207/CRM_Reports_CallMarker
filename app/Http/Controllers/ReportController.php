<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\Agent;
use App\Models\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all agents and customers
        $agents = Agent::all();
        $customers = Customer::all();

        // Initialize the query to retrieve calls with their associated customer and agent
        $query = Call::with(['customer', 'agent']);

        // Apply filters dynamically based on the request
        $filterableFields = [
            'agent_id' => 'agent_id',
            'customer_id' => 'customer_id',
            'start_date' => 'created_at',
            'end_date' => 'created_at',
            'duration' => 'duration',
        ];

        foreach ($filterableFields as $requestField => $dbField) {
            if ($request->filled($requestField)) {
                if (in_array($requestField, ['start_date', 'end_date'])) {
                    $date = Carbon::parse($request->input($requestField));
                    $query->where($dbField, $requestField == 'start_date' ? '>=' : '<=', $requestField == 'start_date' ? $date->startOfDay() : $date->endOfDay());
                } else {
                    $query->where($dbField, '>=', $request->input($requestField));
                }
            }
        }

        // Paginate the results
        $calls = $query->paginate(10);

        // Return the view with the results and filter options
        return view('reports.index', compact('calls', 'agents', 'customers'));
    }
}

