@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Client: {{ $client->fullName }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('clients.index') }}">Go back to clients</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="{{ route('clients.update', $client->id) }}"
                          id="create-project-form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="hidden" name="client_id" value="{{$client->id}}">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="client[first_name]" value="{{ $client->first_name }}"
                                   class="@error('client.first_name') is-invalid @enderror form-control">
                            @error('client.first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="first_name">Last Name</label>
                            <input type="text" id="last_name" name="client[last_name]" value="{{ $client->last_name }}"
                                   class="@error('client.last_name') is-invalid @enderror form-control">
                            @error('client.last_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="client[email]" value="{{ $client->email }}"
                                   class="@error('client.email') is-invalid @enderror form-control">
                            @error('client.email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="number">Phone Number</label>
                            <input type="number" id="number" name="client[phone_number]" value="{{ $client->phone_number }}"
                                   class="@error('client.phone_number') is-invalid @enderror form-control">
                            @error('client.phone_number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <h4>Cash loan product</h4>
                            <label for="loan_amount">Loan amount</label>
                            <input type="number" id="loan_amount" name="cash_loan_amount" value="{{ $client->cashLoan ? $client->cashLoan->loan_amount : '' }}"
                                   class="@error('cash_loan_amount') is-invalid @enderror form-control">
                        </div>

                        <div class="form-group">
                            <h4>Home loan product</h4>
                            <label for="property_value">Property Value</label>
                            <input type="number" id="property_value" name="property_value" value="{{ $client->homeLoan ? $client->homeLoan->property_value : '' }}"
                                   class="@error('property_value') is-invalid @enderror form-control">
                        </div>

                        <div class="form-group">
                            <label for="down_payment_amount">Down payment amount</label>
                            <input type="number" id="down_payment_amount" name="down_payment_amount" value="{{ $client->homeLoan ? $client->homeLoan->down_payment_amount : '' }}"
                                   class="@error('down_payment_amount') is-invalid @enderror form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection