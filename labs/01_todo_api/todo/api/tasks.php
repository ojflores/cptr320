<?php

$full_url = $_SERVER['REQUEST_URI'];
$url = str_replace($project_url, "", $full_url);

if (strpos($url, "/") !== 0) {
    $url = "/$url";
}
$urlArr = explode("/", $url);

$dbInstance = new DB();
$dbConn = $dbInstance->connect($db);

header("Content-Type:application/json");

// GET /tasks GETS ALL TASKS WITH SPECIFIC LIST ID DOESNT WORK YET
if ($url == '/tasks' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    $tasks = getAllTasks($dbConn);
    echo json_encode($tasks);
}

// POST /tasks CREATES A TASK
if ($url == '/tasks' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $input = $_POST;
    $taskId = addTask($input, $dbConn);
    if ($taskId) {
        $input['id'] = $taskId;
        $input['link'] = "/tasks/$taskId";
    }
    echo json_encode($input);
}

//get a task with an id or with the name of the task
if(preg_match("/tasks\/([0-9]+)/", $url, $matches) && $_SERVER['REQUEST_METHOD'] == 'GET'){
    $taskId = $matches[1];
    $task = getTask($dbConn, $taskId);

    echo json_encode($task);
}

// DELETE /TASKS/{id}
if (preg_match("/tasks\/([0-9]+)/", $url, $matches) && $_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $taskId = $matches[1];
    deleteTask($dbConn, $taskId);

    echo json_encode([
        'id' => $taskId,
        'deleted' => 'true'
    ]);
}

// PUT /TASKS/{id} UPDATES A SPECIFIC TASK
if (preg_match("/tasks\/([0-9]+)/", $url, $matches) && $_SERVER['REQUEST_METHOD'] == 'PUT') {
    $input = $_GET;
    $taskId = $matches[1];
    updateTask($input, $dbConn, $taskId);
    $task = getTask($dbConn, $taskId);
    echo json_encode($task);
}

//updates the tasks
function updateTask($input, $db, $taskId)
{
    $fields = getParams($input);
    $sql = "UPDATE tasks SET $fields WHERE task_id='$taskId'";
    $statement = $db->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    return $taskId;
}

//delete a task from the db
function deleteTask($db, $id)
{
    $statement = $db->prepare("DELETE FROM tasks WHERE task_id=:id");
    $statement->bindValue(':id', $id);
    $statement->execute();
}

//get a single item from our tasks list
function getTask($db, $id){
    $statement = $db->prepare("SELECT * FROM tasks WHERE task_id=:id");
    $statement->bindValue(':id', $id);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

//function to get all the tasks in db
function getAllTasks($db){
    $statement = $db->prepare("SELECT * FROM tasks");
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    return $statement->fetchAll();
}

//function to POST to tasks in db
function addTask($input, $db){
    $sql = "INSERT INTO tasks 
            (task_id, list_id, task_text, task_assigned, task_arg1, task_arg2, task_state)
            VALUES 
            (:task_id, :list_id, :task_text, :task_assigned, :task_arg1, :task_arg2, :task_state)";

    $statement = $db->prepare($sql);
    bindAllValues($statement, $input);
    $statement->debugDumpParams();
    $statement->execute();
    return $db->lastInsertId();
}

//binds all the values; to be used in other functions to bind values in an sql statement
function bindAllValues($statement, $params){
    $allowedFields = ['task_id', 'list_id', 'task_text', 'task_assigned', 'task_arg1', 'task_arg2', 'task_state'];

    foreach ($params as $param => $value) {
        if (in_array($param, $allowedFields)) {
            $statement->bindValue(':' . $param, $value);
        }
    }
    return $statement;
}


/**
 * Get fields as parameters to set in record
 *
 * @param $input
 * @return string
 */
function getParams($input)
{
    $allowedFields = ['task_id', 'list_id', 'task_text', 'task_assigned', 'task_arg1', 'task_arg2', 'task_state'];

    $filterParams = [];
    foreach ($input as $param => $value) {
        if (in_array($param, $allowedFields)) {
            $filterParams[] = "$param=:$param";
        }
    }

    return implode(", ", $filterParams);
}
