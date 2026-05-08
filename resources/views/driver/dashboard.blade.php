<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard - UTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .dashboard-header { background: #343a40; color: white; padding: 20px; margin-bottom: 30px; }
    </style>
</head>
<body>

<div class="dashboard-header d-flex justify-content-between align-items-center">
    <div>
        <h1>UTS Driver/Staff Dashboard</h1>
        <p>Welcome, {{ Auth::user()->name }} | Assigned Bus: {{ $bus->bus_number }}</p>
    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-light">Logout</button>
    </form>
</div>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Section 1: Bus Status & Payment -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Update Bus Status</div>
                <div class="card-body">
                    <form action="{{ route('driver.updateStatus') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Seat Status (Sit/Stand)</label>
                            <select name="seat_status" class="form-select">
                                <option value="sit" {{ $bus->seat_status == 'sit' ? 'selected' : '' }}>Sit (Full Price)</option>
                                <option value="stand" {{ $bus->seat_status == 'stand' ? 'selected' : '' }}>Stand (50% Off for Students)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Method</label>
                            <select name="payment_method" class="form-select">
                                <option value="COD" {{ $bus->payment_method == 'COD' ? 'selected' : '' }}>Cash on Delivery (COD)</option>
                                <option value="Bkash" {{ $bus->payment_method == 'Bkash' ? 'selected' : '' }}>Bkash</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Save Status</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Section 2: Fuel Enrollment -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">Enroll Fuel Cost</div>
                <div class="card-body">
                    <form action="{{ route('driver.storeFuel') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Amount (Liters)</label>
                            <input type="number" step="0.01" name="amount_liters" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Cost (BDT)</label>
                            <input type="number" step="0.01" name="cost" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Refuel Date</label>
                            <input type="date" name="refuel_date" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Log Refueling</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Section 3: Expense Requests -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-dark">Request Maintenance/Expenses</div>
                <div class="card-body">
                    <form action="{{ route('driver.storeExpense') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Item Name (e.g., Engine Oil, Brake Pad)</label>
                            <input type="text" name="item_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required placeholder="Explain why this is needed..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Send Request to Admin</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Section 4: Feedback -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-white">UTS Feedback</div>
                <div class="card-body">
                    <form action="{{ route('driver.storeFeedback') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Your Message</label>
                            <textarea name="message" class="form-control" rows="5" required placeholder="How can we improve the system?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info w-100">Submit Feedback</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent History -->
    <div class="row mt-4">
        <div class="col-12 text-center mb-4">
            <h3>Recent Activity Summary</h3>
        </div>
        <div class="col-md-6">
            <h5>Recent Fuel Logs</h5>
            <table class="table table-sm table-striped">
                <thead><tr><th>Date</th><th>Liters</th><th>Cost</th></tr></thead>
                <tbody>
                    @foreach($fuelLogs as $log)
                        <tr><td>{{ $log->refuel_date }}</td><td>{{ $log->amount_liters }}L</td><td>{{ $log->cost }} BDT</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h5>Maintenance Requests</h5>
            <table class="table table-sm table-striped">
                <thead><tr><th>Item</th><th>Status</th></tr></thead>
                <tbody>
                    @foreach($expenses as $exp)
                        <tr><td>{{ $exp->item_name }}</td><td><span class="badge bg-{{ $exp->status == 'pending' ? 'secondary' : ($exp->status == 'approved' ? 'success' : 'danger') }}">{{ $exp->status }}</span></td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
