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
                <h2 class="section-title">Edit Data</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.tenants.update', $tenant->tenant_id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Email</label>
                    <select class="form-control" name="user_id" id="exampleFormControlSelect1" disabled>
                        @foreach ($user as $user)
                        <option value="{{ $user->id }}" @if(old('id')==$user->id)selected
                            @elseif(!old('id') && $tenant->user_id == $user->id)selected
                            @endif
                            >{{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Address</label>
                    <textarea class="form-control" id="id" name="address">{{old('address', $tenant->address)}}</textarea>
                    @error('address')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="id" value="{{old('phone', $tenant->phone)}}" name="phone">
                    @error('phone')
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