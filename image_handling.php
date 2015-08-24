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
		$img = new ImageUpload($_FILES['file_upload']);
	
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

	

	<!-- Upload form for testing -->
	<form method="post" enctype="multipart/form-data" action="">
		<p>			<!-- Max File Size is 2MB -->
			<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
			<input type="file" name="file_upload">
			<input type="submit" name="submit" value="Upload">
		</p>
	</form>

	<?php
	// check for upload and display if upload
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		// check for successful upload of image
		if($img->upload_err === 0){
			echo "Image: " . $img->image_path . '<br>';
			echo "Thumbnail: " . $img->thumb_path;
			echo '<p><img src="' . $img->thumb_path . '" alt=""></p>';
		} // end if
	} // end if
	?>
</body>
</html>