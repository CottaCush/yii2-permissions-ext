<?php

use cottacush\rbac\libs\Constants;
use yii\db\Migration;

/**
 * Class m170914_110639_alter_user_credentials
 * @author Olawale Lawal <wale@cottacush.com>
 */
class m170914_110639_alter_roles_permissions extends Migration
{
    public function up()
    {
        //PERMISSIONS
        $this->alterColumn(
            Constants::TABLE_PERMISSIONS,
            'status',
            $this->string(100)->notNull()->defaultValue(Constants::STATUS_ACTIVE)
        );

        $this->createIndex(
            'k_' . Constants::TABLE_PERMISSIONS . '_status',
            Constants::TABLE_PERMISSIONS,
            'status'
        );

        //ROLES
        $this->alterColumn(
            Constants::TABLE_ROLES,
            'status',
            $this->string(100)->notNull()->defaultValue(Constants::STATUS_ACTIVE)
        );

        $this->createIndex(
            'k_' . Constants::TABLE_ROLES . '_status',
            Constants::TABLE_ROLES,
            'status'
        );
    }

    public function down()
    {
        $this->dropIndex(
            'k_' . Constants::TABLE_ROLES . '_status',
            Constants::TABLE_ROLES
        );

        $this->alterColumn(
            Constants::TABLE_ROLES,
            'status',
            $this->boolean()->defaultValue(1)
        );

        $this->dropIndex(
            'k_' . Constants::TABLE_PERMISSIONS . '_status',
            Constants::TABLE_PERMISSIONS
        );

        $this->alterColumn(
            Constants::TABLE_PERMISSIONS,
            'status',
            $this->boolean()->defaultValue(1)
        );
    }
}
