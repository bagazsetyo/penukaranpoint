@extends('layouts.admin')

@section('title', 'Transaction')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Transaction</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Transaction</div>
      </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-resposive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>UUID</th>
                            <th>Nama</th>
                            <th>Price</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->uuid }}</td>
                            <td>{{ $item->detailtransaction->user->name }}</td>
                            <td>Rp. {{ number_format($item->price) }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->diffforhumans() }}</td>
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
                            <td>
                                <div class="primary">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        @if ($item->id != Auth::user()->id)
                                        <a href="{{ route('admin.transaksi.edit',$item->id) }}"
                                            class="dropdown-item text-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.transaksi.destroy',$item->id) }}" method="post">
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
                {{ $items->links() }}
            </div>
        </div>
    </div>
  </section>
@endsection