<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Booking Form Hotels</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:400" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">

	<link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
			<a class="btn btn-warning button " href="../index.php"><i class="fa fa-arrow-left"></i></a>
				<div class="row">
					<div class="booking-form">
						<form action="">
							<div class="row no-margin">
								<div class="col-md-2">
									<div class="form-group">
										<span class="form-label" >City</span>
										<input class="form-control" type="text" placeholder="City"name="hotel-city">
									</div>
								</div>
								<div class="col-md-8">
									<div class="row no-margin">
										<div class="col-md-3">
											<div class="form-group">
												<span class="form-label">Check In</span>
												<input class="form-control" type="date" required>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<span class="form-label">Check out</span>
												<input class="form-control" type="date" required>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<span class="form-label">Rooms</span>
												<input class="form-control" type="number" placeholder="number" name="hotel-rooms" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<span class="form-label">Budget</span>
												<select id="budget" class="form-control" name="hotel-budget">
													<option selected>Choose...</option>
													<option>below 2001</option>
													<option>2001-5000</option>
													<option>5001-7500</option>
													<option>7501 - 10000</option>
													<option>above 10000</option>
											</select>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-btn">
										<button class="submit-btn" name="hotel-submit">Check availability</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php
				if (isset($_GET['hotel-submit'])) {
					require '../includes/dbh.inc.php';
					$city=$_GET['hotel-city'];
					$budget=$_GET['hotel-budget'];
					$rooms=$_GET['hotel-rooms'];
					// echo $budget;
					// error handlers
					if (empty($city) ||empty($budget) ) {
						echo'<h1 style= " color:white"class="container">empty fields<h1>';
						exit();
					}
					elseif($rooms <= 0){
						echo '<h1 style= " color:white"class="container">rooms has to greater than 0<h1>';
						exit();
					}
					else {
						if($budget=="below 2001")
						$sql="SELECT * FROM Hotels WHERE cityHotel = ? AND priceHotel <= 2000";
						elseif($budget=="2001-5000")
						$sql="SELECT * FROM Hotels WHERE cityHotel = ? AND priceHotel > 2000 AND priceHotel <= 5000";
						elseif($budget=="5001-7500")
						$sql="SELECT * FROM Hotels WHERE cityHotel = ? AND priceHotel > 5000 AND priceHotel <= 7500";
						elseif($budget=="7501 - 10000")
						$sql="SELECT * FROM Hotels WHERE cityHotel = ? AND priceHotel > 7500 AND priceHotel <= 10000";
						elseif($budget=="above 10000")
						$sql="SELECT * FROM Hotels WHERE cityHotel = ? AND priceHotel > 10000";
						
						$stmt=mysqli_stmt_init($conn);
						if (! mysqli_stmt_prepare($stmt,$sql) ) {
							echo ("error=sqlerror");
							exit();
						} 
						else{
							mysqli_stmt_bind_param($stmt,"s",$city);
							mysqli_stmt_execute($stmt);
							$result=mysqli_stmt_get_result($stmt);
							$num_of_rows = mysqli_num_rows($result);
							// echo $num_of_rows;
							if($num_of_rows!=0){
							// echo '<table class="table table-dark table-borderless " >
							// <tr>
							// <th style=" color:white">Name</th>
							// <th style="text-align:center ;color:white">Cost</th>
							// <th style="text-align:center ;color:white">Book</th>
							// </tr>';
							echo '<br><br>';
							echo '<div class="row" id="portfolio">';
							
							}
							
							while($row= mysqli_fetch_array($result)){
								// echo '<tr>
								// 	<td  style="color:white" >',$row['nameHotel'],'</td>
								// 	<td style="text-align:center ;color:white">',$row['priceHotel'],'</td>
								// 	<td style="text-align:center ;color:white"><a href="#">book </a></td>
								// 	</tr>';
								echo'
								<a class="portfolio-link"  href="../book.php?for=hotel&seats='.$rooms.'&price='.$row['priceHotel'].'">
								<div class="col-sm-6 col-md-4 portfolio-item">
									<div class="portfolio-hover">
										<div class="portfolio-hover-content"><i class="fa fa-plus fa-3x"></i></div>
									</div><img class="img-fluid" src="../assets/img/images.jfif"></a>
									<div class="portfolio-caption">
									<h4 class="text-capitalize">'.$row['nameHotel'].'</h4>
									<p class="text-muted">'.$row['priceHotel'].'</p>
									</div>
								</div>
								
								';
							}
							echo '</div><br>';
							if ($num_of_rows==0) {
								echo ('<h1 style= " color:white"class="container"> soory no hotels according to your requirement<h1>');
								exit();
							}
						}
					}
					mysqli_stmt_close($stmt);
					mysqli_close($conn);
				}
				?>

			</span>
			
		</p>
	</div>
	<script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/agency.js"></script>
</body>

</html>