@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Clients</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('dashboard') }}">Go back to dashboard</a>
                <a class="btn btn-sm btn-outline-success" href="{{ route('clients.create') }}">Create</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Cash loan</th>
                <th scope="col">Home Load</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->first_name }}</td>
                    <td>{{ $client->last_name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td>{{ $client->cashLoan && $client->cashLoan->product_value ? 'Yes' : 'No' }}</td>
                    <td>{{ $client->homeLoan && $client->homeLoan->product_value ? 'Yes' : 'No' }}</td>
                    <td>
                        <a class="btn btn-sm btn-outline-primary"
                           href="{{ route('clients.edit', ['id' => $client->id]) }}">Edit</a>
                        <form class="d-inline-block" method="post"
                              action="{{ route('clients.delete', ['id' => $client->id]) }}">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-outline-danger delete_banner"
                                    onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" align="center">
                        No Data
                    </td>
                </tr>
            @endforelse

            </tbody>
        </table>
    </div>
@endsection