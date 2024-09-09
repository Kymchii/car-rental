@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Hero</div>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="hero bg-primary text-white">
                <div class="hero-inner">
                    <h2>Welcome, {{Auth::user()->name}}!</h2>
                    <p class="lead">You are logged in as Admin</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
