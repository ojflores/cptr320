/*************************************************************************
 *
 * Final Project
 *
 * File Name: intramurals.js
 * Course:    CPTR 320
 * Date:      3/5/19
 */

 window.onload = function() {
	document.getElementById("read-team").onclick = getTeam;
	document.getElementById("list-teams").onclick = getAllTeams;
	document.getElementById("all-players").onclick = getAllPlayers;
	document.getElementById("update-team").onclick = updateTeam;
	document.getElementById("delete-team").onclick = deleteTeam;
	document.getElementById("delete-player").onclick = deletePlayer;
	document.getElementById("read-player").onclick = readPlayer;
	document.getElementById("create-player").onclick = createPlayer;
	document.getElementById("create-team").onclick = createTeam;
	document.getElementById("update-player").onclick = updatePlayer;
	document.getElementById("add-game").onclick = addGame;
 }

//function to add game to calendar
function addGame(){
	var show = document.getElementById("show-template");
        show.innerHTML = "Fill in the following boxes to add a game to the schedule</br>";
        show.innerHTML += '<input type="text" id="event-id">Add an ID for the event</br>' +
                        '<input type="text" id="event-name">Give the game a name</br>' +
                        '<input type="text" id="event-desc">which two teams are playing?</br>' +
                        '<input type="text" id="hosted">Which team is hosting</br>' +
                        "<input type='text' id='location'>Where are the two teams playing</br>" +
			'<input type="text" id="event-date">Event Date</br>' +
                        '<button id="post-game">Create Player</button></br>';
	document.getElementById("post-game").onclick = function(){
		var data = {};
                data.event_id = document.getElementById("event-id").value;
                data.event_name = document.getElementById("event-name").value;
                data.event_desc = document.getElementById("event-desc").value;
                data.hosted_by = document.getElementById("hosted").value;
                data.location = document.getElementById("location").value;
		data.event_date = document.getElementById("event-date").value;
                var json = JSON.stringify(data);
                var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "http://18.208.163.54:8000/api/v2/calendar", true);
                xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
                xhttp.onload = function(){
                        var response = JSON.parse(xhttp.responseText);
                        if(xhttp.status == '200'){
                                document.getElementById("show-template").innerHTML = "Successful";
                        }
                        else{
                                console.log(response);
                        }
                }
                xhttp.send(json);
	}
}

//function to create a new team
function createTeam(){
	var show = document.getElementById("show-template");
        show.innerHTML = "Fill in the following text boxes and press SUBMIT to add a new team</br>";
        show.innerHTML += '<input type="text" id="new-team-id">Add team ID</br>' +
                        '<input type="text" id="new-team-name">Add team Name</br>' +
			'<button id="create_team">Create Team</button></br>';
	document.getElementById("create_team").onclick = function(){
                var data = {};
                data.team_id = document.getElementById("new-team-id").value;
                data.team_name = document.getElementById("new-team-name").value;
                var json = JSON.stringify(data);
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "http://3.208.194.127:8000/api/v2/teams", true);
                xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
                xhttp.onload = function(){
                        var response = JSON.parse(xhttp.responseText);
                        if(xhttp.status == '200'){
                                document.getElementById("show-template").innerHTML = "Successful";
                        }
                        else{
                                console.log(response);
                        }
                }
                xhttp.send(json);
	}
}

//function to create a new player
function createPlayer(){
	var show = document.getElementById("show-template");
	show.innerHTML = "Fill in the following text boxes and press SUBMIT to add a player</br>";
	show.innerHTML += '<input type="text" id="first-name">Add first name</br>' +
                        '<input type="text" id="last-name">Add last name</br>' +
			'<input type="text" id="playerId">Add Player Id</br>' +
			'<input type="text" id="teamId">Add team Id</br>' +
			"<input type='text' id='free-agent'>Add whether they're a free agent (0 or 1)</br>" +
			'<button id="create_player">Create Player</button></br>';
	document.getElementById("create_player").onclick = function(){
		var data = {};
		data.player_id = document.getElementById("playerId").value;
		data.first_name = document.getElementById("first-name").value;
		data.last_name = document.getElementById("last-name").value;
		data.team_id = document.getElementById("teamId").value;
		data.free_agent = document.getElementById("free-agent").value;
		var json = JSON.stringify(data);
		var xhttp = new XMLHttpRequest();
    		xhttp.open("POST", "http://3.208.194.127:8000/api/v2/players", true);
    		xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
    		xhttp.onload = function(){
        		var response = JSON.parse(xhttp.responseText);
        		if(xhttp.status == '200'){
        			document.getElementById("show-template").innerHTML = "Successful";
        		}
        		else{
        			console.log(response);
        		}
    		}
    		xhttp.send(json);	
	}
}

