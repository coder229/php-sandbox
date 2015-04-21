<?php
	header("Content-type: image/jpeg");
	
	require_once("resources/config.php");
	
	$stmt = $mysqli->prepare('select folder, filename from photoman_image where image_id = ?');

	$stmt->bind_param('s', $_GET['img']);
	$stmt->execute();
	
	/* bind result variables */
    $stmt->bind_result($folder, $filename);

    /* fetch value */
    $stmt->fetch();

	$image_path = $folder . DIRECTORY_SEPARATOR . $filename;
	
	$image=imagecreatefromjpeg($image_path);
	$scaled = imagescale($image, 200, -1,  IMG_BICUBIC_FIXED);
	imagejpeg($scaled);
	
	$mysqli->close();
?>