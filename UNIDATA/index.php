<?php
	header("Content-Type: text/plain");
	function get_text($url) {
		$arrContextOptions = array(
			"ssl"=>array(
				"verify_peer"=>false,
				"verify_peer_name"=>false,
			),
		);
		return @file_get_contents($url, false, stream_context_create($arrContextOptions));
	}
	$file = get_text('https://unicode.org/Public/UNIDATA/' . $_GET['file']);
	if ($file === false) {
		echo '';
	}
	else {
		echo $file;
	}
?>