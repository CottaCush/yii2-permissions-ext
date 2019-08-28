<?php
/**
 * @author Adegoke Obasa <goke@cottacush.com>
 */

namespace cottacush\rbac;

use cottacush\rbac\libs\Constants;
use cottacush\rbac\models\Permission;
use cottacush\rbac\models\Role;
use Yii;

class DbPermissionManager extends BasePermissionManager
{
    /**
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getRoles()
    {
        return Role::find()->asArray()->all();
    }

    /**
     * @param $key
     * @return Role
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getRole($key)
    {
        return Role::find()->where(['key' => $key, 'status' => Constants::STATUS_ACTIVE])->limit(1)->one();
    }

    /**
     * @param $roleId
     * @return Role
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getRoleById($roleId)
    {
        return Role::find()->where(['id' => $roleId, 'status' => Constants::STATUS_ACTIVE])->limit(1)->one();
    }

    /**
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermissions()
    {
        return Permission::find()->asArray()->all();
    }

    /**
     * @param $key
     * @return Permission
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermission($key)
    {
        return Permission::find()->where(['key' => $key, 'status' => Constants::STATUS_ACTIVE])->limit(1)->one();
    }

    /**
     * @param $permissionId
     * @return Permission
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermissionById($permissionId)
    {
        return Permission::find()->where(['id' => $permissionId, 'status' => Constants::STATUS_ACTIVE])
            ->limit(1)->one();
    }

    /**
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getUserRole()
    {
        $role = Yii::$app->session->get($this->sessionPrefix . '::user_role');
        return $role;
    }

    /**
     * @inheritdoc
     * @throws \yii\base\InvalidConfigException
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
