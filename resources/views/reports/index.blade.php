<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Call Report</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/callmarker-logo.png') }}" class="logo" alt="logo" />
        <h1>Call Report</h1>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('reports.index') }}">
            <div>
                <label for="agent">Agent:</label>
                <select name="agent_id" id="agent">
                    <option value="">Select Agent</option>
                    @foreach($agents as $agent)
                        <option value="{{ $agent->id }}" {{ request('agent_id') == $agent->id ? 'selected' : '' }}>
                            {{ $agent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="customer">Customer:</label>
                <select name="customer_id" id="customer">
                    <option value="">Select Customer</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ request('customer_id') == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}">
            </div>

            <div>
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}">
            </div>

            <div>
                <label for="duration">Duration (seconds):</label>
                <input type="number" name="duration" id="duration" min="0" value="{{ request('duration') }}">
            </div>

            <div class="button-container">
                <button class="filter-button">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </div>
        </form>

        <!-- Call Report Table -->
        @if($calls->count())
        <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Agent Name</th>
                    <th>Duration</th>
                    <th>Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @foreach($calls as $call)
                    <tr>
                        <td>{{ $call->customer->name }}</td>
                        <td>{{ $call->customer->email }}</td>
                        <td>{{ $call->customer->phone_number }}</td>
                        <td>{{ $call->agent->name }}</td>
                        <td>{{ $call->duration }} seconds</td>
                        <td>{{ $call->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            <ul>
                @if($calls->onFirstPage())
                    <li class="disabled"><span>&laquo; Previous</span></li>
                @else
                    <li><a href="{{ $calls->previousPageUrl() }}" rel="prev">&laquo; Previous</a></li>
                @endif

                @foreach ($calls->getUrlRange(1, $calls->lastPage()) as $page => $url)
                    @if ($page == $calls->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach

                @if($calls->hasMorePages())
                    <li><a href="{{ $calls->nextPageUrl() }}" rel="next">Next &raquo;</a></li>
                @else
                    <li class="disabled"><span>Next &raquo;</span></li>
                @endif
            </ul>
        </div>


        @else
            <p>No calls found for the selected criteria.</p>
        @endif
    </div>
</body>
</html>