//function to retrieve a player
function readPlayer(){
	var show = document.getElementById("show-template");
        show.innerHTML = "Please enter the ID of the player you would like to see: </br>";
        show.innerHTML += '<input type="text" id="player-to-read"><button id="player_read">READ</button></br>';
        document.getElementById("player_read").onclick = function(){
                var id = document.getElementById("player-to-read").value;
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "http://3.208.194.127:8000/api/v2/players/" + id, false);
                xhttp.send();
                lists = JSON.parse(xhttp.responseText);
                show.innerHTML = "<table align='center' id='show-teams'>" +
                                        '<tr>' +
                                                '<th>Player Name</th>' +
						'<th>Player ID</th>' +
                                                '<th>Team ID</th>' +
                                        '</tr>' +
                                        '<tr>' +
                                                '<td>' + lists.player.first_name + " " + lists.player.last_name + '</td>' +
						'<td>' + lists.player.player_id + '</td>' +
                                                '<td>' + lists.player.team_id + '</td>' +
                                        '</tr></table>';
        }
}

//function to delete a player
function deletePlayer(){
	var show = document.getElementById("show-template");
        show.innerHTML = "Please enter the ID of the player you would like to delete: </br>";
        show.innerHTML += '<input type="text" id="player-to-delete"><button id="player_delete">DELETE</button></br>';
        document.getElementById("player_delete").onclick = function(){
                var id = document.getElementById("player-to-delete").value;
                var xhttp = new XMLHttpRequest();
                xhttp.open("DELETE", "http://3.208.194.127:8000/api/v2/players/" + id, false);
                xhttp.send();
                document.getElementById("show-template").innerHTML = "Your request has been sent";
        }
}

//function to delete a team
function deleteTeam(){
	var show = document.getElementById("show-template");
	show.innerHTML = "Please enter the ID of the team you would like to delete: </br>";
	show.innerHTML += '<input type="text" id="team-to-delete"><button id="team_delete">DELETE</button></br>';
	document.getElementById("team_delete").onclick = function(){
		var id = document.getElementById("team-to-delete").value;
		var xhttp = new XMLHttpRequest();
		xhttp.open("DELETE", "http://3.208.194.127:8000/api/v2/teams/" + id, false);
		xhttp.send();
		document.getElementById("show-template").innerHTML = "Your request has been sent";
	}
}

 //function to read a team
 function getTeam(){
	var show = document.getElementById("show-template");
	show.innerHTML = "Please enter the ID of the team you would like to see: </br>";
	show.innerHTML += '<input type="text" id="team-to-read"><button id="team_read">READ</button></br>';
	document.getElementById("team_read").onclick = function(){
                var id = document.getElementById("team-to-read").value;
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "http://3.208.194.127:8000/api/v2/teams/" + id, false);
                xhttp.send();
 		lists = JSON.parse(xhttp.responseText);
        	show.innerHTML = "<table align='center' id='show-teams'>" +
                	                '<tr>' +
                        	                '<th>Team Name</th>' +
                                	        '<th>Team ID</th>' +
                                	'</tr>' +
					'<tr>' +
						'<td>' + lists.team.team_name + '</td>' +
						'<td>' + lists.team.team_id + '</td>' +
					'</tr></table>';
	}
 }

 //function to read all the teams
 function getAllTeams(){
     var show = document.getElementById("show-template");
     show.innerHTML = "";
     var xhttp = new XMLHttpRequest();
     xhttp.open("GET", "http://3.208.194.127:8000/api/v2/teams", false);
     xhttp.send();
     lists = JSON.parse(xhttp.responseText);
	show.innerHTML += "<table align='center' id='show-teams'>" +
		 		'<tr>' +
		 			'<th>Team Name</th>' +
		 			'<th>Team ID</th>' +
		 		'</tr>';
	 for(var i = 0; i < lists.data.length; i++){
		var table = document.getElementById("show-teams");
		var row = table.insertRow(i+1);
		var cell0 = row.insertCell(0);
		var cell1 = row.insertCell(1);
		cell0.innerHTML = lists.data[i].team_name;
		cell1.innerHTML = lists.data[i].team_id;
	 }
	 show.innerHTML += "</table>";
 }

