<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
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

       $no=$_GET["no"];
       $sql="select * from student where no='$no'";
       $result=$conn->query($sql);
       while($row=$result->fetch_assoc())
       {
       		$name=$row["name"];
       		$address=$row["address"];
       		$email=$row["email"];
       }
       ?>


	<form method="POST">
		<table border="2" bgcolor="silver">
			<tr>
				<th>name of student</th>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td><br>
				</tr>
				
				<tr>
					<th>email of student</th>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td><br>
			</tr>
			<tr>
				<th></th>
				<td><input type="submit" name="b1" value="Update">
			    
			</tr>
			
		</table>
		
	</form>
	

       <?php
       	$action=null;
       	$action=isset($_POST["b1"]);
		if($action=="Update")
		 {
		 
			$name=$_POST["name"];
			
			$email=$_POST["email"];

			$sql="update student set name='$name',address='$address',email='$email' where no='$no'";

			if($conn->query($sql)==true)
			{
				print($row);
			}

			{
				echo "<script>alert('sucessfully Update');document.location.href='database.php';</script>";
			}
			//else
			{
				echo "<script>alert('Sorry not Update');document.location.href='database.php';</script>";
			}

	}

        ?>

</body>
</html>