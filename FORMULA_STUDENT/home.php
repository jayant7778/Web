<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}


/* Slideshow container line 78-113*/
.slideshow-container {
  max-width: 1200px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.8s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 2s;
  animation-name: fade;
  animation-duration: 2s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
/*navbar*/
body {
  margin: 0;
  font-family: 'Atomic Age';
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: rgba(0,0,0,0.001);
  color: black;
}

.activate {
  background-color: red;
  color: white;
}

.topnav .icon {
  display: none;
}
.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color:white ;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: rgba(0,0,0,0.1);
}

.dropdown:hover .dropdown-content {
  display: block;
}
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

/* Social Media Buttons */
.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 10%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}
.fa-google {
  background: #dd4b39;
  color: white;
}
.fa-instagram {
  background: #125688;
  color: white;
}

</style>
</head>
<body background="2016-ferrari-f1-2 - Copy.jpg">
<br>
<center>
<div class="topnav" id="myTopnav"  style="width:80%">
 <center> <img src="Red Logo.png" height=130px width=240px align=left style="padding:0px 30px;margin:-10px" ></img>
  <a href="home.php" style="font-size:30; padding:24px">Home</a>
  <a href="gallery.html" style="font-size:30; padding:24px">Gallery</a>
  <a href="about.html" style="font-size:30; padding:24px">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
       <div class="dropdown">
    <button class="dropbtn" style="font-size:30; padding:0px">&nbsp Events
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">SUPRA CUP</a>
      <a href="#">FORMULA 1</a>
      <a href="#">QUAD BIKE</a>
    </div>
	</div>
    <a href="contact.html" style="font-size:30; padding:24px">Contact</a>
    <div class="dropdown">
    <button class="dropbtn" style="font-size:30; padding:0px"><span class="glyphicon glyphicon-user"></span>&nbsp;Hello' <?php echo $userRow['userName']; ?>&nbsp;
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="logout.php?logout">Sign Out!</a>
    </div>
	
  </div>
</div>
</center>

<br><br><br>
<div class="slideshow-container">

     <div class="mySlides fade">
        <div class="numbertext">1 / 5</div>
           <img src="1.jpg" style="width:100%; height:500px">
     </div>

     <div class="mySlides fade">
        <div class="numbertext">2 / 5</div>
           <img src="2.jpg" style="width:100%; height:500px">
     </div>

     <div class="mySlides fade">
        <div class="numbertext">3 / 5</div>
            <img src="10.jpg" style="width:100%; height:500px">
     </div>
     <div class="mySlides fade">
        <div class="numbertext">4 / 5</div>
            <img src="22.jpg" style="width:100%; height:500px">
     </div>
     <div class="mySlides fade">
        <div class="numbertext">5 / 5</div>
            <img src="BACK.jpg" style="width:100%; height:500px">
      </div>


</div>
<br>
<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<br><br>
<center>
<video width="900px" height="400px" controls>
  <source src="F1(0).mp4" type="video/mp4">
</video>
</center>
<br><br>
<center>
<div style="background-color:rgba(0,0,0,0.6); height:70px;
width: 40%;
margin-left: 80px; border-radius:9px">
<h1 style="font-size:45; color:white; padding:10px">WHO WE ARE?</h1>
</div>
</center>
<center>
<div style="background-color:rgba(0,0,0,0.6); height:260px;
width: 88%;
margin-left: 80px; border-radius:9px">
<p style="font-size:25; color:white; padding:20px">
Crusade Motorsports is a Formula Student team of POORNIMA COLLEGE OF ENGINEERING, Jaipur involved in designing, manufacturing and racing a Formula prototype racecar.
<br><br>

Crusade Motorsports aims to provides an opportunity to students to pursue their passion for Automobiles. Through this journey they learn to tackle real time engineering problems and gain the requisite expertise to solve any and all difficulties they might face.
Poornima College of Engineering is one of the leading centers for education in Rajasthan and undoubtedly the most respected technical institution in Jaipur. As a consequence of the sheer hard work and passion of a group of dedicated students, the automotive hub of the institution was established.
</p>
<br><br><br>
</center>
</div>
<br><br><br><br>
<div style="background-color:rgba(0,0,0,1.5); height:280px;
width: 100%;
margin-left: 0px; border-radius:0px">
<center>
<h3 style="padding:30px 2px; color:teal">COPYRIGHT@IT(PCE)BY ~ JAYANT SINGH, KARTIK AGARWAL, AJAY RAJPUT</h3>
<a href="https://mail.google.com/mail/u/0/#inbox" style="text-decoration:none"><h3 style="color:teal">EMAIL:- jayant7778@gmail.com</h3></a>
<h3 style="color:teal">CONTACT NO.:- +919929179077</h3>	
<pre>  <a href="#" class="fa fa-facebook" style="padding:10px"></a>	<a href="#" class="fa fa-google" style="padding:10px"></a>      <a href="#" class="fa fa-instagram" style="padding:10px"></a>	
</center>
</div>									
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}




</script>

</body>
</html> 