
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
                <h2 class="section-title">Add Data</h2>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.invoices.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Rent</label>
                    <select class="form-control" name="rent_id" id="exampleFormControlSelect1">
                        @foreach ($rents as $rent)
                        <option value="{{ $rent->rent_id }}">{{ $rent->date }} / {{ $rent->vehicle_number }} / {{ $rent->car_name }} / {{ $rent->name }}</option>
                        @endforeach
                    </select>
                    @error('rent_id')
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
