@extends('layouts.admin')

@section('title', 'Penukaran Edit')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Edit</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.penukaran.index') }}">Penukaran</a></div>
        <div class="breadcrumb-item">Edit</div>
      </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if($errors->has)
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{ route('admin.penukaran.update',$items->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">status </label>
                    <select name="status" class="form-control" id="">
                        <option value="processing" @if($items->status == 'processing') selected @endif>Processing</option>
                        <option value="success" @if($items->status == 'success') selected @endif>Success</option>
                        <option value="failed" @if($items->status == 'failed') selected @endif>Failed</option>
                    </select>
                    @error('status')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
  </section>
@endsection