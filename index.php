<?php
session_start();

if (isset($_POST['submit'])) {
	$patient_id = $_POST['patient_id'];
	print $patient_id;
	$check_patient_id = file_get_contents("http://vs.ocirs.com/rest/session/validate/$patient_id");
	print_r($check_patient_id);
	//$_SESSION['patient_id'] = $patient_id;
}

if (!isset($_SESSION['patient_id'])):
?>
	<form method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for='patient_id'>Patient Id</label>
		<input type="text" name="patient_id" />
		<input type="submit" name='submit' />
	</form>
<?php
else:
?>

<script type="text/javascript">
	window.location = "education.php";
</script>

<?php endif; ?>


