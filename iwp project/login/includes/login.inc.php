<?php 
    // echo "hii";
    if (isset($_POST['login-submit'])) {
        require 'dbh.inc.php';
        $uid=$_POST['email'];
        $password=$_POST['login-password'];
        // error handlers
        if (empty($uid) ||empty($password) ) {
            header("Location: ../login.php?error=emptyfields");
            exit();
        }
        else {
            $sql="SELECT * FROM users WHERE uidUsers = ? OR emailUsers = ?";
            $stmt=mysqli_stmt_init($conn);
            if (! mysqli_stmt_prepare($stmt,$sql) ) {
                header("Location: ../login.php?error=sqlerror");
                exit();
            } 
            else{
                mysqli_stmt_bind_param($stmt,"ss",$uid,$uid);
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                if($rows= mysqli_fetch_assoc($result)){
                    $pwdcheck=password_verify($password,$rows['pwdUsers']);
                    // echo print_r( $rows);
                    // exit();
                    if($pwdcheck == false){
                        header("Location: ../login.php?error=wrongpwd");
                        exit();
                    }
                    else if($pwdcheck == true){
                        session_start();
                        $_SESSION['username']=$rows['uidUsers'];
                        header("Location: ../../index.php?login=success");
                        exit();
                    }
                }
                else {
                    header("Location: ../login.php?error=nouser");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
        
    else{
        header("Location: ../login.php?error=indirectaccess");
        exit();
    }