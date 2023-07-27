<?php
if (!empty($_POST['login'])){
    if (!empty($_POST['password'])){
        login($_POST['login'], $_POST['password']);
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
    <input type="submit" value="Авторизоваться">
</form>
<a href="./registration.php">Зарегистрироваться!</a>