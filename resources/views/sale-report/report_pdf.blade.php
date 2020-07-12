<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h3, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Report Penjualan</h3>
    <hr/>
    <table style="width:100%;" border="1">
        <thead>
            <tr>
                <th widht="5%">no</th>
                <th>nama produk</th>
                <th>jumlah</th>
                <th>harga</th>
                <th>total</th>
                <th>tanggal</th>
                <th>agen</th>
            </tr>
        </thead>
        <tbody>
                @foreach($penjualan as $row)
              
                <tr>
                   <td>{{ $loop->iteration }}</td>
                   <td>{{ $row->product->nama_produk }}</td>   
                   <td>{{ $row->jumlah }}</td>   
                   <td>@rupiah($row->harga)</td>   
                   <td>@rupiah($row->jumlah * $row->harga)</td>   
                   <td>{{ $row->transaction->tgl_penjualan }}</td>   
                   <td>{{ $row->transaction->agent->nama_toko }}</td> 
                </tr>
                @endforeach
        </tbody>
    </table>
</body>
</html>