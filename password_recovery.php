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
	<body>
	<form action = >
		Email:<br>
		<input type = "email" name = "email"><br>
		<input type = "submit" name = "Submit"><br><br>
	</form>
	
	<?php
		$dbname = "Media_Lynx";
		$conn = mysqli_connect("54.79.17.142","root","root",$dbname);
		if(!$conn -> connect_error) {
			die("Connection failed:");
		}
		$email = $_POST['email'];
		$sql = "SELECT SECRETQUESTION, SECRETANSWER FROM user WHERE email = ".$email;
		$result = $conn -> query($sql);
		
		$json = json_encode($result);
		
		if($result -> num_rows > 0) {
			echo "<form action = change_password.php onsubmit = check_answer()>Secret question<br>"
			$row = $result -> fetch_assoc();
			echo $row["SECRETQUESTION"];
			echo "Secret Answer<br><input type = 'password' name = 'answer'><br>";
			echo "<input type = 'submit' name = 'submit'>"
		}
		$conn -> close();
	?>
	<script type = "text/javascript">
	function check_answer(form) {
		var answer = form.elements['answer'];
		var trueAnswer = <?php $json ?>;
		if(answer.value == "") {
			alert("Please enter an answer");
			answer.focus();
			return false;
		}
		if(answer.value != trueAnswer) {
			alert("Answer is not correct.");
			answer.focus();
			return false;
		}
		return true;
	}	
	</script>	
	</body>
</html>