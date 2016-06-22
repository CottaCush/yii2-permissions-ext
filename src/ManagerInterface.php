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
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $permissionKey
     * @return mixed
     */
    public function canAccess($permissionKey);

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @return mixed
     */
    public function getRoles();

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @return mixed
     */
    public function getUserRole();

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $key
     * @return mixed
     */
    public function getRole($key);

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $roleId
     * @return mixed
     */
    public function getRoleById($roleId);

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @return mixed
     */
    public function getPermissions();

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $key
     * @return mixed
     */
    public function getPermission($key);

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $permissionId
     * @return mixed
     */
    public function getPermissionById($permissionId);

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $roleKey
     * @return mixed
     */
    public function setRoleByKey($roleKey);

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @param $roleId
     * @return mixed
     */
    public function setRoleById($roleId);

    /**
     * @author Adegoke Obasa <goke@cottacush.com>
     * @return mixed
     */
    public function getUserPermissions();
}