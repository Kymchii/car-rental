
@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Vehicles</h1>
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
            <form action="{{route('admin.vehicles.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">Vehicle Number</label>
                    <input type="text" class="form-control" placeholder="Enter vehicle number" name="vehicle_number">
                    @error('vehicle_number')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Machine Number</label>
                    <input type="text" class="form-control" id="id" placeholder="Enter machine number" name="machine_number">
                    @error('machine_number')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Car Type</label>
                    <select class="form-control" name="car_type" id="exampleFormControlSelect1">
                        <option value="MVP">MVP</option>
                        <option value="City">City</option>
                        <option value="SUV">SUV</option>
                    </select>
                    @error('car_type')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Car Name</label>
                    <input type="text" class="form-control" id="id" placeholder="Enter car name" name="car_name">
                    @error('car_name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Brand</label>
                    <select class="form-control" name="brand" id="exampleFormControlSelect1">
                        <option value="Honda">Honda</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Daihatsu">Daihatsu</option>
                    </select>
                    @error('brand')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Capacity</label>
                    <input type="text" class="form-control" id="id" placeholder="Enter capacity" name="capacity">
                    @error('capacity')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Rates</label>
                    <input type="number" class="form-control" id="id" placeholder="Enter rates" name="rates">
                    @error('rates')
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
