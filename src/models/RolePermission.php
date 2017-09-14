<?php

namespace cottacush\rbac\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "role_permissions".
 *
 * @author Adegoke Obasa <goke@cottacush.com>
 * @property integer $id
 * @property integer $role_id
 * @property integer $permission_id
 * @property string $created_at
 *
 * @property Permission $permission
 * @property Role $role
 */
class RolePermission extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role_permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'permission_id', 'created_at'], 'required'],
            [['role_id', 'permission_id'], 'integer'],
            [['created_at'], 'safe'],
            [
                ['role_id', 'permission_id'],
                'unique',
                'targetAttribute' => ['role_id', 'permission_id'],
                'message' => 'The combination of Role ID and Permission ID has already been taken.'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'permission_id' => 'Permission ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPermission()
    {
        return $this->hasOne(Permission::className(), ['id' => 'permission_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }
}