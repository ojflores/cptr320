/*************************************************************************
 *
 * Lab 3
 *
 * File Name: todo.js
 * Course:    CPTR 320
 * Date:      2/2/19
 */

 window.onload = function() {
    document.getElementById("create-task").onclick = createTaskInfo;
    document.getElementById("read-task").onclick = getTask;
    document.getElementById("update-task").onclick = updateTaskPrompt;
    document.getElementById("delete-task").onclick = deleteTaskPrompt;
    document.getElementById("list-tasks").onclick = tasksByList;
    document.getElementById("create-list").onclick = createList;
    document.getElementById("read-list").onclick = readListPrompt;
    document.getElementById("update-list").onclick = updateListPrompt;
    document.getElementById("delete-list").onclick = deleteListPrompt;
    document.getElementById("all-lists").onclick = getAllLists;
 }

 /**************************
  * Next few functions are functions prompting information from user
  */

 //function to prompt user over what to update in the list
 function updateListPrompt(){
   var show = document.getElementById("show-template");
   show.innerHTML = "Fill in the following text boxes and press SUBMIT to update a task</br>";
   show.innerHTML += '<input type="text" id="list-id">Enter Id to update</br>' +
                        '<input type="text" id="list-name-update">Update List Name</br>' +
                        '<input type="text" id="list-desc-update">Update List Description</br>' +
                        '<input type="text" id="list-owner-update">Update List Owner</br>' +
                        '<input type="text" id="list-state-update">Update List State</br>' +
                        '<button id="update_list">Update List</button></br>';
   document.getElementById("update_list").onclick = updateList;
 }

 //function to send the update request for list
 function updateList(){
   var id = document.getElementById("list-id").value;
   var data = {};
   data.list_name = document.getElementById("list-name-update").value;
   data.list_desc = document.getElementById("list-desc-update").value;
   data.list_owner = document.getElementById("list-owner-update").value;
   data.list_state = document.getElementById("list-state-update").value;
   var json = JSON.stringify(data);

   var xhttp = new XMLHttpRequest();
    xhttp.open("PUT", "http://cptr320.cs.wallawalla.edu:8000/api/v1/lists/" + id, true);
    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhttp.onload = function(){
        var response = JSON.parse(xhttp.responseText);
        if(xhttp.status == '200'){
           document.getElementById("show-template").innerHTML = "Successful";
        }
        else{
         document.getElementById("show-template").innerHTML = "error, see console for more info";
         console.log(response);
        }
    }
    xhttp.send(json);
 }


 //function to prompt user over what to update in the task
 function updateTaskPrompt(){
   var show = document.getElementById("show-template");
   show.innerHTML = "Fill in the following text boxes and press SUBMIT to update a task</br>";
   show.innerHTML += '<input type="text" id="task-id">Enter Id to update</br>' +
                        '<input type="text" id="list-id-update">Update List Id</br>' +
                        '<input type="text" id="task-text-update">Update Task Text</br>' +
                        '<input type="text" id="task-state-update">Update Task State</br>' +
                        '<button id="update_task">Update Task</button></br>';
   document.getElementById("update_task").onclick = updateTask;
 }

 //function to read a specific list
 function readListPrompt(){
   var show = document.getElementById("show-template");
   show.innerHTML = '<input type="text" id="specific-list"><button id="get-list">Get List</button></br>';
   show.innerHTML += 'Enter the id of the list you wish to retrieve';
   var button = document.getElementById("get-list");
   button.onclick = readList;
}

 //function to prompt the user for list to delete
 function deleteListPrompt(){
   var show = document.getElementById("show-template");
   show.innerHTML = "Please enter the ID of the list you would like to delete: </br>";
   show.innerHTML += '<input type="text" id="delete_list"><button id="list-delete">DELETE</button></br>'
   document.getElementById("list-delete").onclick = deleteList;
 }

 //function that prompts user for data needed to create a new task
 function createTaskInfo(){
    var show = document.getElementById("show-template");
    show.innerHTML = "Fill in the following text boxes and press SUBMIT to add a task</br>";
    show.innerHTML += '<input type="text" id="task_id">Add Task Id</br>' +
                        '<input type="text" id="list_id">Add List Id</br>' +
                        '<input type="text" id="task_text">Add Task Text</br>' +
                        '<input type="text" id="task_state">Add Task State</br>' +
                        '<button id="add-task">Add Task</button></br>';
    var postTask = document.getElementById("add-task");
    postTask.onclick = createTask;
 }

 //function to prompt user for info to create list
 function createList(){
   var show = document.getElementById("show-template");
   show.innerHTML = "Fill in the following text boxes and press SUBMIT to add a list</br>";
   show.innerHTML += '<input type="text" id="list_id">Add List Id</br>' +
                       '<input type="text" id="list_name">Add List Name</br>' +
                       '<input type="text" id="list_desc">Add List Description</br>' +
                       '<input type="text" id="list_due">Add Due Date: ex. 2019-02-24 12:00:00</br>' +
                       '<input type="text" id="list_owner">Add List Owner</br>' +
                       '<input type="text" id="list_state">Add List State</br>' +
                       '<button id="add-task">Add Task</button></br>';
   var postTask = document.getElementById("add-task");
   postTask.onclick = sendCreateList;
 }

 //function to prompt user for task to delete
 function deleteTaskPrompt(){
   var show = document.getElementById("show-template");
   show.innerHTML = "Which task would you like to delete? Enter by task ID</br>";
   show.innerHTML += '<input type="text" id="task_delete">Task to delete</br>' +
                     '<button id="delete">Delete</button></br>' + 
                     'Note: must be an existing id for it to go through</br>';
   var task = document.getElementById("delete");
   task.onclick = deleteTask;
}

 //function to show input box to get task from user
 function getTask(){
   var current_item = document.getElementById("show-template");
   current_item.innerHTML = '<input type="text" id="specific-task"><button id="get-task">Get Task</button></br>';
   current_item.innerHTML += 'Enter the id of the task you wish to retrieve';
   var button = document.getElementById("get-task");
   button.onclick = readTask;
}

