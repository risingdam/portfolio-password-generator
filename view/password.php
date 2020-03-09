<?php
    
$template = file_get_contents(APP_ROOT . '/template/password.html');

$count = 0;
while ($count < count($password)) {
    $template = str_replace('{{' . $count . '}}', $password[$count], $template);
    $count++;
}

echo $template;
