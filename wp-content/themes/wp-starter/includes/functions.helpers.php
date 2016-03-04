<?php
/*
=================================
		Helper Functions
=================================
*/

function var_pre($var, $msg = NULL){
	echo "\n<pre>";
	if($msg !== NULL){
		echo "\n".$msg."\n";
	}
	var_dump($var);
	echo "</pre>\n";
}
function is_dev(){
	return $_SERVER['REMOTE_ADDR'] == "127.0.0.1" || stripos($_SERVER['HTTP_HOST'], '.dev') !== false || stripos($_SERVER['HTTP_HOST'], '.start') !== false;
}



