
@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Users</h1>
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
            <form action="{{route('admin.users.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Name</label>
                    <input type="text" class="form-control" id="id" placeholder="Enter name" name="name">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="id" placeholder="Enter email" name="email">
                    @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Password</label>
                    <input type="password" class="form-control" id="id" placeholder="Enter password" name="password">
                    @error('password')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Level</label>
                    <select class="form-control" name="level">
                        <option value="Admin">Admin</option>
                        <option value="Tenant">Tenant</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
@endsection
