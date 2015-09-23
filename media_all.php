<?php
session_start();
if(!isset($_SESSION['email'])){
header("location: Login.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>Media</title>	
	<!-- <link rel="shortcut icon" href="graphics/favicon.ico" />
	<link rel="stylesheet" href="styles/styles.css" type="text/css" media="screen" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> -->
	<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
<div class="wrapper">
	<header>
		<?php include 'header.php'; ?>
		<span id="sign_in_info"></span>
		<div id="media2_header_inside">
			<!-- <a href="index.php">
				<img src="graphics/logo.jpg">
			</a> -->
			<ul>
				<li><a href="media_playlist.php">Playlist</a></li>
				<li><a href="media_doc.php">Doc</a></li>
				<li><a href="media_photo.php">Photo</a></li>
				<li><a href="media_music.php">Music</a></li>
				<li><a href="media_video.php">Video</a></li>
				<li><a class="active" href="media_all.php">All files</a></li>
				<li><a href="Delete.php">Delete</a></li>
			</ul>		
		</div>
	</header>
</div>
<div id="aboutus_content">	
	<br><br>
	
	<h2 class="aboutus_Headings">Your Files</h2><br>
	
	<form id = "delform" name = "Files Form">
		<fieldset>
	<?php
		$dbname = "MEDIALYNX";
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "root";
		$name = $_SESSION['first_name'];
		$Email = $_SESSION['email'];
		
		$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		
		$q1 = $conn->query("SELECT * FROM USERS WHERE EMAIL = '$Email'");
		$q2 = $q1->fetch(); 
		$user = $q2['USERID'];
		
		echo"<legend>Your Files, ".$name."</legend>";
				
		$q3 = $conn->query("SELECT * FROM CONTENT WHERE USERID = '$user'");
		$rows = $q3->rowCount();
		if($rows == 0) {
			echo '<ul style="list-style-type:none">';
			echo '<li>Please <a href="upload.php">upload</a> files first</li>';
			echo '</ul>';
		} else {
			while($q4 = $q3->fetch()) {
				$id = $q4['CONTENTID'];
				echo '<ul style="list-style-type:none">';
				echo '	<li>'.$q4['CONTENTTITLE'].'</li>';
				echo '	<li>'.$q4["SYNOPSIS"].'</li>';
				echo '</ul>';
			}
		}
		
		$conn->close();
	?>
		</fieldset>
	</form>




	<footer class="footer_relative">
	<span id="jae_design-by">Design by Media lynx</span> 
		Copyright &copy; Media Lynx 2015.
	</footer>

</body>
</html>
