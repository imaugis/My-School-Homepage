<?php
    session_start();
    require_once('../classes/Auth.class.php');
    $auth = new Auth();
    if($auth->msh_IsLogged()){

    }else{
        header('Location:index.php');
    }
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <link rel="stylesheet" type="text/css" href="../css/style.css" />
            <title>My School Homepage | Liste des sites</title>
            
            <script type="text/javascript" language="javascript">
            function ConfirmDeleteMessage(URL)
            {
               if (confirm("Êtes-vous sûr de vouloir supprimer ce site ?"))
               {
                   window.location = URL;
               }
            }
	</script>
        </head>
        <body>
            <div id="top">
                <div id="header">
                    <div id="logo">
                        <img src="../img/logo.png" />
                    </div>
                    <div id="user-panel">
                        <ul>
                            <li><span><?php echo $_SESSION['user_firstname'] . " " . $_SESSION['user_lastname']; ?> (<?php echo $_SESSION['user_login']; ?>)</span><img <?php echo "src='../" . $_SESSION['user_avatar'] . "'"; ?> />
                                <ul>
                                    <li><a href="logout.php">Déconnexion</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        