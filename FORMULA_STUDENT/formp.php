<font color="red" size="7">
<?php
$error = false;
 $name = $_POST['name'];
 $branch = $_POST['branch'];
 $reg = $_POST['reg'];
 $email = $_POST['email'];
 $gender = $_POST['gender'];
  if(!empty($name) || !empty($branch) || !empty($reg) || !empty($email) || !empty($gender)) {
	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "jayant";

    //create a connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
	  if(mysqli_connect_error())
	  { die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	  }
	  else{
		  $SELECT = "SELECT email from register where email = ? Limit 1";
                  $SELECT = "SELECT reg from register where reg = ? Limit 1";
		  $INSERT = "INSERT Into register (name, branch, reg, email, gender) values(?, ?, ?, ?, ?)";
		   //prepare statement
		   $stmt = $conn->prepare($SELECT);
		   $stmt->bind_param("s",$email);
                   $stmt->bind_param("s",$reg);
		   $stmt->execute();
		   $stmt->bind_result($email);
                   $stmt->bind_result($reg);
		   $stmt->store_result();
		   $rnum =$stmt->num_rows;
		     if($rnum==0)
			 {  $stmt->close();
		        $stmt = $conn->prepare($INSERT);
				$stmt->bind_param("sssss",$name, $branch, $reg, $email, $gender);
				$stmt->execute();
			 }
			 else{
			 
                         echo "Email Or Registraion ID is Already In Use";
                         
			 }
			 $stmt->close();
			 $conn->close();
	  }
  }
  else{
  echo "all field are required";
  die();
  }
?> 
</font>

<html>
<head>
<style>
.btn
	  { background:Red;
	    font-family:arial;
		color:white;
		font-size:25;
		border:none;
		height:70px;
		width:170px;
		border:none;
		border-radius:12px;
	  }
</style>
</head>
<body background="2016-ferrari-f1-2 - Copy.jpg">
<center>

<br><br><br><br><br><br><br><br><br><br><br><br>
<h1 style="font-size:30;color:blue">YOU ARE DONE HERE</h1>
<br><br><br>
 <a href="contact.html" style="text-decoration:none; color:white"><button class="btn">REDIRECT</button></a></center>
</center>
</body>
</html>