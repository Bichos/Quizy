<?php
    session_start();

    
include "../config.php";


$email = $_POST['email'];
$password = $_POST['password'];
if(isset($_POST['email']) && isset($_POST['password']))
$ok = true;
else 
$ok = false;


$err_email = "";
$err_password = "";

$password = hash('sha256',$password);

if($ok)
{
    $result= $connect->query("select count(*) as count from users where email = '$email'");
    $row = $result->fetch_assoc();
    if($row['count'] == 0)
    {
        
        $err_email .= " E-mail jest nie poprawny.";
        $ok = false;
    }
    else
    {
        $result= $connect->query("select count(*) as count from users where password = '$password' and email = '$email'");
        $row = $result->fetch_assoc();
        if($row['count'] == 0)
        {
            $err_password .= " Hasło jest nie poprawne.";
            $ok = false;
        }
    }

    
}



if($ok)
{
    try
    {
        $result = $connect->query("SELECT id, role FROM users where password = '$password' and email = '$email'");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $id = $row['id'];
              $role = $row['role'];
            } 
            $connect->close();
            $_SESSION['id_user'] = $id;
            $_SESSION['role'] = $role;
            header('Location: ../pages/menu.php');
          } 

    }    
    catch(Exception $e){
        echo '<span style="color:red">Error!</span>';
        echo '<br />Info:'.$e;
    }
}
else{
    $connect->close();
    $_SESSION["err_password"]= $err_password;
    $_SESSION["err_email"]= $err_email;
    header('Location: ../pages/login.php');
}







?>