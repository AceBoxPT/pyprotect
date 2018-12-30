# pyprotect
This is a simple online tool to obfuscate python codes and "hide" their sources. It was inspired by former _pyobfuscate.tk_ project, rest in piece.

### Important information
Please note that **this is not an advanced encryption tool** and it's intended only to prevent your code from being read by those who don't know programming very well. _It is quite possible to decrypt the codes using basic methods, so do not use this tool to hide important information._

### Source files reference
* `result` - Obfuscated files are stored temporarily in this folder. Includes a _index.php_ file which redirects to the main page, preventing users from seeing the file list.
* `upload` - Same as _result_ folder, but stores the uploaded files instead.
* `.htaccess` - Apache server settings (friendly URLs and error handles).
* `autocron.php` - Cron job file, ran every 30 minutes by the server. Deletes all the files uploaded and temporarily stored at _result_ and _upload_ folders.
* `bg.png`, `favicon.ico`, `loading.gif`, `main.css` - Website assets as images and stylesheet. Do not matter.
* `error.php` - Unexpected error page.
* `index.php` - Main website page, with the form which selects the file.
* **`process.php`** - **The real deal here**. This is the script which uploads, obfuscates and processes the files.

### Example
See this tool working at: [http://gabrielsilva.tk/pyprotect](http://gabrielsilva.tk/pyprotect)
