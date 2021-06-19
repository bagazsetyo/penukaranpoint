@extends('layouts.admin')

@section('title', 'Product Edit')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Edit</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.product.index') }}">Product</a></div>
        <div class="breadcrumb-item">Edit</div>
      </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.product.update',$items->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $items->name }}" class="form-control">
                    @error('name')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" value="{{ $items->price }}" class="form-control">
                    @error('price')
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
                    <button class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
  </section>
@endsection