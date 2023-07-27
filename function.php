<?php

function registration($login, $password, $repeat_password) {
    if($password != $repeat_password) {
        return false;
    }

    $file = file_get_contents('db.json');
    $dataFromFile = json_decode($file);
    if(!empty($dataFromFile)) {
        foreach ($dataFromFile as $user) {
            if ($user -> username == $login) {
                return false;
            }
        }
    }
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $user = [
        'username' => $login,
        'password' => $hash
    ];
    $dataFromFile[] = $user;
    $json = json_encode($dataFromFile);
    file_put_contents('db.json', $json);
    return true;
}