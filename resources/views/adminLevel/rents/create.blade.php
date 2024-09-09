
@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Rents</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{route('admin.admin')}}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-start">
                <h2 class="section-title">Add Data</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.rents.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Vehicle Number</label>
                    <select class="form-control" name="vehicle_number" id="exampleFormControlSelect1">
                        @foreach ($vehicle as $vehicle)
                        <option value="{{ $vehicle->vehicle_number }}">{{ $vehicle->vehicle_number }} - {{ $vehicle->rates }}</option>
                        @endforeach
                    </select>
                    @error('vehicle_number')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Rental Date</label>
                    <select class="form-control" name="receipt_id" id="exampleFormControlSelect1">
                        @foreach ($receipt as $receipt)
                        <option value="{{ $receipt->receipt_id }}">{{ $receipt->date }}</option>
                        @endforeach
                    </select>
                    @error('receipt_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Tenant</label>
                    <select class="form-control" name="tenant_id" id="exampleFormControlSelect1">
                        @foreach ($tenant as $tenant)
                        <option value="{{ $tenant->tenant_id }}">{{ $tenant->phone }} - {{ $tenant->name }}</option>
                        @endforeach
                    </select>
                    @error('tenant_id')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Completion Date</label>
                    <input type="date" class="form-control" id="id" placeholder="Enter date" name="completion_date">
                    @error('completion_date')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">City</label>
                    <input type="text" class="form-control" id="id" placeholder="Enter city" name="city">
                    @error('city')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Number of Passengers</label>
                    <input type="number" class="form-control" id="id" placeholder="Enter number of passengers" name="number_of_passengers">
                    @error('number_of_passengers')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection
