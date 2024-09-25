<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Peserta</title>
    <!-- Menggunakan CDN Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <?php
           include "koneksi.php";

           function input($data)
           {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;

           }

           //cek apakah ada kiriman form dari metode post
           if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $nama = input($_POST["nama"]);
            $sekolah = input($_POST["sekolah"]);
            $jurusan = input($_POST["jurusan"]);
            $no_hp = input($_POST["no_hp"]);
            $alamat = input($_POST["alamat"]);

            // query input data ke dalam tabel peserta
            $sql = "INSERT INTO peserta (nama,sekolah,jurusan ,no_hp,alamat)
            VALUES ('$nama','$sekolah','$jurusan','$no_hp','$alamat')";

            // menjalankan query di atas 
            $hasil = mysqli_query($kon, $sql);

            // apakah berhasil atau tidak dalam menjalankan query
            if ($hasil){
                header("location: index.php");
            }else{
                echo "<div class = 'alert alert-danger'> data gagal disimpan.</div>";
            }
           }
        
        ?>

        <h2>Input Data Peserta</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan Nama" required>
            </div>
            <div class="mb-3">
                <label for="sekolah" class="form-label">Sekolah:</label>
                <input type="text" name="sekolah" class="form-control" id="sekolah" placeholder="Masukkan Nama Sekolah" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan:</label>
                <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Masukkan Jurusan" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP:</label>
                <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukkan No HP" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="3" placeholder="Masukkan Alamat" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>