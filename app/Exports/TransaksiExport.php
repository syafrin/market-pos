<?php

namespace App\Exports;

use App\TransactionCartDetail;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class TransaksiExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {
        return view('sale-report.cetak_excel', [
            'sale' => TransactionCartDetail::orderBy('created_at')->get()
        ]);
    }
}
