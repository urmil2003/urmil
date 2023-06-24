<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST">
		<table border="2" bgcolor="silver">
			<tr>
				<th>name of student</th>
				<td><input type="text" name="name"></td><br>
				</tr>
				<tr>
					<th>address of student</th>
				<td><input type="text" name="address"></td><br>
				</tr>
				<tr>
					<th>email of student</th>
				<td><input type="text" name="email"></td><br>
			</tr>
			<tr>
				<th></th>
				<td><input type="submit" name="b1" value="View">
			    <input type="submit" name="b1" value="Submit"></td>
			</tr>
			
		</table>
		
	</form>
	

	<?php

	//code for connection
	$serverName="localhost";
	$userName="root";
    $password="";
    $databaseName="mydb";

    $conn=new mysqli($serverName,$userName,$password,$databaseName);

    //check the connection

    if($conn->connect_error)

    {
    	echo "sorry database is not connected";
    }
    else
       {
       	echo"connection is done";
       }


	?>
	<?php
	$action=null;
	$action=isset($_POST["b1"]);

	if ($action!=null)
	 {
		$action=$_POST["b1"];
		if ($action=="Submit")
		 {
			$name=$_POST["name"];
			$address=$_POST["address"];
			$email=$_POST["email"];

			$sql="select *from student where email='$email'";
			$result=$conn->query($sql);
			$cnt=$result->num_rows;
			if($cnt==0)
			{
				

			$sql="insert into student(name,address,email)values('$name','$address','$email')";

			if($conn->query($sql)==true)

			{
				echo "<script>alert('Recode is submitted');document.location.href='database.php';</script>";
			}
			else
			{
				
			echo "<script>alert('Sorry Recode is not submitted');document.location.href='database.php';</script>";
             }
		}
		else
		{
			echo "<script>alert('Email address Already Exist');document.location.href='database.php';</script>";
		}
	}

	      if($action=="Search")
		{
			$no=$_POST["no"];
			$sql="select * from student where no='$no'";
			$result=$conn->query($sql);
			$cnt=$result->num_rows;
			if($cnt==0)
			{
				echo "<script>alert('Sorry Recods not found');document.location.href='database.php';</script>";
			}
			else
			{

?>		

					<table cellpadding="5" cellspacing="5" border="1"> 
						<tr>
								<th>No</th>
								<th>Name</th>
								<th>Address</th>
								<th>Email</th>
								<th>Delete</th>
								<th>Update</th>
						</tr>
<?php
					while($row=$result->fetch_assoc())
					{
	?>
							<tr>
										<td><?php echo $row["no"];?></td>
										<td><?php echo $row["name"];?></td>
										<td><?php echo $row["address"];?></td>
										<td><?php echo $row["email"];?></td>
										<td><a href="database.php?no=<?php echo $row["no"];?>">Delete</a></td>
										<td><a href="update.php?no=<?php echo $row["no"];?>">Update</a></td>

							</tr>
	                <?php
						
					}
                  ?>
			</table>
		<?php
		        //echo "<br/>".$row["no"]. " ".$row["name"]. " ".$row["address"]." ".$row["email"];
		}
}


		if($action=="View")
		{
			$sql="select * from student";
			$result=$conn->query($sql);
			$cnt=$result->num_rows;
			if($cnt==0)
			{
				echo "<script>alert('Sorry Recods not found');document.location.href='database.php';</script>";
			}
			else
			{

?>		

					<table cellpadding="5" cellspacing="5" border="1"> 
						<tr>
								<th>No</th>
								<th>Name</th>
								<th>Address</th>
								<th>Email</th>
								<th>Delete</th>
								<th>Update</th>
						</tr>
<?php
					while($row=$result->fetch_assoc())
					{
	?>
							<tr>
										<td><?php echo $row["no"];?></td>
										<td><?php echo $row["name"];?></td>
										<td><?php echo $row["address"];?></td>
										<td><?php echo $row["email"];?></td>
										<td><a href="database.php?no=<?php echo $row["no"];?>">Delete</a></td>
										<td><a href="update.php?no=<?php echo $row["no"];?>">Update</a></td>

							</tr>
	<?php
						//echo "<br/>".$row["no"]. " ".$row["name"]. " ".$row["address"]." ".$row["email"];
					}
?>
			</table>
<?php
			}
		}
	}
	if(isset($_GET["no"])!=null)
	{
		$no=$_GET["no"];
		$sql="delete from student where no='$no'";
		if($conn->query($sql)==true)

			{
				echo "<script>alert('Recode is Deleted');document.location.href='database.php';</script>";
			}
			else
			{
				echo "<script>alert('Sorry Recode is not Deleted');document.location.href='database.php';</script>";
			}

			

	}



	?>



</body>
</html>