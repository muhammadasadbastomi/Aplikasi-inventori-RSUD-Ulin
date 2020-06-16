<h1>Informasi tagihan pemesanan</h1>
<tr>
    <th>No</th>
    <th>Nama Barang</th>
</tr>
<tr>
    <td>1</td>
    <td>{{$alamat}}</td>
</tr>
@foreach($pemesanan->pemesanan_detail as $d)
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$d->barang->nama_barang}}</td>
</tr>
@endforeach