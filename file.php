<?php 
$db = new mysqli('localhost','root','','databaza');
if(!$db) {
    echo 'Ju lutem kontrolloni veprimet!Nuk mund te lidhemi me databazen!';
}

require_once $_SERVER['DOCUMENT_ROOT'].'/explorelibrazhd/konfig.php';
require_once BASEURL.'funksione.php';

session_start();

if(isset($_SESSION['casf_user'])){
  $userID = $_SESSION['casf_user'];
  $sql= $db->query("SELECT * FROM users WHERE id = '$userID' ");
  $user_info = mysqli_fetch_assoc($sql);
  $fn= explode(' ',$user_info['emri']);
  @$user_info['first'] = $fn[0];
  @$user_info['last'] = $fn[1];
}

if(isset($_SESSION['error_flash'])){
    echo '<div class="w3-black w3-center">'.$_SESSION['error_flash'].'</div> ';
    unset($_SESSION['error_flash']);
}

if(isset($_SESSION['user_adding_error'])){
    echo '<div class="w3-red w3-center">'.$_SESSION['user_adding_error'].'</div> ';
    unset($_SESSION['user_adding_error']);
}

 if(isset($_SESSION['logged_in'])){
    echo '<div class="w3-green w3-center">'.$_SESSION['logged_in'].'</div> ';
    unset($_SESSION['logged_in']);
}

if(isset($_SESSION['vende_success'])){
    echo '<div class="w3-green w3-center">'.$_SESSION['vende_success'].'</div> ';
    unset($_SESSION['vende_success']);
}

if(isset($_SESSION['Dhoma_success'])){
    echo '<div class="w3-green w3-center">'.$_SESSION['Dhoma_success'].'</div> ';
    unset($_SESSION['Dhoma_success']);
}

if(isset($_SESSION['add_admin'])){
    echo '<div class="w3-green w3-center">'.$_SESSION['add_admin'].'</div> ';
    unset($_SESSION['add_admin']);
}

if(isset($_SESSION['permission_error'])){
    echo '<div class="w3-red w3-center">'.$_SESSION['permission_error'].'</div> ';
    unset($_SESSION['permission_error']);
}


?>