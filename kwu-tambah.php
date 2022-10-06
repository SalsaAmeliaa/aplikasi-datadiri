<h1>Tambah Data</h1>
<form action="kwu-tambah.php" method="POST">
      <label for="kodebarang">kodebarang :</label><br>
      <input type="number" name="kodebarang" placeholder="Ex. 1200310223" /><br>

      <label for="tanggal">tanggal :</label><br>
      <input type="date" name="tanggal" placeholder="Ex. 13" /><br>

      <label for="pembeli">pembeli :</label><br>
      <input type="text" name="pembeli" /><br>

      <label for="namabarang">nambarang :</label><br>
      <input type="text" name="namabarang" placeholder="Ex.indomie" /><br>

      <label for="qty">qty :</label><br>
      <input type="number" name="qty" placeholder="Ex. 2" /><br>

      <label for="hargabeli">hargabeli :</label><br>
      <input type="number" name="hargabeli" placeholder="Ex. 3000" /><br>

      <label for="hargajual">hargajual :</label><br>
      <input type="number" name="hargajual" placeholder="Ex. 5000" /><br>
      <br>
      <input type="submit" name="simpan" value="Simpan Data" />
      <a href="input-datadiri.php">Kembali</a>
</form>

<?php
      if( isset($_POST["simpan"]) ){
            $kodebarang = $_POST["kodebarang"];
            $tanggal = $_POST["tanggal"];
            $pembeli = $_POST["pembeli"];
            $namabarang = $_POST["namabarang"];
            $qty = $_POST["qty"];
            $hargabeli = $_POST["hargabeli"];
            $hargajual = $_POST["hargajual"];

            // CREATE - Menambahkan Data ke Database
            $query = "
                  INSERT INTO transaksi VALUES
                  ('$kodebarang', '$tanggal', '$pembeli', '$namabarang', '$qty', '$hargabeli', '$hargajual');
            ";

            include ('./kwu-config.php');
            $insert = mysqli_query($mysqli, $query);

            if ($insert){
                  echo "
                        <script>
                              alert('Data berhasil ditambahkan');
                              window.location='kwu.php';
                        </script>
                  ";
            }

      }
?>