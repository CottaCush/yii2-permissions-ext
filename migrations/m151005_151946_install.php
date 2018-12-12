<?php

use cottacush\rbac\libs\Constants;
use cottacush\rbac\libs\Utils;
use yii\db\Migration;

/**
 * Class m151005_151946_install
 * @author Adegoke Obasa <goke@cottacush.com>
 */
class m151005_151946_install extends Migration
{

    public function up()
    {
        $tableOptions = null;
        $statusColumn = $this->smallInteger()->notNull();

        if (Utils::isMySQL()) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
            $statusColumn = $this->smallInteger()->notNull()->defaultValue(1);
        }

        // Create permissions table
        $this->createTable(Constants::TABLE_PERMISSIONS, [
            'id' => $this->primaryKey(),
            'key' => $this->string(150)->notNull(),
            'label' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'status' => $statusColumn
        ], $tableOptions);

        // Add Indexes for performance optimization
        $this->createIndex('permissions_unique_key', Constants::TABLE_PERMISSIONS, 'key', true);

        // Create Roles Table
        $this->createTable(Constants::TABLE_ROLES, [
            'id' => $this->primaryKey(),
            'key' => $this->string(150)->notNull(),
            'label' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'status' => $statusColumn
        ], $tableOptions);

        // Add Indexes for performance optimization
        $this->createIndex('roles_unique_key', Constants::TABLE_ROLES, 'key', true);

        // Create role permissions mapping table
        $this->createTable(Constants::TABLE_ROLE_PERMISSIONS, [
            'id' => $this->primaryKey(),
            'role_id' => $this->integer()->notNull(),
            'permission_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull()
        ], $tableOptions);

        // Add Indexes for performance optimization
        $this->createIndex('rp_role_id_composite', Constants::TABLE_ROLE_PERMISSIONS, ['role_id', 'permission_id'], true);

        // Add Foreign Keys
        $this->addForeignKey('rp_roles_role_id', Constants::TABLE_ROLE_PERMISSIONS, 'role_id', Constants::TABLE_ROLES, 'id');
        $this->addForeignKey('rp_roles_permission_id', Constants::TABLE_ROLE_PERMISSIONS, 'permission_id', Constants::TABLE_PERMISSIONS, 'id');

        if (Utils::isMSSQL()) {
            Utils::addDefaultValue(null, Constants::TABLE_PERMISSIONS, 'status', 1);
            Utils::addDefaultValue(null, Constants::TABLE_ROLES, 'status', 1);
        }
    }

    public function down()
    {
        $this->dropTable(Constants::TABLE_ROLE_PERMISSIONS);
        $this->dropTable(Constants::TABLE_PERMISSIONS);
        $this->dropTable(Constants::TABLE_ROLES);
    }
}
