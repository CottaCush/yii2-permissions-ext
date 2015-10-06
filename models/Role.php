<?php

namespace cottacush\rbac\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @author Adegoke Obasa <goke@cottacush.com>
 * @property integer $id
 * @property string $key
 * @property string $label
 * @property string $created_at
 * @property string $updated_at
 * @property integer $status
 *
 * @property RolePermission[] $rolePermissions
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'label', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['key'], 'string', 'max' => 150],
            [['label'], 'string', 'max' => 255],
            [['key'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'label' => 'Label',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolePermissions()
    {
        return $this->hasMany(RolePermission::className(), ['role_id' => 'id']);
    }

    /**
     * Get Permissions assigned to role
     * @author Adegoke Obasa <goke@cottacush.com>
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->hasMany(Permission::className(), ['id' => 'permission_id'])
            ->viaTable("role_permissions", ['role_id' => 'id'])
            ->onCondition(['status' => 1])
            ->asArray()
            ->all();
    }
}