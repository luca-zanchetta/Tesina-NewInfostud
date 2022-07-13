<?php
require_once('phpFunctions.php');

session_start();
if(isset($_SESSION['login'])) header('Location: homepage.php');
/*utente non ancora loggato*/
if(isset($_POST['matricola']) && isset($_POST['password'])){
    /*controlliamo i dati inseriti*/
    if(existsUser($_POST['matricola'], $_POST['password'])){
        $_SESSION['login'] = getUserByUsername($_POST['matricola']);
        header('Location: homepage.php');
    }
    else {
        /*in questo caso l'utente ha inserito dati sbagliati*/ 
        $user = getUserByUsername($_POST['matricola']);
        /*username o password sbagliati*/  
    }
}
?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Login - Infostud</title>
    <link rel="stylesheet" href="stileLogin.css">
</head>

<body>


<div class="header">
    <div class="nav-left">
        <div class="nav-logo">
            <a href="homepage.php">
                <img src="https://store-images.s-microsoft.com/image/apps.51215.9007199266623456.05e3a154-d5ac-49d8-af6e-ab2f789dc26d.f443b25b-1668-48aa-8137-f8e5609aee45?mode=scale&q=90&h=300&w=300" alt="logo" width="90px">
            </a>
        </div>
        <div class="vertical-bar"></div>
            <h2>
                Infostud
            </h2>
    </div>
    <div class="nav-right">
        <img src="account.png" alt="dasdas" width="100px">
    </div>
</div>
<div class="central-block">
    <div class="body">
        <h2 class="title">Login Amministratori</h2> 

        <form action="login.php" method="post">
        <div class="box">
            <h2>Username:</h2>
            <?php if(isset($user)) echo "<span style=\"color:red;\">Username sbagliato</span><br />"; ?>
            <input class="textField" type="text" name="matricola" value="<?php if(isset($user)) echo $user->nome?>">
            <br />
            <h2>Password:</h2>
            <input class="textField" type="password" name="password">
        </div> 
        <div>
            <input class="bottoni" type="submit" name="invio" value="LOGIN">
        </div>
        </form>
        <?php
           
        ?>
    </div>
</div>

</body>
</html>