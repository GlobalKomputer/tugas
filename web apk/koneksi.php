<?php
$host="localhost";
$user="root";
$password="";
$db="apk";

$kon = mysqli_connect($host, $user, $password, $db);

if (!$kon){
    die("koneksi gagal" . mysql_connect_eror());
}else {
    echo "koneksi berhasil";
}



?>