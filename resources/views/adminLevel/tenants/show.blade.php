@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Tenants</h1>
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
                <h2 class="section-title">{{$tenant->name}}</h2>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">Id: {{$tenant->tenant_id}}</p>
            <p class="card-text">Email: {{$tenant->email}}</p>
            <p class="card-text">Address: {{$tenant->address}}</p>
            <p class="card-text">Phone Number: {{$tenant->phone}}</p>
            <a href="{{route('admin.tenants.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            <a href="{{route('admin.tenants.edit', $tenant->tenant_id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection