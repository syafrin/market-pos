<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionCartDetail;
use PDF;
use App\Exports\TransaksiExport;
use Excel;
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

    public function cetak_excel(){
        $tgl = now();
        return Excel::download(new TransaksiExport, 'transaksi_detail_'.$tgl.'.xlsx'); 
    }
}
