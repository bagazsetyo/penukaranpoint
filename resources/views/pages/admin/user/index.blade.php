@extends('layouts.admin')

@section('title', 'User')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>User</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
        <div class="breadcrumb-item">User</div>
      </div>
    </div>
    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">Tambah</a>
            <div class="table-resposive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <div class="primary">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        @if ($item->id != Auth::user()->id)
                                        <a href="{{ route('admin.user.edit',$item->id) }}"
                                            class="dropdown-item text-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.user.destroy',$item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                        <button 
                                            type="submit"  
                                            class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                        @endif
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </section>
@endsection