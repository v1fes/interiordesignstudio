<?php

namespace controllers;

use core\Controller;
use models\Role;

class RoleController extends Controller
{
    public function createAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $roleName = $_POST['roleName'];
            if (!Role::isRoleExists($roleName)) {
                Role::addRole($roleName);
                $this->redirect('InteriorDesignStudio/role/list');
            } else {
                $params['error'] = 'Role already exists.';
            }
        }
        return $this->render('views/role/create.php', $params ?? []);
    }

    public function listAction()
    {
        $roles = Role::getRoles();
        return $this->render('views/role/list.php', ['roles' => $roles]);
    }

    public function editAction($params)
    {
        $id = intval($params[0]);

        $role = Role::getRoleById($id);
        if (!$role) {
            return $this->error(404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $roleName = $_POST['roleName'];
            Role::updateRole($id, $roleName);
            $this->redirect('InteriorDesignStudio/role/list');
        }

        return $this->render('views/role/edit.php', ['role' => $role]);
    }

    public function deleteAction($params)
    {
        $id = intval($params[0]);
        $role = Role::getRoleById($id);
        if (!$role) {
            return $this->error(404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Role::deleteRole($id);
            $this->redirect('InteriorDesignStudio/role/list');
        }

        return $this->render('views/role/delete.php', ['role' => $role]);
    }
}
