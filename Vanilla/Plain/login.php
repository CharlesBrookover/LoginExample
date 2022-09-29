<?php
    /**
     * Process the login process and new user creation
     *
     * @author Charles Brookover
     */

    echo print_r($_POST, true);

    if (!empty($_POST['btnLogin'])) {
        session_start();

        $email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL | FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS | FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($email)) {
            $_SESSION['errorMessage'] = 'Invalid Email Address';
            header('location: index.php');
            exit();
        }

        if (empty($password)) {
            $_SESSION['errorMessage'] = 'Invalid Credentials';
            header('location: index.php');
            exit();
        }

        // Process login
        $_SESSION['loggedin'] = 1;
        $user                 = new stdClass();
        $user->firstName      = 'C';
        $user->lastName       = 'B';
        $user->city           = 'M';
        $user->age            = 2;

        $_SESSION['userInfo'] = json_encode($user);
    }

    if (!empty($_POST['newUser'])) {
        session_start();
        // Perform some user registration stuff
    }

//    header('Location: index.php');
