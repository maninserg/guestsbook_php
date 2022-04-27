<?php

function debug($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function registration(): bool
{
    global $pdo;
    $login = !empty($_POST['login']) ? trim($_POST['login']) : '';
    $password = !empty($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($login) || empty($password)) {
        $_SESSION['errors'] = 'Fields login/password was filled out incorrectly';
        return false;
    }

    $res = $pdo->prepare("SELECT COUNT(*) FROM users WHERE login = ?");
    $res->execute([$login]);
    if ($res->fetchColumn()) {
        $_SESSION['errors'] = 'This login is used';
        return false;
    }

    $pass_hash = password_hash($password, PASSWORD_DEFAULT);

    $res = $pdo->prepare("INSERT INTO users(login, pass) VALUES(?, ?)");
    if($res->execute([$login, $pass_hash])) {
        $_SESSION['success'] = 'Registration is successful';
        return true;
    } else {
        $_SESSION['errors'] = 'Registration is not successful';
        return false;
    }
}