//function to prompt user asking which list id they want all the tasks from
 function tasksByList(){
   var current_item = document.getElementById("show-template");
   current_item.innerHTML = '<input type="text" id="tasks-by-list"><button id="get-list">Get List</button></br>';
   current_item.innerHTML += 'Enter the id of the list you wish to retrieve';
   var button = document.getElementById("get-list");
   button.onclick = showtasks;
}



/*************************
 * these functions are the ones sending the requests
 */

 //function to show all the tasks associated with lists

 //function to delete a task
 function deleteTask(){
   var task = document.getElementById("task_delete").value;
   var xhttp = new XMLHttpRequest();
   xhttp.open("DELETE", "http://cptr320.cs.wallawalla.edu:8000/api/v1/tasks/" + task, false);
   xhttp.send();
   document.getElementById("show-template").innerHTML = "Your request has been sent";
 }

 //function that actually posts the task
 function createTask(){
    var data = {};
    data.task_id = document.getElementById("task_id").value;
    data.list_id = document.getElementById("list_id").value;
    data.task_text = document.getElementById("task_text").value;
    data.task_state = document.getElementById("task_state").value;
    var json = JSON.stringify(data);

    //submit the post request
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "http://cptr320.cs.wallawalla.edu:8000/api/v1/tasks", true);
    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhttp.onload = function(){
        var response = JSON.parse(xhttp.responseText);
        if(xhttp.status == '200'){
           document.getElementById("show-template").innerHTML = "Successful";
        }
        else{
         document.getElementById("show-template").innerHTML = response;
        }
    }
    xhttp.send(json);
 }

 //function to actually retrieve the task the user wants
 function readTask(){
    var task = document.getElementById("specific-task").value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://cptr320.cs.wallawalla.edu:8000/api/v1/tasks/" + task, false);
    xhttp.send();
    var response = JSON.parse(xhttp.responseText);
    var show = document.getElementById("show-template");
    show.innerHTML = "task: </br>" +
                        "<p>task_id: " + response.task.task_id + "</p></br>" +
                        "<p>list_id: " + response.task.list_id + "</p></br>" +
                        "<p>task_text: " + response.task.task_text + "</p></br>" +
                        "<p>task_assigned: " + response.task.task_assigned + "</p></br>" +
                        "<p>task_arg1: " + response.task.task_arg1 + "</p></br>" +
                        "<p>task_arg2: " + response.task.task_arg2 + "</p></br>" +
                        "<p>task_state: " + response.task.task_state + "</p></br>" +
                        "<p>created_at: " + response.task.created_at + "</p></br>" +
                        "<p>updated_at: " + response.task.updated_at + "</p></br>";
}

 //function to show all the tasks
 //useless because its not the thing that was asked for, use this to output all the lists
 function showtasks(){
    var show = document.getElementById("show-template");
    var task = document.getElementById("tasks-by-list").value;
    show.innerHTML = "";
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://cptr320.cs.wallawalla.edu:8000/api/v1/lists/" + task + "/tasks", false);
    xhttp.send();
    tasks = JSON.parse(xhttp.responseText);
    show.innerHTML += "<table id='table'>" +
                        '<tr>' +
                            '<th>Task Id</th>' +
                            '<th>List Id</th>' +
                            '<th>Task Text</th>' +
                            '<th>Task Assigned</th>' +
                            '<th>Arg 1</th>' +
                            '<th>Arg 2</th>' +
                            '<th>Task State</th>' +
                            '<th>Created At</th>' +
                            '<th>Updated At</th>' +
                        '</tr>';
    for(var i = 0; i < tasks.data.length; i++){
        var table = document.getElementById("table");
        var row = table.insertRow(i+1);
        var cell0 = row.insertCell(0);
        var cell1 = row.insertCell(1);
        var cell2 = row.insertCell(2);
        var cell3 = row.insertCell(3);
        var cell4 = row.insertCell(4);
        var cell5 = row.insertCell(5);
        var cell6 = row.insertCell(6);
        var cell7 = row.insertCell(7);
        var cell8 = row.insertCell(8);
        cell0.innerHTML = tasks.data[i].task_id;
        cell1.innerHTML = tasks.data[i].list_id;
        cell2.innerHTML = tasks.data[i].task_text;
        cell3.innerHTML = tasks.data[i].task_assigned;
        cell4.innerHTML = tasks.data[i].task_arg1;
        cell5.innerHTML = tasks.data[i].task_arg2;
        cell6.innerHTML = tasks.data[i].task_state;
        cell7.innerHTML = tasks.data[i].created_at;
        cell8.innerHTML = tasks.data[i].updated_at;
    }
    show.innerHTML += "</table>";
 }

