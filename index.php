<?php
session_start();

if (isset($_GET['session_id'])) {
	$session_id = $_GET['session_id'];
	$check_session_id = file_get_contents("http://vs.ocirs.com/rest/session/validate/$session_id");
	
	if ($check_session_id != 'true') {
		echo "Invalid patient id $session_id.<br />";
	} else {
		//$check_completion = file_get_content("http://vs.ocirs.com/rest/survey/completed/$session_id");
		$_SESSION['session_id'] = $session_id;
	}
}

if (!isset($_SESSION['session_id'])):
?>
	<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="session_id">Patient Id</label><br />
		<input type="text" name="session_id" />
		<input type="submit" name='submit' />
	</form>
<?php
else:
?>

<script type="text/javascript">
	window.location = "education.php";
</script>

<?php endif; ?>


