<form action="kwu-tambah.php" method="POST">
    <label for="kodebarang">kodebarang:</label><br>
    <input type="number" name="kodebarang" placeholder="Ex.1200310223"/><br>

    <label for="tanggal">tanggal:</label><br>
    <input type="date" name="tanggal" placeholder="Ex.15"/><br>

    <label for="pembeli">pembeli:</label><br>
    <input type="text" name="pembeli"/> <br>

    <label for= "namabarang">namabarang:</label><br>
    <input type= "text" name= "namabarang" placeholder= "EX.indomie"/><br>

    <label for= "qty">qty:</label><br>
    <input type= "number" name= "qty" placeholder= "EX.2"/><br>

    <label for= "hargabeli">hargabeli:</label><br>
    <input type= "number" name= "hargabeli" placeholder= "EX.3000"/><br>

    <label for= "hargajual">hargajual:</label><br>
    <input type= "number" name= "hargajual" placeholder= "EX.5000"/><br>
    <br>
    <input type="submit" name="simpan" value="simpan data"/>
    <a href="kwu.php"> kembali </a>
</form>
<?php
    include('./kwu-config.php');
    echo "<a href= 'kwu-tambah.php'>tambah data</a>";
    echo "<hr>";

    // Menampilkan data dari database
    $no =1;
    $tabledata = "";
    $data = mysqli_query($mysqli,"SELECT * FROM transaksi");
    while($row = mysqli_fetch_array($data)){
        $totalhargabeli=($row["qty"]*$row["hargabeli"]);
        $totalhargajual=($row["qty"]*$row["hargajual"]);
        $laba=($totalhargajual - $totalhargabeli);
        $tabledata .="
        <tr>
            <td>".$no.".</td>
            <td>".$row["kodebarang"]."</td>
            <td>".$row["tanggal"]."</td>
            <td>".$row["pembeli"]."</td>
            <td>".$row["namabarang"]."</td>
            <td>".$row["qty"]."</td>
            <td>".$row["hargabeli"]."</td>
            <td>".$row["hargajual"]."</td>

            <td>".$totalhargabeli."</td>
            <td>".$totalhargajual."</td>
            <td>".$laba."</td>
            
            <td>

            <a href='kwu-edit.php?kodebarang=".$row["kodebarang"]."'>edit</a>
            &nbsp;-&nbsp;
            <a href='kwu-hapus.php?kodebarang=".$row["kodebarang"]."'
            onclick='return cofirm(\"Ya/Tidak ?\");'>hapus</a>

            </td>
        </tr>
    ";
    $no++;
    }

    echo "
    <table cellpadding=5 border=1 cellspacing=0>
        <tr>
          <th>no</th>
          <th>kodebarang</th>
          <th>tanggal</th>
          <th>pembeli</th>
          <th>namabarang</th>
          <th>qty</th>
          <th>hargabeli</th>
          <th>hargajual</th>
          <th>totalhargabeli</th>
          <th>totalhargajual</th>
          <th>laba</th>
          <th>Aksi</th>
        </tr>
         $tabledata
    </table>
    ";
?>