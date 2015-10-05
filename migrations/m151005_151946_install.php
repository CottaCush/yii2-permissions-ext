<?php

use yii\db\Schema;
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
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // Create permissions table
        $this->createTable('permissions', [
            'id' => $this->primaryKey(),
            'key' => $this->string(150)->notNull(),
            'label' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)
        ], $tableOptions);

        // Add Indexes for performance optimization
        $this->createIndex('permissions_unique_key', 'permissions', 'key', true);

        // Create Roles Table
        $this->createTable('roles', [
            'id' => $this->primaryKey(),
            'key' => $this->string(150)->notNull(),
            'label' => $this->string(255)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)
        ], $tableOptions);

        // Add Indexes for performance optimization
        $this->createIndex('roles_unique_key', 'roles', 'key', true);

        // Create role permissions mapping table
        $this->createTable('role_permissions', [
            'id' => $this->primaryKey(),
            'role_id' => $this->integer()->notNull(),
            'permission_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull()
        ], $tableOptions);

        // Add Indexes for performance optimization
        $this->createIndex('rp_role_id_composite', 'role_permissions', ['role_id', 'permission_id'], true);

        // Add Foreign Keys
        $this->addForeignKey('rp_roles_role_id', 'role_permissions', 'role_id', 'roles', 'id');
        $this->addForeignKey('rp_roles_permission_id', 'role_permissions', 'permission_id', 'permissions', 'id');
    }

    public function down()
    {
        $this->dropTable("role_permissions");
        $this->dropTable("permissions");
        $this->dropTable("roles");
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
