@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Rents</h1>
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
                <a href="{{ route('admin.rents.create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-user-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-primary">Vehicle Number</th>
                        <th class="table-primary">Rental Date</th>
                        <th class="table-primary">Destination Phone</th>
                        <th class="table-primary">Destination Address</th>
                        <th class="table-primary">Price</th>
                        <th class="table-primary">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($rents as $index => $rent)
                    <tr>
                        <td>{{$rent->vehicle_number}}</td>
                        <td>{{$rent->date}} - {{$rent->completion_date}}</td>
                        <td>{{$rent->phone}}</td>
                        <td>{{$rent->address}}</td>
                        <td>{{$rent->rates}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('admin.rents.destroy', $rent->rent_id)}}" method="POST">
                                <a href="{{route('admin.rents.show', $rent->rent_id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('admin.rents.edit', $rent->rent_id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
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