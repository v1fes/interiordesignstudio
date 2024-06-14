<?php

namespace models;

class Role
{
    protected static $tableName = 'Roles';

    public static function addRole($roleName)
    {
        \core\Core::getInstance()->db->insert(self::$tableName, [
            'RoleName' => $roleName
        ]);
    }

    public static function getRoles()
    {
        return \core\Core::getInstance()->db->select(self::$tableName, '*');
    }

    public static function getRoleById($roleID)
    {
        $role = \core\Core::getInstance()->db->select(self::$tableName, '*', [
            'RoleID' => intval($roleID)
        ]);
        return !empty($role) ? $role[0] : null;
    }
    
    

    public static function updateRole($roleID, $roleName)
    {
        \core\Core::getInstance()->db->update(self::$tableName, [
            'RoleName' => $roleName
        ], [
            'RoleID' => $roleID
        ]);
    }

    public static function deleteRole($roleID) {
        \core\Core::getInstance()->db->delete(self::$tableName, [
            'RoleID' => intval($roleID)
        ]);
    }
    

    public static function isRoleExists($roleName)
    {
        $role = \core\Core::getInstance()->db->select(self::$tableName, '*', [
            'RoleName' => $roleName
        ]);
        return !empty($role);
    }
}
