<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$filename = basename($_FILES["fileToUpload"]["name"]);
$filesize = $_FILES["fileToUpload"]["size"];
$fileType = $_FILES["fileToUpload"]["type"];
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		$tmpName  = ($_FILES["fileToUpload"]["tmp_name"]);  
		$fp = fopen($tmpName, 'r');
		$image = fread($fp, filesize($tmpName));
		$image = addslashes($image);
		fclose($fp);
		
		if(!get_magic_quotes_gpc())
			{
				$fileName = addslashes($fileName);
			}

		include 'library/config.php';
		include 'library/opendb.php';
         

// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	$imageData = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
		
		$dbhost = "localhost";
	$dbname	= "MEDIALYNX";
	$dbuser	= "root";
	$dbpass	= "root";
	
	session_start();
	$userid = $_SESSION['userid'];
	$file = "image";
	$synopsis = "Image description";

		try {
			
			
			
			
					$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
		
			
					
					
					 
					$sql = "INSERT INTO CONTENT(USERID, CONTENTTITLE, CONTENTTYPE, SIZE, SYNOPSIS, PICTURES) VALUES ('$userid','$filename','$fileType','$filesize','$synopsis', '$image')";
			
					include 'library/closedb.php';
					$pdo->exec($sql);
					header("location: test2.php");
						
					 
				}
				
			catch(PDOException $e)
				{
					echo $e->getMessage();
				}

				$pdo = null;
	
    } 


 else {
        echo "File is not an image.";
        $uploadOk = 0;
    }		
}

   


?>