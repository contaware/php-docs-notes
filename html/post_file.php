<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['upload']) && $_FILES['upload']['error'] == UPLOAD_ERR_OK) {
        $name = basename($_FILES['upload']['name']); // basename() is for security
        $tmp = $_FILES['upload']['tmp_name'];
        $size = $_FILES['upload']['size'];
        $dir = __DIR__ . '/uploads/';
        if (!is_dir($dir))
            mkdir($dir);
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'png', 'gif'];
        if (in_array($ext, $allowed)) {
            if (move_uploaded_file($tmp, $dir . $name))
                $msg = "Uploaded '$name' to '$dir' ($size bytes)";
            else
                $msg = "Error: could not move the file to the destination directory.";
        }
        else
            $msg = "Error: only " . implode(', ', $allowed) . " allowed!"; 
    }
    else
        $msg = "Error: could not upload the file.";
    
    // Prepare for html display
    $msg = htmlspecialchars($msg, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    $msg = "<p>$msg</p>\n";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post File</title>
</head>
<body>
<?= $msg ?? '' ?>
<form action="post_file.php" method="post" enctype="multipart/form-data">
    <label for="upload">Image to upload</label>
    <input type="file" name="upload" id="upload" accept=".jpg, .png, .gif"><br>
    <input type="submit" value="HTTP Upload">
</form>
</body>
</html>