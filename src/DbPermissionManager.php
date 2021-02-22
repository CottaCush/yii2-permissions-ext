<?php
/**
 * @author Adegoke Obasa <goke@cottacush.com>
 */

namespace cottacush\rbac;

use cottacush\rbac\libs\Constants;
use cottacush\rbac\models\Permission;
use cottacush\rbac\models\Role;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveRecord;

class DbPermissionManager extends BasePermissionManager
{
    /**
     * @return array
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getRoles(): array
    {
        return Role::find()->asArray()->all();
    }

    /**
     * @param $key
     * @return array|Role|ActiveRecord
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getRole($key): Role|array|ActiveRecord
    {
        return Role::find()->where(['key' => $key, 'status' => Constants::STATUS_ACTIVE])->limit(1)->one();
    }

    /**
     * @param $roleId
     * @return array|Role|ActiveRecord
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getRoleById($roleId): Role|array|ActiveRecord
    {
        return Role::find()->where(['id' => $roleId, 'status' => Constants::STATUS_ACTIVE])->limit(1)->one();
    }

    /**
     * @return array
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermissions(): array
    {
        return Permission::find()->asArray()->all();
    }

    /**
     * @param $key
     * @return array|Permission|ActiveRecord
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermission($key): array|ActiveRecord|Permission
    {
        return Permission::find()->where(['key' => $key, 'status' => Constants::STATUS_ACTIVE])->limit(1)->one();
    }

    /**
     * @param $permissionId
     * @return array|Permission|ActiveRecord
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermissionById($permissionId): array|ActiveRecord|Permission
    {
        return Permission::find()->where(['id' => $permissionId, 'status' => Constants::STATUS_ACTIVE])
            ->limit(1)->one();
    }

    /**
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getUserRole(): mixed
    {
        return Yii::$app->session->get($this->sessionPrefix . '::user_role');
    }

    /**
     * @inheritdoc
     * @throws InvalidConfigException
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getUserPermissions(): mixed
    {
        /**
         * @var Role $role
         */
        $role = $this->getUserRole();

        return $role->getPermissions();
    }
}
