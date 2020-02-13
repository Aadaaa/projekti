


<?php
function sanitize($dirty){
    return htmlentities($dirty,ENT_QUOTES,"UTF-8");
}

#funksion qe sherben per logimin e adminit
function login($userID) {
    $_SESSION['casf_user'] = $userID;
    global $db;
    $date = date("Y-m-d H:i:s");
    $db->query("UPDATE users SET last_login = '$date' WHERE id = '$userID' ");
    $_SESSION['logged_in'] = 'Ju u loguat me sukses';
    header("Location: index.php");
}

#funksion qe kontrollon qe admini eshte loguar
function is_logged_in(){
    if(isset($_SESSION['casf_user']) && $_SESSION['casf_user'] > 0){
        return true;
    }
        return false;
}

function login_error_check($redirect = 'login.php'){
    $_SESSION['error_flash'] = 'Ju duhet te hyni per te pare faqen!';
    header('Location: '.$redirect);
}

function permission_error($url = 'index.php'){
  $_SESSION['permission_error'] = 'Ju nuk keni akses ne kete faqe!';
  header('Location: '.$url);
}

function permission($permission = 'admin'){
  global $user_info;
  $permissions = explode(',', $user_info['permissions']);
  if(in_array($permission, $permissions,true)) {
    return true;
  }
    return false;
}

 ?>
