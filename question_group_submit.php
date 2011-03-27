<?php

foreach ($_POST as $question_id => $answer) {
	print $question_id . " - " . $answer . "\n";	
}
echo json_encode($_POST);