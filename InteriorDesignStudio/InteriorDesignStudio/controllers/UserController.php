<?php

namespace controllers;

use core\Controller;
use models\User;

class UserController extends Controller
{
    public function registerAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            if (!User::isUsernameExists($username)) {
                User::addUser($username, $password, $email);
                $this->redirect('InteriorDesignStudio/user/login');
            } else {
                $params['error'] = 'Username already exists.';
            }
        }
        return $this->render('views/user/register.php', $params ?? []);
    }

    public function loginAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = User::verifyUser($username, $password);
            if ($user) {
                User::authenticateUser($user);
                $this->redirect('InteriorDesignStudio/user/profile');
            } else {
                $params['error'] = 'Invalid username or password.';
            }
        }
        return $this->render('views/user/login.php', $params ?? []);
    }

    public function logoutAction()
    {
        User::logoutUser();
        $this->redirect('InteriorDesignStudio/user/login');
    }

    public function profileAction()
    {
        if (!User::isUserAuthenticated()) {
            $this->redirect('InteriorDesignStudio/user/login');
        }

        $user = User::getCurrentAuthenticatedUser();
        $projects = User::getUserProjects($user['UserID']);
        return $this->render('views/user/profile.php', ['user' => $user, 'projects' => $projects]);
    }

    public function updateAction()
    {
        if (!User::isUserAuthenticated()) {
            $this->redirect('InteriorDesignStudio/user/login');
        }

        $user = User::getCurrentAuthenticatedUser();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updates = [
                'Username' => $_POST['username'],
                'Email' => $_POST['email']
            ];

            User::updateUser($user['UserID'], $updates);
            $this->redirect('InteriorDesignStudio/user/profile');
        }

        return $this->render('views/user/update.php', ['user' => $user]);
    }
}
