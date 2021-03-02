<?php
    session_start();
include "../config.php";

$nick = $_POST['nick'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_c = $_POST['password-c'];

if(isset($_POST['nick'])&& isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password-c']))
$ok = true;
else 
$ok = false;

$err_nick = "";
$err_email = "";
$err_password = "";
$err_password_c = "";

if($ok)
{
    if(strlen($nick) < 3 )
    {
        $err_nick .= "Nick musi mieć minimum 3 znaki.";
        $ok = false;
    }
    if(strlen($password) < 8 )
    {
        $err_password .= "Hasło musi mieć minimum 8 znaków.";
        $ok = false;
    }
    
    if($password_c != $password)
    {
        $err_password_c .= "Hasła są różne.";
        $ok = false;
    }
}


if($ok)
{   $result = $connect->query("select count(*) as count from users where nick = '$nick'");
    $row = $result->fetch_assoc();
    if($row['count'] != 0)
    {
        $err_nick .= " Nick jest już zajęty.";
        $ok = false;
    }
    $result = $connect->query("select count(*) as count from users where email = '$email'");
    $row = $result->fetch_assoc();
    if($row['count'] != 0)
    {
        $err_email .= " E-mail jest już zajęty.";
        $ok = false;
    }
    
}



if($ok)
{
    try
    {
        $password = hash('sha256',$password);
        if($connect->query("INSERT INTO users VALUES (NULL,'$nick','$email','$password',3)"))
        {
            $connect->close();
            $_SESSION['add'] = "Pomyślnie utworzono konto.";
            header('Location: ../pages/login.php');
        }
    }
    catch(Exception $e){
        echo '<span style="color:red">Error!</span>';
        echo '<br />Info:'.$e;
    }
}
else{
    $connect->close();
    $_SESSION["err_nick"]= $err_nick;
    $_SESSION["err_password"]= $err_password;
    $_SESSION["err_email"]= $err_email;
    $_SESSION["err_password_c"]= $err_password_c;
    header('Location: ../pages/register.php');
}







?>