<?php

namespace cottacush\rbac;

/**
 * Manager Interface
 * @author Adegoke Obasa <goke@cottacush.com>
 */
interface ManagerInterface
{
    /**
     * Checks if the user has the specified permission.
     * @param $permissionKey
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function canAccess($permissionKey);

    /**
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getRoles();

    /**
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getUserRole();

    /**
     * @param $key
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getRole($key);

    /**
     * @param $roleId
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getRoleById($roleId);

    /**
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermissions();

    /**
     * @param $key
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermission($key);

    /**
     * @param $permissionId
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermissionById($permissionId);

    /**
     * @param $roleKey
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function setRoleByKey($roleKey);

    /**
     * @param $roleId
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function setRoleById($roleId);

    /**
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getUserPermissions();
}