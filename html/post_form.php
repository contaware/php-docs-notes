<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Form</title>
</head>
<body>
<!-- Note: if the given action url has query parameters, 
     they are all handed over. -->
<form action="submit.php" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" id="name"><br>
    <input type="submit" value="HTTP Post">
</form>
</body>
</html>