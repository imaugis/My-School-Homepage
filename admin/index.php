<?php
    session_start();
    $alert = "";
    if(isset($_POST['login']) && isset($_POST['passwd'])){
        require_once('../classes/Auth.class.php');
        $auth = new Auth();
        $alert = $auth->msh_LogIn($_POST['login'],$_POST['passwd']);
    }
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>My School Homepage | Connexion</title>
            <meta charset="utf-8" />
            <link rel="stylesheet" type="text/css" href="../css/style.css" />
        </head>
        <body>
            <div id="login-form">
                <img src="../img/logo.png" />
                <?php echo $alert; ?>
                <form method="POST" action="#">
                    <input type="text" id="login" name="login" placeholder="Identifiant" tabindex="10">
                    <input type="password" id="passwd" name="passwd" placeholder="Mot de passe" tabindex="20">
                    <input type="submit" value="Connexion">
                </form>
            </div>
        </body>
    </html>