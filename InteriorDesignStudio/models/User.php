<?php

namespace models;

use core\Utils;

class User
{
    protected static $tableName = 'Users';

    public static function addUser($username, $password, $email, $roleID = 3)
    {
        \core\Core::getInstance()->db->insert(
            self::$tableName, [
                'Username' => $username,
                'PasswordHash' => self::hashPassword($password),
                'Email' => $email,
                'RoleID' => $roleID
            ]
        );
    }

    public static function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function updateUser($id, $updatesArray)
    {
        $updatesArray = Utils::filterArray($updatesArray, ['Username', 'Email', 'RoleID']);
        \core\Core::getInstance()->db->update(self::$tableName, $updatesArray, [
            'UserID' => $id
        ]);
    }

    public static function isUsernameExists($username) {
        $user = \core\Core::getInstance()->db->select(self::$tableName, '*', [
            'Username' => $username
        ]);
        return !empty($user);
    }

    public static function verifyUser($username, $password) {
        $user = self::getUserByUsername($username);
        if ($user && password_verify($password, $user['PasswordHash'])) {
            return $user;
        }
        return false;
    }

    public static function getUserByUsername($username) {
        $user = \core\Core::getInstance()->db->selectWithJoin(
            self::$tableName,
            ['Users.*', 'Roles.RoleName'],
            [
                [
                    'table' => 'Roles',
                    'on' => 'Users.RoleID = Roles.RoleID'
                ]
            ],
            ['Username' => $username]
        );
        return !empty($user) ? $user[0] : null;
    }

    public static function authenticateUser($user) {
        $_SESSION['user'] = $user;
    }

    public static function logoutUser() {
        unset($_SESSION['user']);
    }

    public static function isUserAuthenticated() {
        return isset($_SESSION['user']);
    }

    public static function getCurrentAuthenticatedUser() {
        return $_SESSION['user'];
    }

    public static function isAdmin() {
        $user = self::getCurrentAuthenticatedUser();
        return $user['RoleID'] == 1;
    }

    public static function getFullName($user) {
        return $user['Username'];
    }
    public static function getAllUsers() {
        return \core\Core::getInstance()->db->selectWithJoin(
            self::$tableName,
            ['Users.*', 'Roles.RoleName'],
            [
                [
                    'table' => 'Roles',
                    'on' => 'Users.RoleID = Roles.RoleID'
                ]
            ]
        );
    }

    public static function getUserProjects($userID) {
        return \core\Core::getInstance()->db->selectWithJoin(
            'Projects',
            ['Projects.*', 'Services.ServiceName'],
            [
                [
                    'table' => 'Services',
                    'on' => 'Projects.ServiceID = Services.ServiceID'
                ]
            ],
            ['CreatorID' => $userID]
        );
    }
}
