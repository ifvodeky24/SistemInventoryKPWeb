<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  /*text-align: left;    */
}
table#t01 {
  width: 100%;    
  background-color: #f1f1c1;
}

</style>

<!-- <label style="font-size:17px;font-family:'Times New Roman', Times, serif;">
  Barang atau pekerjaan tersebut telah diterima dan diselesaikan dengan baik oleh :
</label> -->

<div id="centrar">
 <b><p style="text-align: center;font-size:16px;">
   LAPORAN DATA BARANG MASUK<br>
   PT. PERKASA BETON READYMIX</p>
</div>

 <table style="width:100%" border="1" style='font-family:"Courier New", Courier, monospace; font-size:10%'>
  <tr>
    <th>No.</th>
    <th>Nama Barang</th> 
    <th>Jenis Barang</th>
    <th>Harga Barang</th>
    <th>Jumlah Barang</th>
    <th>Satuan Barang</th>
    <th>Tanggal Masuk</th>
    
  </tr>
  <?php 

$no=1; foreach ($modelasset as $value) {?>
  <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $value['nama_barang']?></td>
      <td><?php echo $value['jenis_barang']?></td>
      <td><?php echo "Rp. ", number_format($value['harga_barang'])?></td>
      <td><?php echo $value['jumlah_barang']?></td>
      <td><?php echo $value['satuan_barang']?></td>
      <td><?php echo $value['tanggal_masuk']?></td>
          
    </tr>
  <?php 
  $no++; }
 ?>
  
</table>
<br>
<p style="margin-left:590px; font-size:10px;font-family:'Times New Roman', Times, serif;">
  Mengetahui, <br> Manager HRD
</p>
<br>
<p style="margin-left:590px; font-size:10px;font-family:'Times New Roman', Times, serif;">
  (Sarah Angelina) 
</p>