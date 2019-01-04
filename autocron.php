<?php

	/*

		pyprotect - by Gabriel Silva
		Version 0.1alpha
		http://gabrielsilva.tk/pyprotect

		This is an open source software

	*/

	// 0. START

	// Defines the output type
	header("Content-Type: text/plain; charset=utf-8");

	// Stores the number of files
	$count = 0;

	// Stores current time
	$date = date('d/m/Y H:i:s');

	// 1. RESULT FOLDER

	// Specifies the folder to delete files
	$folder = 'result';

	// Get all the files from folder
	$files = glob($folder . '/*');

	// Adds the number of files
	$count += count($files);

	// Loop through each file
	foreach($files as $file){
	    // Exclude index file
	    if(basename($file) != 'index.php'){
	    	// Check if file is valid
	    	if(is_file($file)){
	    		// Delete file
	        	unlink($file);
	    	}
	    }
	}

	// 2. UPLOAD FOLDER

	// Specifies the folder to delete files
	$folder = 'upload';

	// Get all the files from folder
	$files = glob($folder . '/*');

	// Adds the number of files
	$count += count($files);

	// Loop through each file
	foreach($files as $file){
	    // Exclude index file
	    if(basename($file) != 'index.php'){
	    	// Check if file is valid
	    	if(is_file($file)){
	    		// Delete file
	        	unlink($file);
	    	}
	    }
	}

	// 3. END

	// Prints the result log
	print ($count - 2) . ' files deleted at ' . $date . ' UTC.';
?>
