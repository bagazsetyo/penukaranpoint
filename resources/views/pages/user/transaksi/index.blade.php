@extends('layouts.user')

@section('title', 'Transaksi')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Transaksi</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('user.dashboard.index') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Transaksi</div>
      </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-resposive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>UUID</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->uuid }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                @if ($item->status == 'processing')
                                    <div class="btn btn-warning">
                                @elseif ($item->status == 'success')
                                    <div class="btn btn-success">
                                @else
                                    <div class="btn btn-danger"> 
                                @endif
                                        {{ $item->status }}
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