<!-- HTML container for educational portion of the app -->
<?php
// redirect user to enter the patient session id if it is not set
session_start();
if (!isset($_SESSION['session_id'])):
?>

<script type="text/javascript">
        window.location = "index.php";
</script>

<?php
endif;
?>

<!DOCTYPE HTML>
<html>
	<head>
<meta name="apple-mobile-web-app-capable" content="yes">
		<title>Ventilator App</title>
		
		<!-- Sencha Touch CSS -->
		<link rel="stylesheet" href="sencha/sencha-touch.css" type="text/css">
	
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/reset.css" type="text/css">
		<link rel="stylesheet" href="css/ventilator.css" type="text/css">
		<link rel="stylesheet" href="css/education.css" type="text/css">
	
		<!-- Sencha Touch JS -->
		<script type="text/javascript" src="sencha/sencha-touch.js"></script>
	
		<!-- Application JS -->
		<script type="text/javascript" src="js/education.js"></script>
	</head>
	
	<body>
	<!-- Definition of contents of educational pages -->
	<? include('education_template.php') ?>
	</body>
</html>