//function to get all the lists available
function getAllLists(){
   var show = document.getElementById("show-template");
   show.innerHTML = "";
   var xhttp = new XMLHttpRequest();
   xhttp.open("GET", "http://cptr320.cs.wallawalla.edu:8000/api/v1/lists/", false);
   xhttp.send();
   lists = JSON.parse(xhttp.responseText);
   show.innerHTML += "<table id='table2'>" +
                        '<tr>' +
                            '<th>List Id</th>' +
                            '<th>List Name</th>' +
                            '<th>List Description</th>' +
                            '<th>List Due</th>' +
                            '<th>List Owner</th>' +
                            '<th>List Arg1</th>' +
                            '<th>List Arg2</th>' +
                            '<th>List State</th>' +
                            '<th>Created At</th>' +
                            '<th>Updated At</th>' +
                        '</tr>';
   for(var i = 0; i < lists.data.length; i++){
      var table = document.getElementById("table2");
      var row = table.insertRow(i+1);
      var cell0 = row.insertCell(0);
      var cell1 = row.insertCell(1);
      var cell2 = row.insertCell(2);
      var cell3 = row.insertCell(3);
      var cell4 = row.insertCell(4);
      var cell5 = row.insertCell(5);
      var cell6 = row.insertCell(6);
      var cell7 = row.insertCell(7);
      var cell8 = row.insertCell(8);
      var cell9 = row.insertCell(9);
      cell0.innerHTML = lists.data[i].list_id;
      cell1.innerHTML = lists.data[i].list_name;
      cell2.innerHTML = lists.data[i].list_desc;
      cell3.innerHTML = lists.data[i].list_due;
      cell4.innerHTML = lists.data[i].list_owner;
      cell5.innerHTML = lists.data[i].list_arg1;
      cell6.innerHTML = lists.data[i].list_arg2;
      cell7.innerHTML = lists.data[i].list_state;
      cell8.innerHTML = lists.data[i].created_at;
      cell9.innerHTML = lists.data[i].updated_at;
   }
   show.innerHTML += "</table>";
}

