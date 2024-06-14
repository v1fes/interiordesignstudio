<?php

namespace models;

class Invoice
{
    protected static $tableName = 'Invoices';

    public static function addInvoice($projectID, $issueDate, $dueDate, $amount, $status)
    {
        \core\Core::getInstance()->db->insert(self::$tableName, [
            'ProjectID' => $projectID,
            'IssueDate' => $issueDate,
            'DueDate' => $dueDate,
            'Amount' => $amount,
            'Status' => $status
        ]);
    }

    public static function getInvoices()
    {
        $fields = [
            'Invoices.InvoiceID',
            'Invoices.ProjectID',
            'Projects.ProjectName',
            'Invoices.IssueDate',
            'Invoices.DueDate',
            'Invoices.Amount',
            'Invoices.Status'
        ];

        $joinArray = [
            [
                'table' => 'Projects',
                'on' => 'Invoices.ProjectID = Projects.ProjectID',
                'type' => 'INNER'
            ]
        ];

        return \core\Core::getInstance()->db->selectWithJoin(self::$tableName, $fields, $joinArray);
    }

    public static function getInvoiceById($invoiceID)
    {
        $invoice = \core\Core::getInstance()->db->select(self::$tableName, '*', [
            'InvoiceID' => $invoiceID
        ]);
        return !empty($invoice) ? $invoice[0] : null;
    }

    public static function getInvoicesByProjectId($projectID)
    {
        return \core\Core::getInstance()->db->select(self::$tableName, '*', [
            'ProjectID' => $projectID
        ]);
    }

    public static function updateInvoice($invoiceID, $updatesArray)
    {
        $updatesArray = \core\Utils::filterArray($updatesArray, ['IssueDate', 'DueDate', 'Amount', 'Status']);
        \core\Core::getInstance()->db->update(self::$tableName, $updatesArray, [
            'InvoiceID' => $invoiceID
        ]);
    }

    public static function deleteInvoice($invoiceID)
    {
        \core\Core::getInstance()->db->delete(self::$tableName, [
            'InvoiceID' => $invoiceID
        ]);
    }
}
