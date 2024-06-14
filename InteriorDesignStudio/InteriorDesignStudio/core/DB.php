<?php

namespace core;

/**
 * Клас для виконання запитів до БД
 */
class DB
{
    protected $pdo;
    public function __construct($hostname, $login, $password, $database) {
        $this->pdo = new \PDO("mysql: host={$hostname};dbname={$database}",
            $login, $password);
    }

    /**
     * Виконання запиту на отримання даних з вказаної таблиці БД
     * @param string $tableName Назва таблиці бази даних
     * @param string|array $fieldsList Список полів
     * @param array|null $conditionArray Асоціативний масив з умовою для пошуку
     * @return array|false
     */
    public function select(string $tableName, $fieldsList = "*", $conditionArray = null) {
        if (is_string($fieldsList))
            $fieldsListString = $fieldsList;
        if (is_array($fieldsList))
            $fieldsListString = implode(', ', $fieldsList);
        $wherePartString = ""; // Инициализация переменной
        if (is_array($conditionArray)) {
            $parts = [];
            foreach ($conditionArray as $key => $value) {
                $parts [] = "{$key} = :{$key}";
            }
            $wherePartString = "WHERE ".implode(' AND ', $parts);
        }
        $res = $this->pdo->prepare(
            "SELECT {$fieldsListString} FROM {$tableName} {$wherePartString}");
        $res->execute($conditionArray);
        return $res->fetchAll(\PDO::FETCH_ASSOC);
    }

        /**
     * Виконання запиту на отримання даних з використанням JOIN
     * @param string $tableName Назва основної таблиці
     * @param string|array $fieldsList Список полів
     * @param array $joinArray Масив з параметрами для JOIN
     * @param array|null $conditionArray Асоціативний масив з умовою для пошуку
     * @return array|false
     */
    public function selectWithJoin(string $tableName, $fieldsList = "*", $joinArray = [], $conditionArray = null) {
        if (is_string($fieldsList))
            $fieldsListString = $fieldsList;
        if (is_array($fieldsList))
            $fieldsListString = implode(', ', $fieldsList);

        $joinPartString = "";
        if (!empty($joinArray)) {
            foreach ($joinArray as $join) {
                $joinType = isset($join['type']) ? $join['type'] : 'INNER';
                $joinPartString .= " {$joinType} JOIN {$join['table']} ON {$join['on']} ";
            }
        }

        $wherePartString = "";
        if (is_array($conditionArray)) {
            $parts = [];
            foreach ($conditionArray as $key => $value) {
                $parts [] = "{$key} = :{$key}";
            }
            $wherePartString = "WHERE ".implode(' AND ', $parts);
        }

        $res = $this->pdo->prepare(
            "SELECT {$fieldsListString} FROM {$tableName} {$joinPartString} {$wherePartString}");
        $res->execute($conditionArray);
        return $res->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function update($tableName, $newValuesArray, $conditionArray) {
        $setParts = [];
        $paramsArray = [];
        foreach ($newValuesArray as $key => $value) {
            $setParts [] = "{$key} = :set{$key}";
            $paramsArray['set'.$key] = $value;
        }
        $setPartString = implode(', ', $setParts);

        $whereParts = [];
        foreach ($conditionArray as $key => $value) {
            $whereParts [] = "{$key} = :{$key}";
            $paramsArray[$key] = $value;
        }
        $wherePartString = "WHERE ".implode(' AND ', $whereParts);
        $res = $this->pdo->prepare("UPDATE {$tableName} SET {$setPartString} {$wherePartString}");
        $res->execute($paramsArray);
    }
    public function insert($tableName, $newRowArray) {
        $fieldsArray = array_keys($newRowArray);
        $fieldsListString = implode(', ', $fieldsArray);
        $paramsArray = [];
        foreach ($newRowArray as $key => $value) {
            $paramsArray [] = ':'.$key;
        }
        $valuesListString = implode(', ', $paramsArray);
        $res = $this->pdo->prepare("INSERT INTO {$tableName} ($fieldsListString) VALUES($valuesListString)");
        $res->execute($newRowArray);
    }
    public function delete($tableName, $conditionArray) {
        $whereParts = [];
        $paramsArray = [];
        foreach ($conditionArray as $key => $value) {
            $whereParts[] = "{$key} = :{$key}";
            $paramsArray[$key] = $value;
        }
        $wherePartString = "WHERE " . implode(' AND ', $whereParts);
        $res = $this->pdo->prepare("DELETE FROM {$tableName} {$wherePartString}");
        $res->execute($paramsArray);
    }
    
}

