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
        $sql = "SELECT * FROM {$this->table}";
        $statement = $this->connection->prepare($sql);

        $statement->execute();
        $result = $statement->get_result();

        return $result;
    }

    // insert
    public function store()
    {
        $sql = "INSERT INTO {$this->table} (name, email, address) VALUES (?, ?, ?)";
        if ($statement = $this->connection->prepare($sql)) {
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->address = htmlspecialchars(strip_tags($this->address));

            $statement->bind_param("sss", $this->name, $this->email, $this->address);

            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    // get one
    public function show()
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bind_param('i', $this->id);

        $statement->execute();
        $result = $statement->get_result();

        return $result;
    }

    // update
    public function update()
    {
        $sql = "UPDATE {$this->table} SET name = ?, email = ?, address = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->address = htmlspecialchars(strip_tags($this->address));

        $statement->bind_param('sssi', $this->name, $this->email, $this->email, $this->id);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
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
