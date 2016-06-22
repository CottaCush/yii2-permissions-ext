<?php
/**
 * @author Adegoke Obasa <goke@cottacush.com>
 */

namespace cottacush\rbac;

use cottacush\rbac\models\Role;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;

abstract class BasePermissionManager extends Component implements ManagerInterface
{
    protected $sessionPrefix = 'cottacush_rbac';
    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @inheritdoc
     */
    public function canAccess($permissionKey)
    {
        $permissions = $this->getPermissions();
        foreach($permissions as $permission) {
            if(ArrayHelper::getValue($permission, 'key') === $permissionKey) {
                return true;
            }
        }
        return false;
    }

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $roleKey
     * @return mixed
     */
    public function setRoleByKey($roleKey)
    {
        $role = $this->getRole($roleKey);
        Yii::$app->session->set($this->sessionPrefix . '::user_role', $role);
    }

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $roleId
     * @return mixed
     */
    public function setRoleById($roleId)
    {
        $role = $this->getRoleById($roleId);
        Yii::$app->session->set($this->sessionPrefix . '::user_role', $role);
    }
}