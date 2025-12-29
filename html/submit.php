<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
</head>
<body>
<?php
echo '$_SERVER[\'REQUEST_URI\']: ' . $_SERVER['REQUEST_URI'] . "<br>\n";
if (isset($_SERVER['PATH_INFO']))
    echo '$_SERVER[\'PATH_INFO\']: ' . $_SERVER['PATH_INFO'] . "<br>\n";
if (isset($_SERVER['QUERY_STRING']))
    echo '$_SERVER[\'QUERY_STRING\']: ' . $_SERVER['QUERY_STRING'] . "<br>\n";
echo '$_SERVER[\'SCRIPT_NAME\']: ' . $_SERVER['SCRIPT_NAME'] . "<br>\n";
echo '$_SERVER[\'PHP_SELF\']: ' . $_SERVER['PHP_SELF'] . "<br>\n";
echo "<hr>\n";
echo '$_SERVER[\'SERVER_PROTOCOL\']: ' . $_SERVER['SERVER_PROTOCOL'] . "<br>\n";
echo '$_SERVER[\'REQUEST_METHOD\']: ' . $_SERVER['REQUEST_METHOD'] . "<br>\n";
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    foreach($_GET as $key=>$val)
        echo htmlspecialchars("$key=$val", ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . "<br>\n";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach($_POST as $key=>$val)
        echo htmlspecialchars("$key=$val", ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . "<br>\n";
}
echo "<hr>\n";
echo '$_SERVER[\'DOCUMENT_ROOT\']: ' . $_SERVER['DOCUMENT_ROOT'] . "<br>\n";
echo '$_SERVER[\'SCRIPT_FILENAME\']: ' . $_SERVER['SCRIPT_FILENAME'] . "<br>\n";
echo '__FILE__: ' . __FILE__ . "<br>\n";
?>
</body>
</html>