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


function login(): bool
{
    global $pdo;
    $login = !empty($_POST['login']) ? trim($_POST['login']) : '';
    $password = !empty($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($login) || empty($password)) {
        $_SESSION['errors'] = 'Fields login/password was filled out incorrectly';
        return false;
    }

    $res = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $res->execute(["$login"]);
    if (!$user = $res->fetch()) {
        $_SESSION['errors'] = 'Login/password is not right';
        return false;
    }
    
    if (!password_verify($password, $user['pass'])) {
        $_SESSION['errors'] = 'Login/password is not right';
        return false;
    } else {
        $_SESSION['success'] = 'Authorization is successful';
        $_SESSION['user']['name'] = $user['login'];
        $_SESSION['user']['id'] = $user['id'];
        return true;

    }
}

function save_message(): bool
{
    global $pdo;
    $message = !empty($_POST['message']) ? trim($_POST['message']) : '';

    if (!isset($_SESSION['user']['name'])) {
        $_SESSION['errors'] = "User is not autorizired";
        return false;
       
    }

    if (empty($message)) {
        $_SESSION['errors'] = "Message can't be empty";
        return false;

    }

    $res = $pdo->prepare("INSERT INTO messages(name, message) VALUES (?, ?)");
    if ($res->execute([$_SESSION['user']['name'], $message])) {
        $_SESSION['success'] = 'Message has been added';
        return true;
    } else {
        $_SESSION['errors'] = 'Message has not been added';
        return false;
    }
}