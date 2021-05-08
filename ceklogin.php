<?php

session_start();

include 'koneksi.php';


$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($koneksi,"SELECT * FROM login WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){

 $data = mysqli_fetch_assoc($login);

 if($data['level']=="admin"){

  $_SESSION['username'] = $username;
  $_SESSION['level'] = "admin";
  header("location:admin/index.php");

 }else if($data['level']=="enggineering"){
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "enggineering";
  header("location:user/index.php.php");

 }else{

  header("location:index.php");
 } 
}else{
 header("location:index.php");
}

?>