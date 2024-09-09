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
                <h2 class="section-title">{{$vehicle->car_name}}</h2>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">Vehicle Number: {{$vehicle->vehcile_number}}</p>
            <p class="card-text">Machine Number: {{$vehicle->machine_number}}</p>
            <p class="card-text">Car Type: {{$vehicle->car_type}}</p>
            <p class="card-text">Brand: {{$vehicle->brand}}</p>
            <p class="card-text">Capacity: {{$vehicle->capacity}}</p>
            <p class="card-text">Rates: {{$vehicle->rates}}</p>
            <a href="{{route('admin.vehicles.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            <a href="{{route('admin.vehicles.edit', $vehicle->vehicle_number)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection