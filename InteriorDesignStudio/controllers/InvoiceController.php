<?php

namespace controllers;

use core\Controller;
use models\Invoice;
use models\Project;

class InvoiceController extends Controller
{
    private $statuses = [
        'Unpaid' => 'Неоплачено',
        'Paid' => 'Оплачено',
        'Overdue' => 'Прострочено'
    ];

    public function createAction()
    {
        if (!\models\User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $projects = Project::getProjects();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $projectID = $_POST['projectID'];
            $issueDate = $_POST['issueDate'];
            $dueDate = $_POST['dueDate'];
            $amount = $_POST['amount'];
            $status = $_POST['status'];

            Invoice::addInvoice($projectID, $issueDate, $dueDate, $amount, $status);
            $this->redirect('/invoice/list');
        }

        return $this->render('views/invoice/create.php', ['projects' => $projects, 'statuses' => $this->statuses]);
    }

    public function listAction()
    {
        if (!\models\User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $invoices = Invoice::getInvoices();
        return $this->render('views/invoice/list.php', ['invoices' => $invoices]);
    }

    public function editAction($params)
    {
        if (!\models\User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $invoiceID = intval($params[0]);
        $invoice = Invoice::getInvoiceById($invoiceID);
        if (!$invoice) {
            return $this->error(404);
        }

        $projects = Project::getProjects();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updates = [
                'ProjectID' => $_POST['projectID'],
                'IssueDate' => $_POST['issueDate'],
                'DueDate' => $_POST['dueDate'],
                'Amount' => $_POST['amount'],
                'Status' => $_POST['status']
            ];

            Invoice::updateInvoice($invoiceID, $updates);
            $this->redirect('/invoice/list');
        }

        return $this->render('views/invoice/edit.php', ['invoice' => $invoice, 'projects' => $projects, 'statuses' => $this->statuses]);
    }

    public function deleteAction($params)
    {
        if (!\models\User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $invoiceID = intval($params[0]);
        $invoice = Invoice::getInvoiceById($invoiceID);
        if (!$invoice) {
            return $this->error(404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Invoice::deleteInvoice($invoiceID);
            $this->redirect('/invoice/list');
        }

        return $this->render('views/invoice/delete.php', ['invoice' => $invoice]);
    }

    public function viewAction($params)
    {
        if (!\models\User::isUserAuthenticated()) {
            $this->redirect('/user/login');
        }

        $invoiceID = intval($params[0]);
        $invoice = Invoice::getInvoiceById($invoiceID);
        if (!$invoice) {
            return $this->error(404);
        }

        return $this->render('views/invoice/view.php', ['invoice' => $invoice]);
    }
}
