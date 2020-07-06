<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Rupiah;
class ProductResource extends JsonResource
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
            'kd_produk' => $this->kd_produk,
            'kd_kategori' => $this->kd_kategori,
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga,
            'harga_rupiah' => Rupiah::get_rupiah($this->harga),
            'img_produk' => env('ASSET_URL')."/uploads/".$this->img_produk,
            'stok' => $this->stok,
            'kategori' => $this->category->kategori
        ];
    }
}
