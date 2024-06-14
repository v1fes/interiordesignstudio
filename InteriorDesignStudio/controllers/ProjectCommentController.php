<?php

namespace controllers;

use core\Controller;
use models\Project;
use models\ProjectComment;
use models\User;

class ProjectCommentController extends Controller
{
    public function addAction($params)
    {
        if (!User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $projectID = intval($params[0]);
        $project = Project::getProjectById($projectID);

        if (!$project) {
            return $this->error(404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $author = User::getCurrentAuthenticatedUser()['Username'];
            $comment = $_POST['comment'];

            if (!empty($author) && !empty($comment)) {
                ProjectComment::addComment($projectID, $author, $comment);
                $this->redirect("/project/view/{$projectID}");
            } else {
                $error = "Author and comment fields cannot be empty.";
            }
        }

        return $this->render('views/comment/add.php', ['project' => $project, 'error' => $error ?? null]);
    }

    public function editAction($params)
    {
        if (!User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $commentID = intval($params[0]);
        $comment = ProjectComment::getCommentById($commentID);

        if (!$comment) {
            return $this->error(404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $author = User::getCurrentAuthenticatedUser()['Username'];
            $commentText = $_POST['comment'];

            if (!empty($author) && !empty($commentText)) {
                ProjectComment::updateComment($commentID, [
                    'Author' => $author,
                    'Comment' => $commentText
                ]);
                $this->redirect("/project/view/{$comment['ProjectID']}");
            } else {
                $error = "Author and comment fields cannot be empty.";
            }
        }

        return $this->render('views/comment/edit.php', ['comment' => $comment, 'error' => $error ?? null]);
    }

    public function deleteAction($params)
    {
        if (!User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $commentID = intval($params[0]);
        $comment = ProjectComment::getCommentById($commentID);

        if (!$comment) {
            return $this->error(404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            ProjectComment::deleteComment($commentID);
            $this->redirect("/project/view/{$comment['ProjectID']}");
        }

        return $this->render('views/comment/delete.php', ['comment' => $comment]);
    }

    public function viewAction($params)
    {
        if (!User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $projectID = intval($params[0]);
        $comments = ProjectComment::getCommentsByProjectId($projectID);

        return $this->render('views/comment/view.php', ['comments' => $comments]);
    }
}
