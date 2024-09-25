<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Web Aplikasi Input</title>
    <style>
        /* CSS untuk menyembunyikan elemen-elemen saat mencetak */
        @media print {
            .no-print {
                display: none;
            }

            /* Menyembunyikan kolom aksi dan elemen lainnya saat mencetak */
            .no-print-col {
                display: none;
            }
        }
    </style>
    <script>
        function printTable() {
            window.print();
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">APLIKASI INPUT SISWA SEDERHANA</span>





   </nav>
    <div class="container">
        <br>
        <h4 class="text-center">DAFTAR SISWA GLOBAL KOMPUTER</h4>
    <?php
    include "koneksi.php";
    if (isset($_GET['id_peserta'])){
        $id_peserta = htmlspecialchars($_GET["id_peserta"]);

        $sql = "DELETE FROM peserta WHERE id_peserta ='$id_peserta'";
        $hasil = mysqli_query($kon, $sql);

        if ($hasil){
            header("location:index.php");
        }else {
            echo "<div class = 'alert alert -danger'> data gagal dihapus.<div>";
        }
    }
    
    ?>

        <!-- Tombol Cetak dan Tambah Data (disembunyikan saat print) -->
        <div class="text-right mb-3">
            <button onclick="printTable()" class="btn btn-success no-print">Cetak Daftar Siswa</button>
        </div>

        <table class="my-3 table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Sekolah</th>
                    <th>Jurusan</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th class="no-print-col text-center" colspan='2'>Aksi</th>
                </tr>
            </thead>

            <?php
            include "koneksi.php";
            $sql = "SELECT * FROM peserta ORDER BY id_peserta DESC";

            $hasil = mysqli_query($kon, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data["nama"]; ?></td>
                        <td><?php echo $data["sekolah"]; ?></td>
                        <td><?php echo $data["jurusan"]; ?></td>
                        <td><?php echo $data["no_hp"]; ?></td>
                        <td><?php echo $data["alamat"]; ?></td>
                        <td class="no-print-col">
                            <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning" role="button">Update</a>
                        </td>
                        <td class="no-print-col">
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">Delete</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

        <!-- Tombol Tambah Data (disembunyikan saat print) -->
        <div class="text-left">
            <a href="create.php" class="btn btn-primary no-print">Tambah Data</a>
        </div>
    </div>
</body>

</html>