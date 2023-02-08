<?php

namespace App\Http\Controllers;

use App\Exports\ReportsExport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{

    public function index()
    {
        $adviser = User::find(auth()->id());
        $cashLoan = $adviser->cashLoan()->whereNotNull('loan_amount')->get()->toArray();
        $reports = collect($cashLoan);
        $homeLoan = $adviser->homeLoan()->whereNotNull('property_value')->whereNotNull('down_payment_amount')->get()->toArray();
        if (count($homeLoan)) {
            $reports = $reports->merge(collect($homeLoan));
        }
        $reports = $reports->sortByDesc('created_at');
        return view('report.index', compact('reports'));
    }

    public function export()
    {
        return Excel::download(new ReportsExport(), 'reports_' . date('Y-m-d') . '.xlsx');
    }
}