//function to get all the players
function getAllPlayers(){
	var show = document.getElementById("show-template");
	show.innerHTML = "";
	var xhttp = new XMLHttpRequest();
	xhttp.open("GET", "http://3.208.194.127:8000/api/v2/players", false);
	xhttp.send();
	lists = JSON.parse(xhttp.responseText);
        show.innerHTML += "<table align='center' id='show-players'>" +
                                '<tr>' +
                                        '<th>Player Name</th>' +
                                        '<th>Player ID</th>' +
					'<th>Team ID</th>' +
                                '</tr>';
	for(var i = 0; i < lists.data.length; i++){
                var table = document.getElementById("show-players");
                var row = table.insertRow(i+1);
                var cell0 = row.insertCell(0);
                var cell1 = row.insertCell(1);
		var cell2 = row.insertCell(2);
                cell0.innerHTML = lists.data[i].first_name + " " + lists.data[i].last_name;
                cell1.innerHTML = lists.data[i].player_id;
		cell2.innerHTML = lists.data[i].team_id;
         }
         show.innerHTML += "</table>";	
}

//function to update the team
function updateTeam(){
	var show = document.getElementById("show-template");
	show.innerHTML = "Fill in the following text boxes and press SUBMIT to update a team</br>";
	show.innerHTML += '<input type="text" id="team-id">Enter Id to update</br>' +
				'<input type="text" id="team-name">Update Team Name</br>' +
				'<button id="update_team">Update Team</button></br>';
	document.getElementById("update_team").onclick = function(){
		var id  = document.getElementById("team-id").value;
		var data = {};
		data.team_name = document.getElementById("team-name").value;
		var json = JSON.stringify(data);
		var xhttp = new XMLHttpRequest();
		xhttp.open("PUT", "http://3.208.194.127:8000/api/v2/teams/" + id, true);
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
	};

}

//function to update a player
function updatePlayer(){
	var show = document.getElementById("show-template");
        show.innerHTML = "Fill in the following text boxes and press SUBMIT to update a player</br>";
        show.innerHTML += '<input type="text" id="update-playerId">Enter ID of the player you would like to edit</br>' +
			'<input type="text" id="update-first-name">Add first name</br>' +
                        '<input type="text" id="update-last-name">Add last name</br>' +   
                        '<input type="text" id="update-teamId">Add team Id</br>' +
                        "<input type='text' id='update-free-agent'>Add whether they're a free agent (0 or 1)</br>" +
                        '<button id="update_player">Update Player</button></br>';
        document.getElementById("update_player").onclick = function(){
		var id = document.getElementById("update-playerId");
                var data = {};
                data.first_name = document.getElementById("update-first-name").value;
                data.last_name = document.getElementById("update-last-name").value;
                data.team_id = document.getElementById("update-teamId").value;
                data.free_agent = document.getElementById("update-free-agent").value;
		data.player_id = id.value;
        	var json = JSON.stringify(data);
                var xhttp = new XMLHttpRequest();
                xhttp.open("PUT", "http://3.208.194.127:8000/api/v2/players/" + id, true);
                xhttp.setRequestHeader('Content-type', 'application/json; charset=utf-8');
                xhttp.onload = function(){
                	if(xhttp.status == '200'){
                        	document.getElementById("show-template").innerHTML = "Successful";
                	}
                	else{
                        	document.getElementById("show-template").innerHTML = "error, see console for more info";
                	}
		}
                xhttp.send(json);
		
	}
}
