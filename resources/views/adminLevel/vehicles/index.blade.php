@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Vehicles</h1>
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
                <a href="{{ route('admin.vehicles.create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-user-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-primary">Vehicle Number</th>
                        <th class="table-primary">Car Type</th>
                        <th class="table-primary">Name</th>
                        <th class="table-primary">Brand</th>
                        <th class="table-primary">Capacity</th>
                        <th class="table-primary">Rates</th>
                        <th class="table-primary">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($vehicles as $index => $vehicle)
                    <tr>
                        <td>{{$vehicle->vehicle_number}}</td>
                        <td>{{$vehicle->car_type}}</td>
                        <td>{{$vehicle->car_name}}</td>
                        <td>{{$vehicle->brand}}</td>
                        <td>{{$vehicle->capacity}}</td>
                        <td>{{$vehicle->rates}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('admin.vehicles.destroy', $vehicle->vehicle_number)}}" method="POST">
                                <a href="{{route('admin.vehicles.show', $vehicle->vehicle_number)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('admin.vehicles.edit', $vehicle->vehicle_number)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-trash"></i></button>
                            </form>
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