@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Penukaran Gift</h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
              @forelse ($tukar as $t)
              <li class="media">
                <div class="media-body">
                  <div class="float-right text-primary">{{ \Carbon\Carbon::parse($t->created_at)->diffforhumans() }}</div>
                  <div class="media-title">{{ $t->user->name }}</div>
                  <span class="text-small text-muted">{{ $t->gift->name }} 
                    @if ($t->status == 'processing')
                      <div class="text text-warning">
                    @elseif ($t->status == 'success')
                    <div class="text text-success">
                    @else
                    <div class="text text-danger">
                    @endif
                      {{ $t->status }}
                    </div>
                  </span>
                </div>
              </li>
              @empty
                
              @endforelse
            </ul>
          </div>
        </div>
      </div>
      
      <div class="col-lg-8 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Transaksi Terakhit</h4>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped mb-0">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Price</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($transaction as $transaksi)
                    <tr>
                      <td>
                          {{ $transaksi->detailtransaction->user->name ?? 0 }}
                      </td>
                      <td>
                          Rp. {{ number_format($transaksi->price) }}
                      </td>
                      <td>
                        @if ($transaksi->status == 'processing')
                          <div class="btn btn-warning">
                        @elseif ($transaksi->status == 'success')
                          <div class="btn btn-success">
                        @else
                          
                        @endif
                          {{ $transaksi->status }}
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="3">Tidak ada data</td>
                    </tr>
                  @endforelse
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection