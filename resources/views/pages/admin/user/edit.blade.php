@extends('layouts.admin')

@section('title', 'User Edit')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Edit</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('admin.user.index') }}">User</a></div>
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
            <form action="{{ route('admin.user.update',$items->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $items->name }}" required class="form-control">
                    @error('name')
                        <div class="text-muted">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" value="{{ $items->email }}" required class="form-control">
                    @error('email')
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