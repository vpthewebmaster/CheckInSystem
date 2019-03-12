<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>HEWEBAL Check In System </title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="local.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="letter.php">HEWEBAL Check In System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <a class="btn btn-default checkTop" href="display.php?letter=<? echo $_GET['letter']; ?>" role="button">Not Checked In</a>

          </ul>

        </div>
      </div>
    </nav>

	<?php include_once("includes/connection.php"); ?>	
		<?php
			// Retrieve data from database
			$sql="SELECT * FROM $tbl_name WHERE checkIn='Yes' AND lastName LIKE '$letter%'" ;
			$result=mysql_query($sql);
		?>	

	
	<div class="container-fluidMain">
		<table class="table table-striped">
		  <thead>
			<tr>
			  <th>First Name</th>
			  <th>Last Name</th>
			  <th>Institution</th>
			  <th>Role</th>
			  <th></th>
			</tr>
		  </thead>
		  <tbody>
			<?php

			// Start looping rows in mysql database.
			while($rows=mysql_fetch_array($result)){
			?>
			<tr>
			  <!--<td>
				<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
				</button>		-->  	  
			  
			  </td>
			  <td><? echo $rows['firstName']; ?></td>
			  <td><? echo $rows['lastName']; ?></td>
			  <td><? echo $rows['institution']; ?></td>
			  <td><? echo $rows['role']; ?></td>
			  <td>
				<a class="btn btn-default" href="update_no.php?checkIn=No&KeyID=<? echo $rows['KeyID']; ?>" role="button">Check Out</a>			  
			  </td>


			</tr>
				<?php
				// close while loop
				}			
				?>
		  </tbody>
		</table>
			<?php
			// close MySQL connection
			mysql_close();
			?>	
			

		
	<?php include_once("includes/editModal.php"); ?>	
	<?php include_once("includes/updateModal.php"); ?>	
	<?php include_once("includes/footer.php"); ?>	
