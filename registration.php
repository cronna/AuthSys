<?php
require "function.php";

if (!empty($_POST['login'])){
    if (!empty($_POST['password'])){
        if (!empty($_POST['password_repeat'])){
            registration($_POST['login'], $_POST['password'], $_POST['password_repeat']);
        } else {
            echo "Повторите пароль!";
        }
    } else {
        echo "Введите пароль!";
    }
} else {
    echo "Введите логин!";
}
?>
<form method="post">
    <label style="display: block">
        Введите логин:<br>
        <input type="text" name="login">
    </label>
    <label style="display: block">
        Введите пароль:<br>
        <input type="password" name="password">
    </label>
    <label style="display: block">
        Повторите пароль:<br>
        <input type="password" name="password_repeat">
    </label>
    <input type="submit" name="btn" value="Зарегистрироваться">
</form>
<a href="./login.php">Авторизоваться!</a>