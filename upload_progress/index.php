<html><head></head><body>
<?php if($_SERVER['REQUEST_METHOD'] === 'POST') { 

	$uploaddir = '';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    	echo "File uploaded.\n";
	} else {
    	echo "Error load.\n";
	}
} else { 
?>

<form name="upload" id="form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" id="upload-MAX_FILE_SIZE">
    <input type="file" name="myfile" id="myfile">
    <input type="submit" value="Загрузить">
</form>

<p id="uploaded"></p>
<p><progress max="100" value="0" id="progress"></progress></p>
<p id="result"></p>

<script type="text/javascript" src="script.js"></script>
<script type="text/javascript">
 document.addEventListener("DOMContentLoaded", function(){
	var progress    = document.getElementById("progress"),
    uploaded    = document.getElementById("uploaded"),
    result      = document.getElementById("result"),
    maxFileSize = document.getElementById("upload-MAX_FILE_SIZE");

	document.getElementById("form").onsubmit = function(e) {
	    e.preventDefault();
	    var input = this.elements.myfile;
	    var file = input.files[0];
	    
	    if (file.size >= maxFileSize.value) {
	        result.innerHTML = '> max file size';
	        return false;
	    }
	    
	    if (file) {
	        upload(file);
	    }
	}
});
</script>

	<?php } ?>
</body>
</html>