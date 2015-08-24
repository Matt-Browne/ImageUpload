<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>pdf upload</title>
</head>
<body>
	<?php

	$pdfPath = 'pdf/';
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$mime = finfo_file($finfo, $_FILES['file_upload']['tmp_name']);
		$ok = false;
		$date = date_create();
		$s_path = $pdfPath . "pdf_" . date_timestamp_get($date) . ".pdf";
		if ($mime === 'application/pdf') {
		  	$uploadResult = move_uploaded_file($_FILES['file_upload']['tmp_name'], $s_path);

		  	if ($uploadResult == true) {
		   		echo "File Uploaded";
		  	} 
		} else  {
		  		echo "File not uploaded, not a PDF";
		   
		}

	}


		
		
		
		
		// echo $test;
		// if($test !== true){
		// 	echo "";
		//  	echo "<p>".$test."</p>";
		// }


	



	?>




	<!-- Upload form for testing -->
	<form method="post" enctype="multipart/form-data" action="">
		<p>			<!-- Max File Size is 2MB -->
			<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
			<input type="file" name="file_upload">
			<input type="submit" name="submit" value="Upload">
		</p>
	</form>
</body>
</html>