//function to send the post request for creating a list
function sendCreateList(){
   var data = {};
   data.list_id = document.getElementById("list_id").value;
   data.list_name = document.getElementById("list_name").value;
   data.list_desc = document.getElementById("list_desc").value;
   data.list_due = document.getElementById("list_due").value;
   data.list_owner = document.getElementById("list_owner").value;
   data.list_state = document.getElementById("list_state").value;
   var json = JSON.stringify(data);

   //submit the post request
   var xhttp = new XMLHttpRequest();
   xhttp.open("POST", "http://cptr320.cs.wallawalla.edu:8000/api/v1/lists", true);
   xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
   xhttp.onload = function(){
       var response = JSON.parse(xhttp.responseText);
       if(xhttp.status == '200'){
         document.getElementById("show-template").innerHTML = "Request Sent Successfully";
      }
      else{
       document.getElementById("show-template").innerHTML = "Something went wrong, please check console for more information.";
       console.log(response);
      }
   }
   xhttp.send(json);
 }

 //function to send the request to delete a list
 function deleteList(){
   var list = document.getElementById("delete_list").value;
   var xhttp = new XMLHttpRequest();
   xhttp.open("DELETE", "http://cptr320.cs.wallawalla.edu:8000/api/v1/lists/" + list, false);
   xhttp.send();
   document.getElementById("show-template").innerHTML = "Your request has been sent";
 }

 //function to send the request for a specific list
 function readList(){
   var list = document.getElementById("specific-list").value;
   var xhttp = new XMLHttpRequest();
   xhttp.open("GET", "http://cptr320.cs.wallawalla.edu:8000/api/v1/lists/" + list, false);
   xhttp.send();
   var response = JSON.parse(xhttp.responseText);
   var show = document.getElementById("show-template");
   show.innerHTML = "task: </br>" +
                       "<p>task_id: " + response.list.list_id + "</p></br>" +
                       "<p>list_id: " + response.list.list_name + "</p></br>" +
                       "<p>task_text: " + response.list.list_desc + "</p></br>" +
                       "<p>task_assigned: " + response.list.list_due + "</p></br>" +
                       "<p>task_arg1: " + response.list.list_owner + "</p></br>" +
                       "<p>task_arg2: " + response.list.list_arg1 + "</p></br>" +
                       "<p>task_state: " + response.list.list_arg2 + "</p></br>" +
                       "<p>created_at: " + response.list_state + "</p></br>" +
                       "<p>updated_at: " + response.list.created_at + "</p></br>" +
                       "<p>updated_at: " + response.list.updated_at + "</p></br>";
 }

//function to actually send update request
function updateTask(){
   var id = document.getElementById("task-id").value;
   var data = {};
   data.list_id = document.getElementById("list-id-update").value;
   data.task_text = document.getElementById("task-text-update").value;
   data.task_state = document.getElementById("task-state-update").value;
   var json = JSON.stringify(data);

   var xhttp = new XMLHttpRequest();
    xhttp.open("PUT", "http://cptr320.cs.wallawalla.edu:8000/api/v1/tasks/" + id, true);
    xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    xhttp.onload = function(){
        var response = JSON.parse(xhttp.responseText);
        if(xhttp.status == '200'){
           document.getElementById("show-template").innerHTML = "Successful";
        }
        else{
         document.getElementById("show-template").innerHTML = "error, see console for more info";
         console.log(response);
        }
    }
    xhttp.send(json);
 }