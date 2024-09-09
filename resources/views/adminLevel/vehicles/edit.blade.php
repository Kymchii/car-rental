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
                <h2 class="section-title">Edit Data</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.vehicles.update', $vehicle->vehicle_number)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email" class="form-label">Vehicle Number</label>
                    <input type="text" class="form-control" value="{{old('vehicle_number', $vehicle->vehicle_number)}}" name="vehicle_number" readonly>
                    @error('vehicle_number')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Machine Number</label>
                    <input type="text" class="form-control" id="id" value="{{old('machine_number', $vehicle->machine_number)}}" name="machine_number" readonly>
                    @error('machine_number')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="level" class="form-label">Car Type</label>
                    <select class="form-control" name="car_type" id="level">
                        @foreach(['MVP', 'SUV', 'City'] as $carTypeOptions)
                        <option value="{{ $carTypeOptions }}" @if(old('car_type', $vehicle->car_type) == $carTypeOptions) selected @endif>
                            {{ $carTypeOptions }}
                        </option>
                        @endforeach
                    </select>
                    @error('car_type')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Car Name</label>
                    <input type="text" class="form-control" id="id" value="{{old('car_name', $vehicle->car_name)}}" name="car_name">
                    @error('car_name')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="level" class="form-label">Brand</label>
                    <select class="form-control" name="brand" id="level">
                        @foreach(['Honda', 'Toyota', 'Daihatsu'] as $brandOptions)
                        <option value="{{ $brandOptions }}" @if(old('brand', $vehicle->brand) == $brandOptions) selected @endif>
                            {{ $brandOptions }}
                        </option>
                        @endforeach
                    </select>
                    @error('car_type')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Capacity</label>
                    <input type="text" class="form-control" id="id" value="{{old('capacity', $vehicle->capacity)}}" name="capacity">
                    @error('capacity')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Rates</label>
                    <input type="number" class="form-control" id="id" value="{{old('rates', $vehicle->rates)}}" name="rates">
                    @error('rates')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection