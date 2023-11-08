<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $nama_user = $_POST['nama_user'];
    $no_hp_user = $_POST['no_hp_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_user = $_POST['role_user'];

    $insert = mysqli_query($con,"INSERT INTO tb_user (nama_user, no_hp_user, username, password , role_user) VALUES ('$nama_user','$no_hp_user','$username','$password','$role_user')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data user';
    }else{
        $error = 'Gagal menambahkan data user';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?user');
}

//proses ubah
if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $no_hp_user = $_POST['no_hp_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role_user = $_POST['role_user'];

    $update = mysqli_query($con,"UPDATE tb_user SET nama_user='$nama_user', no_hp_user='$no_hp_user', username='$username', password='$password', role_user='$role_user' WHERE id_user='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update){
        $success = 'Berhasil mengubah data user';
    }else{
        $error = 'Gagal mengubah data user';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?user');
}


//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM tb_user WHERE id_user='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data user';
    }else{
        $error = 'Gagal menghapus data user';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?user');
}

?>