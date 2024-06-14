<?php

namespace models;

class Service
{
    protected static $tableName = 'Services';

    public static function addService($serviceName, $description, $price)
    {
        \core\Core::getInstance()->db->insert(self::$tableName, [
            'ServiceName' => $serviceName,
            'Description' => $description,
            'Price' => $price
        ]);
    }

    public static function getServices()
    {
        return \core\Core::getInstance()->db->select(self::$tableName, '*');
    }

    public static function getServiceById($serviceID)
    {
        $service = \core\Core::getInstance()->db->select(self::$tableName, '*', [
            'ServiceID' => intval($serviceID)
        ]);
        return !empty($service) ? $service[0] : null;
    }

    public static function updateService($serviceID, $serviceName, $description, $price)
    {
        \core\Core::getInstance()->db->update(self::$tableName, [
            'ServiceName' => $serviceName,
            'Description' => $description,
            'Price' => $price
        ], [
            'ServiceID' => intval($serviceID)
        ]);
    }

    public static function deleteService($serviceID)
    {
        \core\Core::getInstance()->db->delete(self::$tableName, [
            'ServiceID' => intval($serviceID)
        ]);
    }

    public static function getAllServices() {
        return \core\Core::getInstance()->db->select(self::$tableName, '*');
    }
}
