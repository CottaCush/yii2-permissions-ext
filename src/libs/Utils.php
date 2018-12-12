<?php

namespace cottacush\rbac\libs;

use Yii;


/**
 * Class Utils
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 * @package cottacush\userauth\libs
 */
class Utils
{
    public static function getDb()
    {
        return Yii::$app->db;
    }

    public static function isMySQL()
    {
        return self::getDb()->driverName === 'mysql';
    }

    public static function isMSSQL()
    {
        return in_array(self::getDb()->driverName, ['mssql', 'sqlsrv', 'dblib']);
    }

    public static function addDefaultValue($name, $table, $column, $value = null)
    {
        if (is_null($name)) {
            $name = self::getDefaultName($table, $column);
        }

        self::getDb()->createCommand()->addDefaultValue($name, $table, $column, $value)->execute();
    }

    public static function dropDefaultValue($name, $table, $column)
    {
        if (is_null($name)) {
            $name = self::getDefaultName($table, $column);
        }

        self::getDb()->createCommand()->dropDefaultValue($name, $table)->execute();
    }

    public static function getDefaultName($table, $column)
    {
        return $name = 'DF_' . $table . '_' . $column;
    }
}