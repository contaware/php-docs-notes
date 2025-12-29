<?php
$postdata = http_build_query([
    'name1' => 'value 1',
    'name2' => 'value 2',
]);
$ctx = stream_context_create([
    'http' => [
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $postdata,
    ]
]);
echo file_get_contents('http://localhost/submit.php', false, $ctx);