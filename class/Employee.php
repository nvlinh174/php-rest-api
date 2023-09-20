<?php

class Employee
{
    private $table = 'employees';
    private $connection;

    private $id;
    private $name;
    private $email;
    private $address;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    // get all
    public function index()
    {
    }

    // insert
    public function store()
    {
    }

    // get one
    public function show()
    {
    }

    // update
    public function update()
    {
    }

    // delete
    public function destroy()
    {
    }
}

// JSON Response
function json($status, $message, $data = [])
{
    $data = [
        'status' => $status,
        'messmage' => $message,
        'data' => $data
    ];

    $jsonEncodedData = json_encode($data);

    return $jsonEncodedData;
}
