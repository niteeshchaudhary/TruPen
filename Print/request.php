<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php 
session_start();
?>
<form align = "center" action="request2.php" method="post" enctype="multipart/form-data">
<input type="file" id="file" accept="pdf/*" name="pdf" onchange="return fileValidation()" required />
<div id="pdfPreview"></div>
    <script>
        function fileValidation() {
            var fileInput = 
                document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.pdf)$/i;
             const fi = document.getElementById('file');
               const fsize = fi.files.item(0).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 5120) {
                    alert(
                      "File too Big, please select a file less than 5 MB");
					  fileInput.value = '';
					return false;
                }
            if (!allowedExtensions.exec(filePath)) {
                alert('Only .pdf files are allowed');
                fileInput.value = '';
                return false;
            }
            else 
            {
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'pdfPreview').innerHTML = 
                            '<embed width="1000" height="700" src="' + e.target.result
                            + '"/>';
                    };
       
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    </script><br>
<label for="copy"><b>No. Of Copies: </b></label><br><input type="number" name = "copy" required /><br>
 <label for="type">Type:</label>
  <select name="type" id="type" required>
    <option value="back_to_back">Back-to-Back</option>
    <option value="one_side">One-Side</option>
  </select><br>
  <label for="comment"><b>Comment: </b></label><br><input type="text" name = "comment" /><br>
<input type="submit" value ="Request"/></form>
</body>
</html>