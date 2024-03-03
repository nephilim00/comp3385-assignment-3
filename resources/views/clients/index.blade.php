@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Clients List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Address</th>
                <th>Logo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr>
                <td>{{ $client->name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->telephone }}</td>
                <td>{{ $client->address }}</td>
                <td>
                    @if ($client->company_logo)
                    <img src="{{ asset('storage/'.$client->company_logo) }}" width="100" alt="logo">
                    @else
                    No logo
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
