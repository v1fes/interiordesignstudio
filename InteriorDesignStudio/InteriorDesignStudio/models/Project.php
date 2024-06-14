<?php

namespace models;

use core\Utils;

class Project
{
    protected static $tableName = 'Projects';

    public static function addProject($creatorID, $clientID, $serviceID, $projectName, $startDate, $endDate, $status, $budget, $photoPath)
    {
        if ($photoPath && is_uploaded_file($photoPath['tmp_name'])) {
            do {
                $fileName = uniqid() . '.jpg';
                $newPath = "files/projects/{$fileName}";
            } while (file_exists($newPath));
            move_uploaded_file($photoPath['tmp_name'], $newPath);
        } else {
            $fileName = null;
        }

        \core\Core::getInstance()->db->insert(self::$tableName, [
            'CreatorID' => $creatorID,
            'ClientID' => $clientID,
            'ServiceID' => $serviceID,
            'ProjectName' => $projectName,
            'StartDate' => $startDate,
            'EndDate' => $endDate,
            'Status' => $status,
            'Budget' => $budget,
            'PhotoPath' => $fileName
        ]);
    }

    public static function getProjects()
    {
        $fields = [
            'Projects.ProjectID',
            'Projects.ProjectName',
            'Projects.StartDate',
            'Projects.EndDate',
            'Projects.Status',
            'Projects.Budget',
            'Projects.PhotoPath',
            'UsersCreator.Username AS CreatorUsername',
            'UsersClient.Username AS ClientUsername',
            'Services.ServiceName'
        ];

        $joinArray = [
            [
                'table' => 'Users AS UsersCreator',
                'on' => 'Projects.CreatorID = UsersCreator.UserID',
                'type' => 'LEFT'
            ],
            [
                'table' => 'Users AS UsersClient',
                'on' => 'Projects.ClientID = UsersClient.UserID',
                'type' => 'LEFT'
            ],
            [
                'table' => 'Services',
                'on' => 'Projects.ServiceID = Services.ServiceID',
                'type' => 'LEFT'
            ]
        ];

        return \core\Core::getInstance()->db->selectWithJoin(self::$tableName, $fields, $joinArray);
    }

    public static function getProjectById($projectID)
    {
        $fields = [
            'Projects.ProjectID',
            'Projects.ProjectName',
            'Projects.StartDate',
            'Projects.EndDate',
            'Projects.Status',
            'Projects.Budget',
            'Projects.PhotoPath',
            'UsersCreator.Username AS CreatorUsername',
            'UsersClient.Username AS ClientUsername',
            'Services.ServiceName'
        ];

        $joinArray = [
            [
                'table' => 'Users AS UsersCreator',
                'on' => 'Projects.CreatorID = UsersCreator.UserID',
                'type' => 'LEFT'
            ],
            [
                'table' => 'Users AS UsersClient',
                'on' => 'Projects.ClientID = UsersClient.UserID',
                'type' => 'LEFT'
            ],
            [
                'table' => 'Services',
                'on' => 'Projects.ServiceID = Services.ServiceID',
                'type' => 'LEFT'
            ]
        ];

        $conditionArray = [
            'ProjectID' => $projectID
        ];

        $project = \core\Core::getInstance()->db->selectWithJoin(self::$tableName, $fields, $joinArray, $conditionArray);
        return !empty($project) ? $project[0] : null;
    }

    public static function updateProject($projectID, $updatesArray)
    {
        $updatesArray = Utils::filterArray($updatesArray, ['CreatorID', 'ClientID', 'ServiceID', 'ProjectName', 'StartDate', 'EndDate', 'Status', 'Budget', 'PhotoPath']);
        \core\Core::getInstance()->db->update(self::$tableName, $updatesArray, [
            'ProjectID' => $projectID
        ]);
    }

    public static function deleteProject($projectID)
    {
        \core\Core::getInstance()->db->delete(self::$tableName, [
            'ProjectID' => $projectID
        ]);
    }

    public static function getProjectComments($projectID)
    {
        $fieldsList = [
            'Comments.CommentID',
            'Comments.ProjectID',
            'Comments.CommentText',
            'Comments.CreatedAt',
            'Comments.UserID',
            'Users.UserName'
        ];
        $joinArray = [
            [
                'type' => 'INNER',
                'table' => 'Users',
                'on' => 'Comments.UserID = Users.UserID'
            ]
        ];
        $conditionArray = ['ProjectID' => $projectID];
        return \core\Core::getInstance()->db->selectWithJoin('Comments', $fieldsList, $joinArray, $conditionArray);
    }
}
