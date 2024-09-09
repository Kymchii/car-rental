@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Invoices</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{route('tenant.tenant')}}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-primary">Date</th>
                        <th class="table-primary">Name</th>
                        <th class="table-primary">Vehicle Number</th>
                        <th class="table-primary">Car Name</th>
                        <th class="table-primary">Brand</th>
                        <th class="table-primary">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($invoices as $index => $invoice)
                    <tr>
                        <td>{{$invoice->date}}</td>
                        <td>{{$invoice->name}}</td>
                        <td>{{$invoice->vehicle_number}}</td>
                        <td>{{$invoice->car_name}}</td>
                        <td>{{$invoice->brand}}</td>
                        <td>
                            <a href="{{route('tenant.invoices.show', $invoice->invoice_id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-info">
                        <strong>Data is not available yet</strong>
                    </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection