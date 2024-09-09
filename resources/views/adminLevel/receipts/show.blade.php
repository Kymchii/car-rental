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
                <h2 class="section-title">{{$receipt->receipt_id}}</h2>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">Date: {{$receipt->date}}</p>
            <a href="{{route('admin.receipts.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
            <a href="{{route('admin.receipts.edit', $receipt->receipt_id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
        </div>
    </div>
</div>
@endsection