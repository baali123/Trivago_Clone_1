<?php 
    if (isset($_POST['signup-submit'])) {
        require 'dbh.inc.php';
        $username=$_POST['uid'];
        $mail=$_POST['email'];
        $password=$_POST['password'];
        $password_repeat=$_POST['password_repeat'];
        // error handlers
        if (empty($username) ||empty($mail) ||empty($password) ||empty($password_repeat)  ) {
            header("Location: ../register.php?error=emptyfields");
            exit();
        }
        if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
            header("Location: ../register.php?error=invalidemail");
            exit();
        }
        elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            header("Location: ../register.php?error=invaliduid");
            exit();
        }
        elseif($password !== $password_repeat){
            header("Location: ../register.php?error=passwordcheck");
            exit();
        }
        else {
            // echo "hii";
            $sql="SELECT uidUsers FROM users WHERE uidUsers = ? OR emailUsers = ?";
            $stmt=mysqli_stmt_init($conn);
            if (! mysqli_stmt_prepare($stmt,$sql) ) {
                header("Location: ../register.php?error=sqlerror");
                exit();
            } 
            else{
                mysqli_stmt_bind_param($stmt,"ss",$username,$mail);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultcheck=mysqli_stmt_num_rows($stmt);
                if($resultcheck>0){
                    header("Location: ../register.php?error=usermailtaken");
                    exit();
                }
                else{
                    $sql="INSERT INTO users (uidUsers,emailUsers,pwdUsers) VALUES (?,?,?)";
                    $stmt=mysqli_stmt_init($conn);
                    if (! mysqli_stmt_prepare($stmt,$sql) ) {
                        header("Location: ../register.php?error=sqlerror");
                        exit();
                    }
                    else{
                        $hashpwd=password_hash($password,PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt,"sss",$username,$mail,$hashpwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../register.php?signup=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        // echo "hii";
        header("Location: ../register.html?error=indirectaccess");
        exit();
    }