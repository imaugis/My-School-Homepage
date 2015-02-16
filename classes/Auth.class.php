<?php
    /*
     * This class manage authentication.
     */
    class Auth {

        /*
         * This function allow a user to connect to OSMOSE.
         */
        public function msh_LogIn($login,$passwd){
            // Connecting to database
            require_once('../msh_config.php');
            mysql_connect(MSH_DB_HOST,MSH_DB_USER,MSH_DB_PASSWD);
            mysql_select_db(MSH_DB_DATABASE);
            mysql_query("SET NAMES UTF8"); 
            // Getting the stored password associated to the login
            $login = addslashes($login);
            $storedPass = "SELECT user_passwd FROM msh_users WHERE user_login = '".$login."'";
            $req = mysql_query($storedPass) OR DIE(mysql_error());
            $result = mysql_num_rows($req);
            if($result == 1){
                // Including PhPass library to check the password
                $result = mysql_fetch_array($req);
                $storedPass = $result['user_passwd'];
                require_once('../libs/PasswordHash.php');
                $hasher = new PasswordHash(8,false);
                $checkHash = $hasher->CheckPassword($passwd,$storedPass);
                if($checkHash){
                    // If password matches, getting the user's informations and starting session
                    $sql = "SELECT * FROM msh_users WHERE user_login = '".$login."'";
                    $req = mysql_query($sql) OR DIE(mysql_error());
                    $result = mysql_fetch_array($req);
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['user_login'] = $result['user_login'];
                    $_SESSION['user_firstname'] = $result['user_firstname'];
                    $_SESSION['user_lastname'] = $result['user_lastname'];
                    $_SESSION['user_avatar'] = $result['user_avatar'];
                    header('Location:dashboard.php');
                }else{
                    $alert = "<p class='alert alert-danger'>Les identifiants ne sont pas valides.</p>";
                    return $alert;
                }
            }else{
                $alert = "<p class='alert alert-danger'>Les identifiants ne sont pas valides.</p>";
                return $alert;
            }
        }

        /*
         * This function check if a user is connected.
         */
        public function msh_IsLogged(){
            if(isset($_SESSION['id']) && isset($_SESSION['user_login']) && isset($_SESSION['user_firstname']) && isset($_SESSION['user_lastname'])){
                return true;
            }else{
                return false;
            }
        }

        /*
         * This function disconnect a user.
         */
        public function msh_LogOut(){
            $_SESSION = array();
            session_destroy();
            header('Location:index.php');
        }
    }
?>
