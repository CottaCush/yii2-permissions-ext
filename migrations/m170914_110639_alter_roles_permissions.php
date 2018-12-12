<?php

use cottacush\rbac\libs\Constants;
use cottacush\rbac\libs\Utils;
use yii\db\Migration;

/**
 * Class m170914_110639_alter_user_credentials
 * @author Olawale Lawal <wale@cottacush.com>
 */
class m170914_110639_alter_roles_permissions extends Migration
{
    public function up()
    {
        $isMSSQL = Utils::isMSSQL();
        $statusColumn = $this->string(100)->notNull();

        if (Utils::isMySQL()) {
            $statusColumn = $statusColumn->defaultValue(Constants::STATUS_ACTIVE);
        } elseif ($isMSSQL) {
            echo 'Drop defaults';
            Utils::dropDefaultValue(null, Constants::TABLE_PERMISSIONS, 'status');
            Utils::dropDefaultValue(null, Constants::TABLE_ROLES, 'status');
        }

        //PERMISSIONS
        $this->alterColumn(
            Constants::TABLE_PERMISSIONS,
            'status',
            $statusColumn
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
            $statusColumn
        );

        $this->createIndex(
            'k_' . Constants::TABLE_ROLES . '_status',
            Constants::TABLE_ROLES,
            'status'
        );

        if (Utils::isMSSQL()) {
            Utils::addDefaultValue(null, Constants::TABLE_PERMISSIONS, 'status', 'active');
            Utils::addDefaultValue(null, Constants::TABLE_ROLES, 'status', 'active');
        }
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
