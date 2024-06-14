<?php

namespace models;

class ProjectComment
{
    protected static $tableName = 'ProjectComments';

    public static function addComment($projectID, $author, $comment)
    {
        \core\Core::getInstance()->db->insert(self::$tableName, [
            'ProjectID' => $projectID,
            'Author' => $author,
            'Comment' => $comment,
            'DateCreated' => date('Y-m-d H:i:s')
        ]);
    }

    public static function getCommentsByProjectId($projectID)
    {
        return \core\Core::getInstance()->db->select(self::$tableName, '*', [
            'ProjectID' => $projectID
        ]);
    }

    public static function getCommentById($commentID)
    {
        $comment = \core\Core::getInstance()->db->select(self::$tableName, '*', [
            'CommentID' => $commentID
        ]);
        return !empty($comment) ? $comment[0] : null;
    }

    public static function updateComment($commentID, $updatesArray)
    {
        $updatesArray = \core\Utils::filterArray($updatesArray, ['Author', 'Comment']);
        \core\Core::getInstance()->db->update(self::$tableName, $updatesArray, [
            'CommentID' => $commentID
        ]);
    }

    public static function deleteComment($commentID)
    {
        \core\Core::getInstance()->db->delete(self::$tableName, [
            'CommentID' => $commentID
        ]);
    }
}
