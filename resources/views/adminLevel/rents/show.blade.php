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
                <h2 class="section-title">{{$rent->vehicle_number}}</h2>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">ID: {{$rent->rent_id}}</p>
            <p class="card-text">Rental Date: {{$rent->date}} - {{$rent->completion_date}}</p>
            <p class="card-text">Dest. Phone: {{$rent->phone}}</p>
            <p class="card-text">Dest. Address: {{$rent->address}}</p>
            <p class="card-text">Price: {{$rent->rates}}</p>
            <p class="card-text">City: {{$rent->city}}</p>
            <p class="card-text">Tenant Name: {{$rent->name}}</p>
            <p class="card-text">Number of Passengers: {{$rent->number_of_passengers}}</p>
            <a href="{{route('admin.rents.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            <a href="{{route('admin.rents.edit', $rent->rent_id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection