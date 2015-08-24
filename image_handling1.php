<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>File Uploads 1s</title>
</head>
<body>
	<?php
	require_once 'inc/image_upload_class.php';
	// check for upload and process if upload
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		// takes uploaded file and creates a new  imageUpload object 
		$img = new ImageUpload($_FILES['fileToUpload']);
	
		// $path = directory the optimized image will be stored to
		// $tpath = directory the thumbnail image will be stored to
		$path = 'images/';
		$tpath = 'thumbs/';
		// optimize image	
		$img->optimizeImage($path);
		echo "<br>";
		// create copy of image and resize for thumbnail
		$img->makeThumb($tpath, 75);
				
	} // end if     (form POST check)

	?>

	


	<?php
	// check for upload and display if upload
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		// check for successful upload of image
		if($img->upload_err === 0){
			echo "Image: " . $img->image_path . '<br>';
			echo "Thumbnail: " . $img->thumb_path;
			echo '<p><img src="' . $img->thumb_path . '" alt=""></p>';
			echo $img->item_id . "<br>";
			echo $img->img_title . '<br>';
		} // end if
	} // end if
	?>
</body>
</html>