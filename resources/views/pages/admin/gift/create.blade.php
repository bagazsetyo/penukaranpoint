@extends('layouts.admin')

@section('title', 'Gift Create')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Create</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.gift.index') }}">Gift</a></div>
        <div class="breadcrumb-item">Create</div>
      </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.gift.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    @error('name')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">point</label>
                    <input type="text" name="point" value="{{ old('point') }}" class="form-control">
                    @error('point')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">qty</label>
                    <input type="text" name="qty" value="{{ old('qty') }}" class="form-control">
                    @error('qty')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" accept="image/*" value="{{ old('image') }}" class="form-control">
                    @error('image')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </section>
@endsection