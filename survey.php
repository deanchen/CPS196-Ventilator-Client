<?php
session_start();
if (!isset($_SESSION['session_id'])):
?>

<script type="text/javascript">
	window.location = "education.php";
</script>

<?php
endif;
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Survey</title>
		
		<!-- Sencha Touch CSS -->
		<link rel="stylesheet" href="sencha-touch-debug.css" type="text/css">
	
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/reset.css" type="text/css">
		<link rel="stylesheet" href="css/ventilator.css" type="text/css">
		<link rel="stylesheet" href="css/survey.css" type="text/css">
	
		<!-- Sencha Touch JS -->
		<script type="text/javascript" src="sencha-touch-debug.js"></script>
	
		<!-- Application JS -->
		<script type="text/javascript" src="js/survey.js"></script>
	</head>
	
	<body>
		<div id="session_id" style="display: none"><?php echo $_SESSION['session_id']; ?></div>
    	<?php include('survey_template.php') ?>
	</body>
</html>