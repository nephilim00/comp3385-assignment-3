@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-9">
            <h1>Dashboard</h1>
            <p>Welcome to your dashboard. Here you can manage your account, your clients and much more.</p>
        </div>
        <div class="col-md-3 text-end">
            <!-- Adjust the margin to position the button correctly -->
            <a href="{{ route('clients.create') }}" class="btn btn-primary mt-3">+ Create Client</a>
        </div>
    </div>


    <!-- Client Cards -->
    <div class="row">
        @foreach ($clients as $client)
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <img src="{{ asset('storage/' . $client->company_logo) }}" class="card-img-top p-3" alt="{{ $client->name }} logo" style="max-height: 150px; object-fit: contain; margin: 0 auto;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: blue;">{{ $client->name }}</h5>
                        <p class="card-text">{{ $client->email }}</p>
                        <p class="card-text">{{ $client->telephone }}</p>
                        <p class="card-text">{{ $client->address }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
