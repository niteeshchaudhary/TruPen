<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php 
session_start();
?>
<form align = "center" action="second_form_pro.php" method="post" id="second" enctype="multipart/form-data">
<input type="file" id="file" accept="image/*" name="image" onchange="return fileValidation()">
<div width="5%" height="10%" id="imagePreview"></div>
    <script>
        function fileValidation() {
            var fileInput = 
                document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg)$/i;
             const fi = document.getElementById('file');
               const fsize = fi.files.item(0).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1024) {
                    alert(
                      "File too Big, please select a file less than 1 MB");
					  fileInput.value = '';
					return false;
                }
            if (!allowedExtensions.exec(filePath)) {
                alert('Only .jpg files are allowed');
                fileInput.value = '';
                return false;
            }
            else 
            {
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'imagePreview').innerHTML = 
                            '<img src="' + e.target.result
                            + '"/>';
                    };
                     
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    </script><br>
<label for="id"><b>Username</b></label><br><input type="text" name = "id" value="<?php echo $_SESSION["user"]; ?>" disabled/><br>
<label for="fname"><b>First Name*</b></label><br><input type="text" name = "fname" required/><br>
<label for="lname"><b>Last Name*</b></label><br><input type="text" name = "lname" required/><br>
<label for="email"><b>Email address*</b></label><br><input type="text" name = "email" required/><br>
 <label for="gender">Gender*</label>
  <select name="gender" id="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="prefer not to say">Prefer not to say</option>
  </select><br>
<label for="dob"><b>Date of Birth*</b></label><br><input type="date" name = "dob" required/><br>
<label for="bio"><b>Bio</b></label><br>
<textarea id="bio" class="text" cols="20" rows ="5" name="bio" form="second"></textarea>
<input type="submit" value ="Update"/>
</body>
</html>