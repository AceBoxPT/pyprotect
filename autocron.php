<?php

	/*

		pyprotect - by Gabriel Silva
		Version 0.1alpha
		http://gabrielsilva.tk/pyprotect

		This is an open source software

	*/

	// 1. RESULT FOLDER

	// Specifies the folder to delete files
	$folder = 'result';

	// Get all the files from folder
	$files = glob($folder . '/*');

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
?>