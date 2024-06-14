<?php

namespace controllers;

use core\Controller;
use models\Service;

class ServicesController extends Controller
{
    public function createAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $serviceName = $_POST['ServiceName'];
            $description = $_POST['Description'];
            $price = $_POST['Price'];

            Service::addService($serviceName, $description, $price);
            $this->redirect('/services/list');
        }
        return $this->render('views/services/create.php');
    }

    public function listAction()
    {
        $services = Service::getServices();
        return $this->render('views/services/list.php', ['services' => $services]);
    }

    public function editAction($params)
    {
        $id = intval($params[0]);
        $service = Service::getServiceById($id);
        if (!$service) {
            return $this->error(404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $serviceName = $_POST['ServiceName'];
            $description = $_POST['Description'];
            $price = $_POST['Price'];

            Service::updateService($id, $serviceName, $description, $price);
            $this->redirect('/services/list');
        }

        return $this->render('views/services/edit.php', ['service' => $service]);
    }

    public function deleteAction($params)
    {
        $id = intval($params[0]);
        $service = Service::getServiceById($id);
        if (!$service) {
            return $this->error(404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Service::deleteService($id);
            $this->redirect('/services/list');
        }

        return $this->render('views/services/delete.php', ['service' => $service]);
    }
}
