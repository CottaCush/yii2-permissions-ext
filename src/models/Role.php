<?php

namespace cottacush\rbac\models;

use cottacush\rbac\libs\Constants;
use yii\db\ActiveRecord;

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
class Role extends ActiveRecord
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
        return $this->hasMany(RolePermission::class, ['role_id' => 'id']);
    }

    /**
     * Get Permissions assigned to role
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     * @author Adegoke Obasa <goke@cottacush.com>
     */
    public function getPermissions()
    {
        return $this->hasMany(Permission::class, ['id' => 'permission_id'])
            ->viaTable(RolePermission::tableName(), ['role_id' => 'id'])
            ->onCondition([Permission::tableName() . '.status' => Constants::STATUS_ACTIVE])
            ->asArray()
            ->all();
    }
}
