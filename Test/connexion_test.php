<?php

header("Content-Type: text/plain");

$nick = (isset($_POST["Nick"])) ? $_POST["Nick"] : NULL;
$name = (isset($_POST["Name"])) ? $_POST["Name"] : NULL;

if ($nick && $name) {
	echo "http://localhost:8888/EyesHelp/";
} else {
	echo "FAIL";
}

?>
