
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Voyager</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
</head>

<body class="bg-gradient-warning">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-flex">
                        <div class="flex-grow-1 bg-register-image" style="background-image: url(&quot;assets/img/sideimage/image2.jpg&quot;);"></div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                                <?php 
                                if(isset($_GET['error'])){
                                    if($_GET['error']== 'emptyfields'){
                                        echo '<p class="text-danger mb-4">please enter all the details</p> ';
                                    }
                                    else if($_GET['error']=='invalidemail'){
                                        echo '<p class="text-danger mb-4">please enter a valid mail</p> ';
                                    }
                                    else if($_GET['error']=='invaliduid'){
                                        echo '<p class="text-danger mb-4">please enter a valid username</p> ';
                                    }
                                    else if($_GET['error']=='passwordcheck'){
                                        echo '<p class="text-danger mb-4">password did not match</p> ';
                                    }
                                    else if($_GET['error']=='usermailtaken'){
                                        echo '<p class="text-danger mb-4">email or username taken</p> ';
                                    }
                                    else if($_GET['error']=='sqlerror'){
                                        echo '<p class="text-danger mb-4">problem with database could not register</p> ';
                                    }
                                    else if($_GET['error']=='indirectaccess'){
                                        echo '<p class="text-danger mb-4">Please dont try to inappropriatly access the sysyem files </p> ';
                                    }
                                }
                                else if(isset($_GET['signup'])){
                                    if($_GET['signup']=='success'){
                                        echo '<p class="text-success mb-4">Registered</p> ';
                                    }
                                }
                                ?>
                            </div>
                            
                            <form class="user" action="includes/signup.inc.php" method="POST" >
                                <div class="form-group"><input   class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="User Name" name="uid"></div>
                                <div class="form-group"><input   class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email"></div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input   class="form-control form-control-user" type="password" id="examplePasswordInput" placeholder="Password" name="password"></div>
                                    <div class="col-sm-6"><input   class="form-control form-control-user" type="password" id="exampleRepeatPasswordInput" placeholder="Repeat Password" name="password_repeat"></div>
                                </div><button class="btn btn-primary btn-block text-white btn-user" type="submit" name="signup-submit">Register Account</button>
                                <hr><a class="btn btn-primary btn-block text-white btn-google btn-user" role="button"><i class="fab fa-google"></i>&nbsp; Register with Google</a><a class="btn btn-primary btn-block text-white btn-facebook btn-user" role="button"><i class="fab fa-facebook-f"></i>&nbsp; Register with Facebook</a>
                                <hr>
                            </form>
                            <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                            <div class="text-center"><a class="small" href="login.php">Already have an account? Login!</a></div>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>