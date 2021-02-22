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
    public function canAccess($permissionKey): mixed;

    /**
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getRoles(): mixed;

    /**
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getUserRole(): mixed;

    /**
     * @param $key
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getRole($key): mixed;

    /**
     * @param $roleId
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getRoleById($roleId): mixed;

    /**
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermissions(): mixed;

    /**
     * @param $key
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermission($key): mixed;

    /**
     * @param $permissionId
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermissionById($permissionId): mixed;

    /**
     * @param $roleKey
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function setRoleByKey($roleKey): void;

    /**
     * @param $roleId
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function setRoleById($roleId): void;

    /**
     * @return mixed
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getUserPermissions(): mixed;
}