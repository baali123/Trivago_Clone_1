
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
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <?php
                                if($_GET['for']!='hotel'){
                                echo '<h4 class="text-dark mb-4">enter passenger details</h4>';
                                echo '<form class="user" action="includes/signup.inc.php"  >';
                                    for($i=1;$i<=$_GET["seats"];$i++){
                                        echo '<div class="text-left"><h5>For Passenger '.$i.': </h5></div>';
                                        echo'
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0"><input   class="form-control form-control-user" type="text" id="examplePasswordInput" placeholder="Full name" name="password"></div>
                                            <div class="col-sm-6"><input   class="form-control form-control-user" type="number" id="exampleRepeatPasswordInput" placeholder="Age" name="password_repeat">
                                            
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0"><select   class="form-control form-control-user" type="text" id="examplePasswordInput" placeholder="gender" name="password">
                                            <option selected>Gender</option>
                                            <option >Male</option>
                                            <option >Female</option>
                                            <option >Other</option>
                                            </select>
                                            </div>
                                            <div class="col-sm-6"><select   class="form-control form-control-user" type="text" id="exampleRepeatPasswordInput"  name="password_repeat">
                                            <option selected>class</option>';
                                        if($_GET['for']=='train'){
                                            echo '<option >SL</option>
                                            <option >3A</option>
                                            <option >2A</option>
                                            <option >1A</option>
                                            ';
                                        }
                                        else{
                                            echo '<option >Economy</option>
                                            <option >Business</option>
                                            <option >First Class</option>
                                            ';
                                        }
                                        echo'</select>
                                            </div>
                                        </div>
                                        ';
                                    }
                                    echo '<div class="text-left"><h5>Payment Details :</h5>
                                    <small>Money To Be Paid : Rs'.$_GET["seats"]*$_GET["price"].'
                                    </div>;
                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input   class="form-control form-control-user" type="tel" id="examplePasswordInput" placeholder="card -number" name="password"></div>
                                    <div class="col-sm-6"><input   class="form-control form-control-user" type="text" id="exampleRepeatPasswordInput" placeholder="name on card" name="password_repeat"></div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input   class="form-control form-control-user" type="number" id="examplePasswordInput" placeholder="cvv" name="password"></div>
                                    <div class="col-sm-6"><input   class="form-control form-control-user" type="text" id="exampleRepeatPasswordInput" placeholder="expiry " name="password_repeat"></div>
                                    </div>';
                                    
                                }
                                else{
                                    echo '<h4 class="text-dark mb-4">enter payment details</h4>';
                                    echo '<form class="user" action="includes/signup.inc.php"  >';
                                    // echo '<div class="text-left"><h5>Room Details :</h5></div>';
                                    echo '<div class="text-left"><h5>Payment Details :</h5></div>;
                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input   class="form-control form-control-user" type="text" id="examplePasswordInput" placeholder="card -number" name="password"></div>
                                    <div class="col-sm-6"><input   class="form-control form-control-user" type="text" id="exampleRepeatPasswordInput" placeholder="name on card" name="password_repeat"></div>
                                    </div>
                                    <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input   class="form-control form-control-user" type="number" id="examplePasswordInput" placeholder="cvv" name="password"></div>
                                    <div class="col-sm-6"><input   class="form-control form-control-user" type="text" id="exampleRepeatPasswordInput" placeholder="expiry " name="password_repeat"></div>
                                    </div>';
                                    

                                }
                                
                                ?>
                                <button class="btn btn-primary btn-block text-white btn-user" type="submit" name="signup-submit">Book</button>
                            </form>
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


<?php
if(isset($_GET["for"])){
    if($_GET["for"]!='hotel'){
        $seats=$_GET["seats"];
        
    }
    else{
        echo'';//form here
    }
}
else{
    header("Location: index.php");
    exit();
}
?>