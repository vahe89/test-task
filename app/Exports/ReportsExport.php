<?php


namespace App\Exports;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportsExport implements FromCollection, WithMapping, WithHeadings
{
    public function collection()
    {
        $adviser = User::find(auth()->id());
        $cashLoan = $adviser->cashLoan()->whereNotNull('loan_amount')
            ->whereDate('created_at', Carbon::today())->get()->toArray();
        $reports = collect($cashLoan);
        $homeLoan = $adviser->homeLoan()->whereNotNull('property_value')->whereNotNull('down_payment_amount')
            ->whereDate('created_at', Carbon::today())->get()->toArray();
        if (count($homeLoan)) {
            $reports = $reports->merge(collect($homeLoan));
        }
        $reports = $reports->sortByDesc('created_at');
        return $reports;
    }

    public function headings(): array
    {
        return ["Product type", "Product value", "Creation date"];
    }

    public function map($report): array
    {
        return [
            $report['type'],
            $report['product_value'],
            $report['creation_date'],
        ];
    }
}