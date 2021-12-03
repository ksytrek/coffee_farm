<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'https://';
	}
	$uri .= $_SERVER['HTTP_HOST'];


	shell_exec('git pull');


	// header('Location: '.$uri.'/coffee_farm/view/login.php');


	exit;
?>
