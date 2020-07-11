<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionCartDetail;
use PDF;
class SalesReportController extends Controller
{
    public function index(){
        $penjualan = TransactionCartDetail::orderBy('created_at', 'DESC')->paginate(10);
        return view('sale-report.index', compact('penjualan'));
    }

    public function cetak_pdf(){
        $penjualan = TransactionCartDetail::orderBy('created_at', 'DESC')->get();
        $pdf = PDF::loadview('sale-report.report_pdf', compact('penjualan'));
        return $pdf->stream();

    }
}
