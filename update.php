	<?php include_once("header.php"); ?>	

	<?php

		$host="db561917003.db.1and1.com"; // Host name
		$username="dbo561917003"; // Mysql username
		$password="webmaster6"; // Mysql password
		$db_name="db561917003"; // Database name
		$tbl_name="heweb"; // Table name

		// Get parameters from form. 
		$KeyID=$_GET['KeyID'];
		$checkIn=$_GET['checkIn'];
		
		// Connect to server and select database.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");

	?>	  
		  
	<div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-12 main">
			<?php  
				// update data in mysql database 
				$sql="UPDATE $tbl_name SET checkIn='Yes' WHERE KeyID='$KeyID'";
				$result=mysql_query($sql);

				// if successfully updated. 
				if($result){
				echo "This person has been checked in.";
				echo "<BR>";
				}

				else {
				echo "ERROR";
				}
				
			?>
          </div>
        </div>
      </div>
    </div>

		<?php include_once("includes/footer.php"); ?>	
