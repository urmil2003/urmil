<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php  
$target_path = "data/";  
$target_path = $target_path.basename( $_FILES['fileToUpload']['name']);   
  
if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) 
{  
    echo "<script>alert('File uploaded successfully!');document.location.href='index.php';</script>";  
} 
else
{  
    echo "<script>alert('Sorry, file not uploaded, please try again!');document.location.href='index.php';</script>";  
}  
?>
</body>
</html>