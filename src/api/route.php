<?php

use App\Database\DbConnect;

// Instantiate the database connection
$obj  = new DbConnect;
$conn = $obj->connect();

//Check for the methode : GET, POST, PUT OR DELETE
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "GET":
        getTasks($conn);
        break;
    default:
        // Method Not Supported
        header("HTTP/1.1 405 Method Not Allowed");
        break;
}

/**
 * Fetches all tasks from the database and outputs them as a JSON string.
 * @param PDO $conn The PDO connection object to the database.
 * @return (array | string) tasks | message
 */
function getTasks($conn)
{
    $sql = "SELECT * FROM tasks";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($tasks)) {
        $response = ['message' => 'No tasks found'];
        echo json_encode($response);
    } else {
        echo json_encode($tasks);
    }
}
