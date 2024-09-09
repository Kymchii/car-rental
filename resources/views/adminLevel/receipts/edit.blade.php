@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Receipts</h1>
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
            <form action="{{route('admin.receipts.update', $receipt->receipt_id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="email" class="form-label">Date</label>
                    <input type="date" class="form-control" id="id" value="{{old('date', $receipt->date)}}" name="date">
                    @error('date')
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