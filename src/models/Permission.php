<?php

namespace cottacush\rbac\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "permissions".
 *
 * @author Adegoke Obasa <goke@cottacush.com>
 * @property integer $id
 * @property string $key
 * @property string $label
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 *
 * @property RolePermission[] $rolePermissions
 */
class Permission extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'label', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'string', 'max' => 100],
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
        return $this->hasMany(RolePermission::class, ['permission_id' => 'id']);
    }
}
