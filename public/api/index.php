<?php
    
define('APP_DIR', dirname(dirname(__dir__)).'/api/app');
define('DATA_DIR', dirname(dirname(__dir__)).'/api/data');
define('DEV_OPTS', JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);

require APP_DIR. '/functions.php' ;
$endpoint = $_SERVER['REQUEST_URI'];
$body = json_decode(file_get_contents('php://input', true), true);

var_dump($endpoint);

switch($method){
    case 'GET':
        if($endpoint==='/api/'){
            $data = getJsonData('default.json');
            returnResponse($data);
        }
        break;
    case 'POST':
        if($endpoint==='/api/'){
            $id = addTask($body, 'default.json');
            returnResponse(['name' => $id]);
        }
        break;
    case 'PUT':
        $id = validateEndpoint($endpoint);
        if($id!==false){
            $body = updateTask($id, $body, 'default.json');
            returnResponse($body);
        }
        break;
    case 'DELETE':
        $id = validateEndpoint($endpoint);
        if($id!==false){
            deleteTask($id, 'default.json');
        }
        break;
}

returnNullResponse();
exit;

// EOF
