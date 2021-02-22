<?php
/**
 * @author Adegoke Obasa <goke@cottacush.com>
 */

namespace cottacush\rbac;

use Exception;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;

abstract class BasePermissionManager extends Component implements ManagerInterface
{
    protected string $sessionPrefix = 'cottacush_rbac';

    /**
     * @throws Exception
     * @author Adegoke Obasa <goke@cottacush.com>
     * @inheritdoc
     */
    public function canAccess($permissionKey): bool
    {
        $permissions = $this->getPermissions();
        foreach ($permissions as $permission) {
            if (ArrayHelper::getValue($permission, 'key') === $permissionKey) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $roleKey
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function setRoleByKey($roleKey): void
    {
        $role = $this->getRole($roleKey);
        Yii::$app->session->set($this->sessionPrefix . '::user_role', $role);
    }

    /**
     * @param $roleId
     * @return void
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function setRoleById($roleId): void
    {
        $role = $this->getRoleById($roleId);
        Yii::$app->session->set($this->sessionPrefix . '::user_role', $role);
    }
}
