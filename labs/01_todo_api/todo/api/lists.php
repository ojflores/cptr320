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



//REQUESTS ALL THE LISTS
if($url == '/lists' && $_SERVER['REQUEST_METHOD'] == 'GET'){
    $lists = getAllLists($dbConn);
    echo json_encode($lists);
}

//CREATES A NEW LIST
if($url == '/lists' && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $input = $_POST;
    $listId = addList($input, $dbConn);
    if($listId){
        $input['id'] = $listId;
        $input['link'] = "/lists/$listId";
    }
    echo json_encode($input);
}

// DELETE /lists/{id}
if (preg_match("/lists\/([0-9]+)/", $url, $matches) && $_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $listId = $matches[1];
    deleteList($dbConn, $listId);

    echo json_encode([
        'id' => $listId,
        'deleted' => 'true'
    ]);
}

//get a list with an id or with a name// search for an item in the list by using the list_name
if(preg_match("/lists\/([A-Za-z0-9\s\-_,\.;:()]+)/", $url, $matches) && $_SERVER['REQUEST_METHOD'] == 'GET'){
    $listId = $matches[1];
    $list = getList($dbConn, $listId);

    echo json_encode($list);
}

// PUT /lists/{id} UPDATES A SPECIFIC LIST
if (preg_match("/lists\/([0-9]+)/", $url, $matches) && $_SERVER['REQUEST_METHOD'] == 'PUT') {
    $input = $_GET;
    $listId = $matches[1];
    updateList($input, $dbConn, $listId);
    $list = getList($dbConn, $listId);
    echo json_encode($list);
}


//gets all the items in lists
function getAllLists($db){
    $statement = $db->prepare("SELECT * FROM lists");
    $statement->execute();
    $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
    return $statement->fetchAll();
}

//get a single item from our lists
function getList($db, $id){
    $statement = $db->prepare("SELECT * FROM lists WHERE list_id=:id OR list_name=:id");
    $statement->bindValue(':id', $id);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

//adds things to lists
function addList($input, $db){
    $sql = "INSERT INTO lists
            (list_id, list_name, list_desc, list_due, list_owner, list_arg1, list_arg2, list_state)
            VALUES 
            (:list_id, :list_name, :list_desc, :list_due, :list_owner, :list_arg1, :list_arg2, :list_state)";
    $statement = $db->prepare($sql);
    bindAllValues($statement, $input);
    $statement->debugDumpParams();
    $statement->execute();
    return $db->lastInsertId();
}

//binds all the values;makes life easier
function bindAllValues($statement, $params){
    $allowedFields = ['list_id', 'list_name', 'list_desc', 'list_due', 'list_owner', 'list_arg1', 'list_arg2', 'list_state'];
    foreach($params as $param => $value){
        if(in_array($param, $allowedFields)){
            $statement->bindValue(':'.$param, $value);
        }
    }
    return $statement;
}

//updates the lists
function updateList($input, $db, $listId)
{
    $fields = getParams($input);
    $sql = "UPDATE lists SET $fields WHERE list_id='$listId'";
    $statement = $db->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    return $listId;
}

/**
 * Get fields as parameters to set in record
 *
 * @param $input
 * @return string
 */
function getParams($input)
{
    $allowedFields = ['list_id', 'list_name', 'list_desc', 'list_due', 'list_owner', 'list_arg1', 'list_arg2', 'list_state'];

    $filterParams = [];
    foreach ($input as $param => $value) {
        if (in_array($param, $allowedFields)) {
            $filterParams[] = "$param=:$param";
        }
    }

    return implode(", ", $filterParams);
}

//delete a list from the db
function deleteList($db, $id)
{
    $statement = $db->prepare("DELETE FROM lists WHERE list_id=:id");
    $statement->bindValue(':id', $id);
    $statement->execute();
}