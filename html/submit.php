<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
</head>
<body>
<?php
function htmlSafe($s) {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');    
}
if (isset($_SERVER['REQUEST_URI']))
    echo '$_SERVER[\'REQUEST_URI\']: ' . htmlSafe($_SERVER['REQUEST_URI']) . "<br>\n";
if (isset($_SERVER['PATH_INFO']))
    echo '$_SERVER[\'PATH_INFO\']: ' . htmlSafe($_SERVER['PATH_INFO']) . "<br>\n";
if (isset($_SERVER['QUERY_STRING']))
    echo '$_SERVER[\'QUERY_STRING\']: ' . htmlSafe($_SERVER['QUERY_STRING']) . "<br>\n";
echo '$_SERVER[\'SCRIPT_NAME\']: ' . htmlSafe($_SERVER['SCRIPT_NAME']) . "<br>\n";
echo '$_SERVER[\'PHP_SELF\']: ' . htmlSafe($_SERVER['PHP_SELF']) . "<br>\n";
echo "<hr>\n";
if (isset($_SERVER['SERVER_PROTOCOL']))
    echo '$_SERVER[\'SERVER_PROTOCOL\']: ' . htmlSafe($_SERVER['SERVER_PROTOCOL']) . "<br>\n";
if (isset($_SERVER['REQUEST_METHOD']))
    echo '$_SERVER[\'REQUEST_METHOD\']: ' . htmlSafe($_SERVER['REQUEST_METHOD']) . "<br>\n";
echo "\$_GET:<br>\n";
foreach($_GET as $key=>$val)
    echo htmlSafe("$key=$val") . "<br>\n";
echo "\$_POST:<br>\n";
foreach($_POST as $key=>$val)
    echo htmlSafe("$key=$val") . "<br>\n";
echo "<hr>\n";
echo '$_SERVER[\'DOCUMENT_ROOT\']: ' . htmlSafe($_SERVER['DOCUMENT_ROOT']) . "<br>\n";
echo '$_SERVER[\'SCRIPT_FILENAME\']: ' . htmlSafe($_SERVER['SCRIPT_FILENAME']) . "<br>\n";
echo '__FILE__: ' . htmlSafe(__FILE__) . "<br>\n";
?>
</body>
</html>