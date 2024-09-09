@extends('dashboard.app')
@section('content')
<div class="section-header">
    <h1>Tenants</h1>
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
                <a href="{{ route('admin.tenants.create') }}" class="btn btn-md btn-primary mb-3"><i class="fas fa-user-plus"></i></a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-primary">Number</th>
                        <th class="table-primary">Name</th>
                        <th class="table-primary">Email</th>
                        <th class="table-primary">Address</th>
                        <th class="table-primary">Phone</th>
                        <th class="table-primary">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($tenants as $index => $tenant)
                    <tr>
                        <td class="text-center">{{ ++$index }}</td>
                        <td>{{$tenant->name}}</td>
                        <td>{{$tenant->email}}</td>
                        <td>{{$tenant->address}}</td>
                        <td>{{$tenant->phone}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('admin.tenants.destroy', $tenant->tenant_id)}}" method="POST">
                                <a href="{{route('admin.tenants.show', $tenant->tenant_id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                <a href="{{route('admin.tenants.edit', $tenant->tenant_id)}}" class="btn btn-primary"><i class="fas fa-pen"></i></a>
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