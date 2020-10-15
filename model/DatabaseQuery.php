<?php

class DatabaseQuery
{
    public static $tableName;
    public static $className;

    public static function all()
    {
        global $db;

        $sql = 'SELECT * FROM ' . static::$tableName;

        return $db->query($sql)->fetchAll(PDO::FETCH_CLASS, static::$className);
    }

    public static function save($obj)
    {
        if (empty($obj->id)) {
            self::insert($obj);
        } else {
            echo 'update';

//            self::update($obj);
        }
    }

    public static function insert($obj)
    {
        global $db;
        //INSERT INTO table_name (column1, column2, column3, ...)
        //VALUES (value1, value2, value3, ...);

        $array = get_object_vars($obj);
        unset($array['id']);

        $arrayKeys = array_keys($array);
        $arrayValues = array_values($array);
        $arrayValuePlaceHolders = [];

        for ($i = 0; $i < count($arrayKeys); $i++) {
            $arrayValuePlaceHolders[] = '?';
        }

        $sql = 'INSERT INTO ' . static::$tableName;

        $sql.= ' (`' . join('`,`', $arrayKeys) .'`)';
        $sql.= ' VALUES ';
        $sql.= '(' . join(',', $arrayValuePlaceHolders) .')';

        try {
            $db->prepare($sql)->execute($arrayValues);
        } catch (PDOException $e) {
            print_r($e->getMessage());
            exit();
        }

        return true;
    }

    public static function update($obj)
    {
        global $db;
        //UPDATE table_name
        //SET column1 = value1, column2 = value2, ...
        //WHERE condition;

        $sql = 'UPDATE ' . static::$tableName . ' SET ';

        //make update logic
        $sql.= ' WHERE id = ?';

        $db->prepare($sql)->execute([$obj->id]);
    }

    public static function delete($obj)
    {
        global $db;

        if (empty($obj->id)) {
            return 'error_objc_id_missing';
        }

        //DELETE FROM table_name WHERE condition;
        $sql = 'DELETE FROM ' . static::$tableName . ' WHERE id=?';

        $stmt = $db->prepare($sql);
        $stmt->execute([$obj->id]);
        if ($stmt->rowCount() > 0) {
            return 'deleted';
        }

        return 'error_delete_failed';
    }
}
