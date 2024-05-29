<?php
session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","stockbarang");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function getPurchasingOrders($conn) {
    $query = "SELECT * FROM purchasing_order";
    $result = mysqli_query($conn, $query);
    return $result;
}

//menambah barang baru
if(isset($_POST['addnewbarang'])){
    $nama_barang = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    $addtotable = mysqli_query($conn,"insert into stock (nama_barang, deskripsi, stock) values('$nama_barang','$deskripsi','$stock')");
    if($addtotable){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
}

//menambahkan data purchasing order
if(isset($_POST['addnewpurchasing_order'])){
    $kode_purchasing_order = $_POST['kode_purchasing_order'];
    $tanggal = $_POST['tanggal'];
    $deskripsi= $_POST['deskripsi'];
    $harga= $_POST['harga'];
    $jumlah= $_POST['jumlah'];
    $total= $_POST['total'];
    $tanggal_pengiriman= $_POST['tanggal_pengiriman'];

    $purchasing_add = "INSERT INTO purchasing_order (kode_purchasing_order, tanggal, deskripsi, harga, jumlah, total, tanggal_pengiriman) VALUES ('$kode_purchasing_order', '$tanggal', '$deksripsi' ,'$harga', '$jumlah', '$total', '$tanggal_pengiriman')";
    if(mysqli_query($conn, $purchasing_add)){
        echo "Success";
        header('location:purchasing_order.php');
    } else {
        echo 'Failed';
        header('location:index.php');
    }
}
?>