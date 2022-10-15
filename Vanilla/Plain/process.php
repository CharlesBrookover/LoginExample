<?php
/**
 * Process the login.db process and new user creation
 *
 * @author Charles Brookover
 */

session_start();

if (isset($_POST['login.db'])) {
    $password = $_POST['password'];
    $email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errorMessage'] = 'Invalid Email Address';
        header('location: index.php');
        exit();
    }

    if (empty($password)) {
        $_SESSION['errorMessage'] = 'Empty Password Provided';
        header('location: index.php');
        exit();
    }

    // Process login.db
    session_unset();
    $_SESSION['logTime'] = date('c');
    $userInfo = saveUserInfo(['firstName' => 'C', 'lastName' => 'B', 'city' => 'M', 'age' => 4, 'email' => $email]);
    var_dump($userInfo);
    $_SESSION['userInfo'] = $userInfo;
}

if (isset($_POST['createUser'])) {
    $user = saveUserInfo($_POST);
    if (isset($user)) {
        $_SESSION['userInfo'] = $user;
    } else {
        $_SESSION['errorMessage'] = 'Bad Data';
        header('Location: new.php');
        exit();
    }
}

if (isset($_POST['savePrefs'])) {
    $user = saveUserInfo($_POST, $_SESSION['userInfo']);
    if (isset($user)) {
        $_SESSION['userInfo'] = $user;
    } else {
        $_SESSION['errorMessage'] = 'Bad Data';
        header('Location: preferences.php');
        exit();
    }
}

header('Location: index.php');

function saveUserInfo(array $data, ?stdClass $current = null): bool|stdClass|null
{
    $dataKeys = ['firstName', 'lastName', 'city', 'age', 'email'];
    $userInfo = $current ?? new stdClass();

    foreach ($dataKeys as $key) {
        switch ($key) {
            case 'email':
                $value = filter_var($data[$key], FILTER_SANITIZE_EMAIL);
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return null;
                }
                break;
            case 'age':
                $value = filter_var($data[$key], FILTER_SANITIZE_NUMBER_INT);
                if (!filter_var($value, FILTER_VALIDATE_INT, ['options' => ['min_range' => 0, 'max_range' => 100]])) {
                    return $value;
                }
                break;
            default:
                $value = $data[$key];
        }
        $userInfo->$key = $value;
    }

    return $userInfo;
}