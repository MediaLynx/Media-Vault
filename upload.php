<?php
session_start();

if(!isset($_SESSION['email'])){
header("location: Login.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        
        <title>Media</title>
        
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
     	<link rel="stylesheet" href="styles/styles.css">
        
    </head>

    <body>
	<div class="top_bar">
	
	
	<div class="wrapper">
	<header>
		<?php include 'header.php'; ?>
	</header>
	<form enctype = "multipart/form-data" action = "media.php" method = "POST">
	<fieldset>
	<legend>Upload your file</legend>
	<input type = "hidden" name = "max_file_size" value = "5000000000">
	Select the file you would like to upload:<br>
	<input name = "upload" type = "file"><br>
	<input type = "submit" value = "Upload File">
	</form>
	<?php
		$videoFormats = array("avi","mov","wmv","qt","rmvb","mp4","m4p","m4v");
		$musicFormats = array("m4a","mp3","ogg","wma","wav");
		$docFormat = array(".pdf","txt","doc","docx");
		$photoFormat = array("jpg","jpeg","gif","bmp","png");
		$upload_dir = "var/www/html/Media-Vault";
		$upload_file = $upload_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOK = 1;
		$fileType = pathinfo($upload_file, PATHINFO_EXTENSION);
		//Upload the File.
		if(isset($_POST["Upload File"])) {
			//Check to see if there is a duplicate file
			if(file_exists($upload_file)) {
				echo "Sorry, file already exists";
				$uploadOK = 0;
			}
			//Check to see if the file size is too large
			if($_FILES["fileToUpload"]["size"] > 5000000000) {
				echo "Sorry, file is to large";
				$uploadOK = 0;
			}
			if (in_array($fileType, $videoFormats)) {
				echo "File is a video";
			} else if (in_array($fileType, $musicFormats)) {
				echo "File is an audio file";
			} else if (in_array($fileType, $docFormat)) {
				echo "File is a text document";
			} else if (in_array($fileType, $photoFormat)) {
				echo "File is an image";
			} else {
				echo "File upload not supported";
				$uploadOK = 0;
			}
		}
	?>
	</body>
</html>