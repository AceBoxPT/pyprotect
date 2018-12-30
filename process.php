<?php

	/*

		pyprotect - by Gabriel Silva
		Version 0.1alpha
		http://gabrielsilva.tk/pyprotect

		This is an open source software

	*/

	try{
		// Checks if file was chosen
		if(isset($_FILES['file']) && $_FILES['file']['name'] != ''){
			// Store error code for reference
			$err = 0;

			// Upload properties
			$_UP['folder'] = 'upload/'; // Destination folder
			$_UP['size'] = 1024 * 1024 * 5; // Maximum file size of 5 MB

			// Unexpected error check
			if($_FILES['file']['error'] != 0){header("Location: error");exit();}

			// Gets file extension
			$tmp = explode('.', $_FILES['file']['name']);
			$extension = strtolower(end($tmp));

			// Checks if extension is allowed
			if(trim($extension) != 'py'){
				// Invalid extension
				$err = 1;

			// Checks if file size is allowed
			}elseif($_UP['size'] <= $_FILES['file']['size']){
				// Invalid size
				$err = 2;
			}else{
				// Creates temporary filename
				$up_name = date('His') . '-' . $_FILES['file']['name'];

				// Does the upload
				if(move_uploaded_file($_FILES['file']['tmp_name'], $_UP['folder'] . $up_name)){

					// Reads the uploaded file
					$text = file_get_contents($_UP['folder'] . $up_name);

					// Checks if file is blank
					if(trim($text) == ''){
						// Blank file
						$err = 3;
					}else{
						// Encodes the text
						$encode = base64_encode($text);

						// Splits the encoded text into keywords
						$parts = str_split($encode, strlen($encode) / 4);

						// Creates result file
						$result = "# encoded by pyprotect\r\n# http://gabrielsilva.tk/pyprotect\r\n\r\nimport base64, codecs" . "\r\nmagic = '" . $parts[0] . "'\r\nlove = '" . str_rot13($parts[1]) . "'\r\ngod = '" . $parts[2] . "'\r\ndestiny = '" . str_rot13($parts[3]) . "'\r\n" . 'joy = \'\x72\x6f\x74\x31\x33\'' . "\r\n" . 'trust = eval(\'\x6d\x61\x67\x69\x63\') + eval(\'\x63\x6f\x64\x65\x63\x73\x2e\x64\x65\x63\x6f\x64\x65\x28\x6c\x6f\x76\x65\x2c\x20\x6a\x6f\x79\x29\') + eval(\'\x67\x6f\x64\') + eval(\'\x63\x6f\x64\x65\x63\x73\x2e\x64\x65\x63\x6f\x64\x65\x28\x64\x65\x73\x74\x69\x6e\x79\x2c\x20\x6a\x6f\x79\x29\')' . "\r\n" . 'eval(compile(base64.b64decode(eval(\'\x74\x72\x75\x73\x74\')),\'<string>\',\'exec\'))' . "";

						// Specifies result folder
						$_UP['result'] = 'result/';

						// Writes the new file and closes the stream
						$file = fopen($_UP['result'] . $up_name, 'w');
						fwrite($file,$result);
						fclose($file);
					}
				}else{
					// Upload error
					$err = 4;
				}
			}
		}else{
			// File not specified
			$err = 5;
		}
	}catch(Exception $e){
		// Unexpected error
		header("Location: error");
		exit();
	}
?>
<html>
	<head>
		<title>pyprotect</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex,nofollow">
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="main.css">
	</head>
	<body>
		<table class="centeredContent" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<span class="title">pyprotect</span>
					<hr>
					<?php
						// Print results based on error code
						switch($err){
							case 0:
								echo '<span id="txt" style="color: #424242;">File protected successfully!<br><a href="' . $_UP['result'] . $up_name.'" target="_blank">DOWNLOAD</a><br><a href="index.php">PROTECT ANOTHER FILE</a><br><br><i>All files are deleted within 30 minutes.</i></span>';
								break;
							case 1:
								echo '<span id="txt" style="color: #424242;">Only .py files are allowed!<br><a href="index.php">TRY AGAIN</a></span>';
								break;
							case 2:
								echo '<span id="txt" style="color: #424242;">Maximum file size is 5 MB!<br><a href="index.php">TRY AGAIN</a></span>';
								break;
							case 3:
								echo '<span id="txt" style="color: #424242;">You chose a blank file!<br><a href="index.php">TRY AGAIN</a></span>';
								break;
							case 4:
								echo '<span id="txt" style="color: #424242;">There was a problem with your upload!<br><a href="index.php">TRY AGAIN</a></span>';
								break;
							case 5:
								echo '<span id="txt" style="color: #424242;">You haven\'t choose a file!<br><a href="index.php">TRY AGAIN</a></span>';
								break;
						}
					?>
					<hr>
					<span class="copy">by Gabriel Silva<br>
					<a href="http://gabrielsilva.tk" target="_blank">[Website]</a>&nbsp;&nbsp;<a href="mailto:contato@gabrielsilva.tk" target="_blank">[Contact]</a>&nbsp;&nbsp;<a href="https://github.com/silvagabriel62/pyprotect" target="_blank">[Source]</a></span>
				</td>
			</tr>
		</table>
	</body>
</html>