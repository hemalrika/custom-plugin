<?php

$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : '';
if(!empty($param)) {
	if($param == 'get_message') {
		echo json_encode(array(
			"name" => "MD Hemal Akhand",
			"author" => "HR Writter"
		));
		die();
	}
	if($param == 'post_data') {
		echo json_encode($_REQUEST);
		die();
	}
}