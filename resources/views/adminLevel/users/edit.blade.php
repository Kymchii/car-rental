
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
            <form action="{{route('admin.users.update', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email" class="form-label">Name</label>
                    <input type="text" class="form-control" id="id" value="{{old('name', $user->name)}}" name="name">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="id" value="{{old('email', $user->email)}}" name="email" readonly>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Password</label>
                    <input type="password" class="form-control" id="id" value="{{old('password', $user->password)}}" name="password" readonly>
                </div>

                <div class="form-group">
                    <label for="level" class="form-label">Level</label>
                    <select class="form-control" name="level" id="level">
                        @foreach(['Admin', 'Tenant'] as $levelOptions)
                        <option value="{{ $levelOptions }}" @if(old('level', $user->level) == $levelOptions) selected @endif>
                            {{ $levelOptions }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
