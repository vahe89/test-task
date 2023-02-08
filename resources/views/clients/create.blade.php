@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Create client</h1>
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
                    <form class="form-horizontal" method="post" action="{{ route('clients.store') }}"
                          id="create-project-form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="client[first_name]" value="{{ old('client.first_name') }}"
                                   class="@error('client.first_name') is-invalid @enderror form-control">
                            @error('client.first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="first_name">Last Name</label>
                            <input type="text" id="last_name" name="client[last_name]" value="{{ old('client.last_name') }}"
                                   class="@error('client.last_name') is-invalid @enderror form-control">
                            @error('client.last_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="client[email]" value="{{ old('client.email') }}"
                                   class="@error('client.email') is-invalid @enderror form-control">
                            @error('client.email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="number">Phone Number</label>
                            <input type="number" id="number" name="client[phone_number]" value="{{ old('client.phone_number') }}"
                                   class="@error('client.first_name') is-invalid @enderror form-control">
                            @error('client.phone_number')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <h4>Cash loan product</h4>
                            <label for="loan_amount">Loan amount</label>
                            <input type="number" id="loan_amount" name="loan_amount" value="{{ old('loan_amount') }}"
                                   class="@error('loan_amount') is-invalid @enderror form-control">
                            @error('loan_amount')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <h4>Home loan product</h4>
                            <label for="property_value">Property Value</label>
                            <input type="number" id="property_value" name="property_value" value="{{ old('property_value') }}"
                                   class="@error('property_value') is-invalid @enderror form-control">
                            @error('property_value')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="down_payment_amount">Down payment amount</label>
                            <input type="number" id="down_payment_amount" name="down_payment_amount" value="{{ old('down_payment_amount') }}"
                                   class="@error('down_payment_amount') is-invalid @enderror form-control">
                            @error('down_payment_amount')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection