<?php

require_once '../database/Database.php';
require_once '../class/Employee.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $objDb = new Database();
    $objEmployee = new Employee($objDb->getConnection());
    $formData = json_decode(file_get_contents('php://input'), true);

    if (!empty($formData)) {
        foreach ($formData as $key => $value) {
            $objEmployee->{$key} = $value;
        }

        if ($objEmployee->store()) {
            http_response_code(201);
            echo json(1, "Created!", $formData);
        } else {
            http_response_code(500);
            echo json(0, "Failed!");
        }
    } else {
        http_response_code((401));
        echo json(0, 'Input values required');
    }
} else {
    http_response_code(405);
    echo json(0, 'Method Not Allowed');
}
