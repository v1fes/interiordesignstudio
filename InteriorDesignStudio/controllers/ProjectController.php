<?php

namespace controllers;

use core\Controller;
use models\Project;
use models\ProjectComment;
use models\User;
use models\Service;

class ProjectController extends Controller
{
    public function createAction()
    {
        if (!User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $creatorID = User::getCurrentAuthenticatedUser()['UserID'];
        $clients = User::getAllUsers();
        $services = Service::getAllServices();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $clientID = $_POST['clientID'];
            $serviceID = $_POST['serviceID'];
            $projectName = $_POST['projectName'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];
            $status = $_POST['status'];
            $budget = $_POST['budget'];
            $photoPath = $_FILES['photo'];

            Project::addProject($creatorID, $clientID, $serviceID, $projectName, $startDate, $endDate, $status, $budget, $photoPath);
            $this->redirect('/project/list');
        }

        return $this->render('views/project/create.php', ['clients' => $clients, 'services' => $services]);
    }

    public function listAction()
    {
        if (!User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $projects = Project::getProjects();
        return $this->render('views/project/list.php', ['projects' => $projects]);
    }

    public function editAction($params)
    {
        if (!User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $projectID = intval($params[0]);
        $project = Project::getProjectById($projectID);
        if (!$project) {
            return $this->error(404);
        }

        $clients = User::getAllUsers();
        $services = Service::getAllServices();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updates = [
                'ClientID' => $_POST['clientID'],
                'ServiceID' => $_POST['serviceID'],
                'ProjectName' => $_POST['projectName'],
                'StartDate' => $_POST['startDate'],
                'EndDate' => $_POST['endDate'],
                'Status' => $_POST['status'],
                'Budget' => $_POST['budget'],
                'PhotoPath' => $_FILES['photo']
            ];

            Project::updateProject($projectID, $updates);
            $this->redirect('/project/list');
        }

        return $this->render('views/project/edit.php', ['project' => $project, 'clients' => $clients, 'services' => $services]);
    }

    public function deleteAction($params)
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
            Project::deleteProject($projectID);
            $this->redirect('/project/list');
        }

        return $this->render('views/project/delete.php', ['project' => $project]);
    }

    public function viewAction($params)
    {
        if (!User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $projectID = intval($params[0]);
        $project = Project::getProjectById($projectID);
        $projectService = Service::getServiceById($project["ServiceID"]);
        $comments = ProjectComment::getCommentsByProjectId($projectID);
        if (!$project) {
            return $this->error(404);
        }

        return $this->render('views/project/view.php', ['project' => $project, 'projectService' => $projectService, 'comments'=> $comments]);
    }
}
