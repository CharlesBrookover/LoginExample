<?php
    /**
     * Process the login process and new user creation
     *
     * @author Charles Brookover
     */

    session_start();

    if (isset($_POST['login'])) {
        $password = $_POST['password'];
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errorMessage'] = 'Invalid Email Address';
            header('location: index.php');
            exit();
        }

        if(empty($password)) {
            $_SESSION['errorMessage'] = 'Empty Password Provided';
            header('location: index.php');
            exit();
        }

        // Process login
        session_unset();
        $_SESSION['logTime'] = date('c');
        $user                 = new stdClass();
        $user->firstName      = 'C';
        $user->lastName       = 'B';
        $user->city           = 'M';
        $user->age            = 2;

        $_SESSION['userInfo'] = json_encode($user);
    }

    if(isset($_POST['createUser'])) {

    }

    header('Location: index.php');
