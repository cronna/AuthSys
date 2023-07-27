<?php

session_start();

function registration($login, $password, $repeat_password, $avatar) {
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

    $avatar = file_get_contents($avatar['tmp_name']);
    $avatar = base64_encode($avatar);


    $hash = password_hash($password, PASSWORD_DEFAULT);
    $user = [
        'username' => $login,
        'password' => $hash,
        'avatar' => $avatar
    ];
    $dataFromFile[] = $user;
    $json = json_encode($dataFromFile);
    file_put_contents('db.json', $json);
    header('location: /login.php');
}

function login($login, $password) {
    $file = file_get_contents('db.json');
    $dataFromFile = json_decode($file);

    if (!empty($dataFromFile)) {
        foreach ($dataFromFile as $user) {
            if ($user->username == $login) {
                if (password_verify($password, $user->password)) {
                    $_SESSION['avatar'] = $user->avatar;
                    header('location: ./profile.php');
                };
            }
        }
    }
}