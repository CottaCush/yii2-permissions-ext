<?php
/**
 * @author Adegoke Obasa <goke@cottacush.com>
 */

namespace cottacush\rbac;

use cottacush\rbac\models\Permission;
use cottacush\rbac\models\Role;

class DbPermissionManager extends BasePermissionManager
{

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @return mixed
     */
    public function getRoles()
    {
        return Role::find()->asArray()->all();
    }

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $key
     * @return Role
     */
    public function getRole($key)
    {
        return Role::find()->where(['key' => $key, 'status' => 1])->one();
    }

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $roleId
     * @return Role
     */
    public function getRoleById($roleId)
    {
        return Role::find()->where(['id' => $roleId, 'status' => 1])->one();
    }

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @return mixed
     */
    public function getPermissions()
    {
        return Permission::find()->asArray()->all();
    }

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $key
     * @return Permission
     */
    public function getPermission($key)
    {
        return Permission::find()->where(['key' => $key, 'status' => 1])->one();
    }

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $permissionId
     * @return Permission
     */
    public function getPermissionById($permissionId)
    {
        return Permission::find()->where(['id' => $permissionId, 'status' => 1])->one();
    }

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @return mixed
     */
    public function getUserRole()
    {
        $role = \Yii::$app->session->get($this->sessionPrefix . '::user_role');
        return $role;
    }

    /**
     * @inheritdoc
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getUserPermissions()
    {
        /**
         * @var Role $role
         */
        $role = $this->getUserRole();

        return $role->getPermissions();
    }
}