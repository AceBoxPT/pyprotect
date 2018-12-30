<!--

	pyprotect - by Gabriel Silva
	Version 0.1alpha
	http://gabrielsilva.tk/pyprotect

	This is an open source software

-->

<html>
	<head>
		<title>pyprotect</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="index,follow">
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="main.css">
		<script type="text/javascript">
			function showLoad(){
				document.getElementById('form').style.display = 'none';
				document.getElementById('img').style.display = 'inline';
				document.getElementById('txt').innerHTML = 'Uploading your file, please wait...'
			}
		</script>
	</head>
	<body>
		<table class="centeredContent" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<span class="title">pyprotect</span>
					<hr>
					<span id="txt" style="color: #424242;">Select a .py file to be obfuscated:</span><br>
					<img src="loading.gif" id="img" class="loader">
					<form action="process" onsubmit="showLoad();" id="form" method="post" enctype="multipart/form-data">
						<input accept=".py" type="file" required name="file"><br>
						<button>Send file</button>
					</form>
					<hr>
					<span class="copy">by Gabriel Silva<br>
					<a href="http://gabrielsilva.tk" target="_blank">[Website]</a>&nbsp;&nbsp;<a href="mailto:contato@gabrielsilva.tk" target="_blank">[Contact]</a>&nbsp;&nbsp;<a href="https://github.com/silvagabriel62/pyprotect" target="_blank">[Source]</a></span>
				</td>
			</tr>
		</table>
	</body>
</html>