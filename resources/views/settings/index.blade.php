@extends('layout.app')
@section('content')
<style>
    body {
        background-color: #f8f9fa;
    }
    .container {
        margin-top: 50px;
    }
    .form-group img {
        margin-top: 10px;
    }
    .profile-header {
        position: relative;
        text-align: center;
        margin-bottom: 30px;
    }
    .profile-header img {
        border-radius: 50%;
        margin-bottom: 10px;
    }
    .profile-header .cover {
        height: 200px;
        background-size: cover;
        background-position: center;
        position: relative;
    }
    .profile-header .cover img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .profile-header .profile-img {
        position: absolute;
        bottom: -50px;
        left: 50%;
        transform: translateX(-50%);
        border: 5px solid #fff;
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Settings</h1>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="web_name" class="form-label">Web Name</label>
                    <input type="text" name="web_name" class="form-control" value="{{ $settings->web_name ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control" value="{{ $settings->meta_description ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" name="logo" class="form-control">
                    @if($settings && $settings->logo)
                        <img src="{{ asset('images/' . $settings->logo) }}" alt="Logo" class="img-thumbnail" width="100">
                    @endif
                </div>

                <div class="mb-3">
                    <label for="favicon" class="form-label">Favicon</label>
                    <input type="file" name="favicon" class="form-control">
                    @if($settings && $settings->favicon)
                        <img src="{{ asset('images/' . $settings->favicon) }}" alt="Favicon" class="img-thumbnail" width="32">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save Settings</button>
            </form>
        </div>
    </div>
</div>
@endsection
