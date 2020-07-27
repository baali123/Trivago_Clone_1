<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Booking Form Flights</title>

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
										<input class="form-control" type="text" placeholder="City"name="flight-city">
									</div>
								</div>
								<div class="col-md-8">
									<div class="row no-margin">
										<div class="col-md-4">
											<div class="form-group">
												<span class="form-label">City To</span>
												<input class="form-control" type="text" placeholder="destination" name="flight-cityto" >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<span class="form-label">Date</span>
												<input class="form-control" type="date" name="flight-date" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<span class="form-label">Seats</span>
												<input class="form-control" type="number" name="seats"placeholder="number" >
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-btn">
										<button class="submit-btn" name="flight-submit">Check availability</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<?php
				if (isset($_GET['flight-submit'])) {
					require '../includes/dbh.inc.php';
					$city=$_GET['flight-city'];
					$cityto=$_GET['flight-cityto'];
					$date=$_GET['flight-date'];
					$seats=$_GET["train-seat"];
					// echo $budget;
					// error handlers
					if (empty($city) ||empty($cityto) ) {
						echo'<h1 style= " color:white"class="container">empty fields<h1>';
						exit();
					}
					elseif($seats <= 0){
						echo '<h1 style= " color:white"class="container">sql error<h1>';
						exit();
					}
					else {
						$sql="SELECT * FROM Flights WHERE cityFlight = ? AND citytoFlight = ? AND dateFlight= ? ";
						
						$stmt=mysqli_stmt_init($conn);
						if (! mysqli_stmt_prepare($stmt,$sql) ) {
							echo ("error=sqlerror");
							exit();
						} 
						else{
							mysqli_stmt_bind_param($stmt,"sss",$city,$cityto,$date);
							mysqli_stmt_execute($stmt);
							$result=mysqli_stmt_get_result($stmt);
							$num_of_rows = mysqli_num_rows($result);
							// echo $num_of_rows;
							if($num_of_rows!=0){
								echo '<table class="table  table-borderless " >
								<tr>
								<th style=" color:white; font-size: 20px;">Name</th>
								<th style="text-align:center ;color:white; font-size: 20px;">Number</th>
								<th style="text-align:center ;color:white; font-size: 20px;">Price</th>
								<th style="text-align:center ;color:white; font-size: 20px;">Book</th>
								</tr>';
							
							}
							
							while($row= mysqli_fetch_array($result)){
								echo '<tr>
									<td  style="color:white; font-size: 16px;" >',$row['nameFlight'],'</td>
									<td style="text-align:center ;color:white; font-size: 16px;">',$row['numberFlight'],'</td>
									<td style="text-align:center ;color:white; font-size: 16px;">',$row['priceFlight'],'</td>
									<td style="text-align:center ;color:white; font-size: 16px;"><a href="../book.php?for=flight&seats='.$seats.'&price='.$row['priceFlight'].'">book </a></td>
									</tr>';
							}
							echo '</div><br>';
							if ($num_of_rows==0) {
								echo ('<h1 style= " color:white"class="container"> soory no Flights according to your requirement<h1>');
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