



<!DOCTYPE html>

<html id="Homepage_pic">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="refresh" content="60">
		<link rel="stylesheet" href="styles/styles.css">
		<title>Media Lynx</title>
	</head>
	<body>
	<div class="wrapper">
			
			<header>
				<?php include 'header.php'; ?>
			</header>
			<?php
if (isset($_REQUEST ['Submit']) and (!empty($_POST['Submit'])))
{
echo "test";

}
else
{
	echo "shgjs";
}

?>

			<div id = "register_success">
			<h2> Success!, you are being redirected to the login page</h2>
			</div>
					<footer class="footer_absolute">
					<span id="jae_design-by">Design by Media lynx</span> 
						Copyright &copy; Media Lynx 2015.
					</footer>
		<?php  header('Refresh: 6; URL= Login.php'); ?>	
	</div>
	</body>
	</html>
