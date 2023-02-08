@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Reports</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('dashboard') }}">Go back to dashboard</a>
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('report.export') }}">Export</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm w-50">
            <thead>
            <tr>
                <th scope="col">Product type</th>
                <th scope="col">Product value</th>
                <th scope="col">Creation date</th>
            </tr>
            </thead>
            <tbody>
            @forelse($reports as $report)
                <tr>
                    <td>{{ $report['type'] }}</td>
                    <td>{{ $report['product_value'] }}</td>
                    <td>{{ $report['creation_date'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" align="center">
                        No Data
                    </td>
                </tr>
            @endforelse

            </tbody>
        </table>

    </div>
@endsection