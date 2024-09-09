@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Invoices</h1>
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
                <h2 class="section-title">{{$invoice->vehicle_number}}</h2>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">ID: {{$invoice->invoice_id}}</p>
            <p class="card-text">Date: {{$invoice->date}}</p>
            <p class="card-text">Dest. Phone: {{$invoice->phone}}</p>
            <p class="card-text">Dest. Address: {{$invoice->address}}</p>
            <p class="card-text">Tenant Name: {{$invoice->name}}</p>
            <p class="card-text">Car Name: {{$invoice->car_name}}</p>
            <p class="card-text">Car Brand: {{$invoice->brand}}</p>
            <a href="{{route('admin.invoices.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            <a href="{{route('admin.invoices.edit', $invoice->invoice_id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection