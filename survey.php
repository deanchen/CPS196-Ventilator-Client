<?php
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
		<title>Survey</title>
		<meta name="format-detection" content="telephone=no">	
		<!-- Sencha Touch CSS -->
		<link rel="stylesheet" href="sencha/sencha-touch.css" type="text/css">
	
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/reset.css" type="text/css">
		<link rel="stylesheet" href="css/ventilator.css" type="text/css">
		<link rel="stylesheet" href="css/survey.css" type="text/css">
	
		<!-- Sencha Touch JS -->
		<script type="text/javascript" src="sencha/sencha-touch-demo.js"></script>
	
		<!-- Application JS -->
		<script type="text/javascript" src="js/survey.js"></script>
		<!--<script type="text/javascript" src="js/jquery.js"></script>-->
	</head>
	
	<body>
		<div id="session_id" style="display: none"><?php echo $_SESSION['session_id']; ?></div>
	</body>
</html>