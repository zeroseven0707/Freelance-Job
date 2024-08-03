@extends('layout.app')
@section('content')
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-12 user-info">
            <div class="card dashboard-card">
                <div class="card-header bg-info text-white">
                    <h3>Welcome, {{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <p>Email: {{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card dashboard-card border-primary">
                <div class="card-header bg-primary text-white">
                    <h4>Keywords</h4>
                </div>
                <div class="card-body text-center">
                    <h1>{{ $keywords }}</h1>
                    <p>Total Keywords</p>
                    <a href="{{ url('freelance/keywords') }}" class="btn btn-outline-primary">View</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card dashboard-card border-success">
                <div class="card-header bg-success text-white">
                    <h4>Content Ideas</h4>
                </div>
                <div class="card-body text-center">
                    <h1>{{ $content }}</h1>
                    <p>Total Content Ideas</p>
                    <a href="{{ url('/freelance/content-ideas') }}" class="btn btn-outline-success">View</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
