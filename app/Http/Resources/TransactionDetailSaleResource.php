<?php

namespace App\Http\Resources;
use Rupiah;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionDetailSaleResource extends JsonResource
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
            'kd_saledetail' => $this->kd_saledetail,
            'no_faktur' => $this->no_faktur,
            'kd_produk' => $this->kd_produk,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
            'harga_rupiah' => Rupiah::get_rupiah($this->harga),
            'nama_produk' => $this->product->nama_produk,
            'kategori' =>$this->product->category->kategori,
            'img_produk' => env('ASSET_URL')."/uploads/".$this->product->img_produk
        ];
    }
}
