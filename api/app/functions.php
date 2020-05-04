<?php

function returnResponse($data){
    header('Content-Type: application/json');
    echo json_encode($data, DEV_OPTS);
    exit;
}

function returnNullResponse(){
    header('Content-Type: application/json');
    echo 'null';
    exit;
}

function getJsonData($file){
    if(file_exists(DATA_DIR.'/'.$file)){
        $data = file_get_contents(DATA_DIR.'/'.$file);
        return json_decode($data, true);
    }
    returnNullResponse();
}

function putJsonData($file, $data){
    if(file_exists(DATA_DIR.'/'.$file)){
        $data = json_encode($data, DEV_OPTS);
        file_put_contents(DATA_DIR.'/'.$file, $data);
        return true;
    }
}

function getNewId(){
    $prefix = '-';
    $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';
    $name = $prefix;
    while(strlen($name) < 20){
        $name.= substr($chars,random_int(0,strlen($chars)-1),1);
    }
    return $name;
}

function addTask($body,$file){
    $filedata = getJsonData($file);
    $id = getNewId();
    
    if(isset($body['done'])===false){
         $body['done'] = false;
    }
    if(isset($body['description'])===false){
         $body['description'] = '';
    }
    
    $filedata[$id] = [
        'done' => boolval($body['done']),
        'description' => strval($body['description'])
    ];
    putJsonData($file,$filedata);
    return $id;
}

function validateEndpoint($endpoint){
    if($endpoint==='/leon/tasks.json'){
        return true;
    }
    if( substr($endpoint,0,12)==='/leon/tasks/' &&
        substr($endpoint,32,5)==='.json' &&
        substr($endpoint,12,1)==='-')
    {
        return substr($endpoint,12,20);
    }
    return false;
}

function updateTask($id,$body,$file){
    $filedata = getJsonData($file);
    
    if(isset($body['done'])===false){
         $body['done'] = false;
    }
    if(isset($body['description'])===false){
         $body['description'] = '';
    }
    
    $filedata[$id] = [
        'done' => boolval($body['done']),
        'description' => strval($body['description'])
    ];
    putJsonData($file,$filedata);
    return $body;
}

function deleteTask($id,$file){
    $filedata = getJsonData($file);
    unset($filedata[$id]);
    putJsonData($file,$filedata);
    return true;
}
