<?php

use cottacush\rbac\libs\Constants;
use yii\db\Migration;

/**
 * Class m151005_151946_install
 * @author Adegoke Obasa <goke@cottacush.com>
 */
class m151005_151946_install extends Migration
{
    public function up(): void
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // Create permissions table
        $this->createTable(Constants::TABLE_PERMISSIONS, [
            'id' => $this->primaryKey(),
            'key' => $this->string(150)->notNull(),
            'label' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)
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
            'status' => $this->smallInteger()->notNull()->defaultValue(1)
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
        $this->createIndex(
            'rp_role_id_composite',
            Constants::TABLE_ROLE_PERMISSIONS,
            ['role_id', 'permission_id'],
            true
        );

        // Add Foreign Keys
        $this->addForeignKey(
            'rp_roles_role_id',
            Constants::TABLE_ROLE_PERMISSIONS,
            'role_id',
            Constants::TABLE_ROLES,
            'id'
        );
        $this->addForeignKey(
            'rp_roles_permission_id',
            Constants::TABLE_ROLE_PERMISSIONS,
            'permission_id',
            Constants::TABLE_PERMISSIONS,
            'id'
        );
    }

    public function down(): void
    {
        $this->dropTable(Constants::TABLE_ROLE_PERMISSIONS);
        $this->dropTable(Constants::TABLE_PERMISSIONS);
        $this->dropTable(Constants::TABLE_ROLES);
    }
}
