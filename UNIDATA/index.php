<?php
	function get_text($url) {
		$arrContextOptions = array(
			"ssl"=>array(
				"verify_peer"=>false,
				"verify_peer_name"=>false,
			),
		);
		$content = @file_get_contents($url, false, stream_context_create($arrContextOptions));
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		header("Content-Type: ". $finfo->buffer($content));
		return $content;
	}
	if (isset($_GET["file"]) and $_GET["file"] !== '') {
		$file = get_text('https://unicode.org/Public/UNIDATA/' . $_GET['file']);
		if ($file === false) {
			echo '';
		}
		else {
			echo $file;
		}
	}
	else {
		echo '';
	}

?>