<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Rupiah;
class TransactionSaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'kd_tsale' => $this->kd_tsale,
            'no_faktur' => $this->no_faktur,
            'tgl_penjualan' => $this->tgl_penjualan,
            'kd_agen' => $this->kd_agen,
            'username' => $this->username,
            'total'=> $this->total,
            'total_rupiah' => Rupiah::get_rupiah($this->total)
        ];
    }
}
