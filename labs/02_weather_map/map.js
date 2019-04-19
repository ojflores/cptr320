/*************************************************************************
 *
 * Lab 2
 *
 * File Name: map.js
 * Course:    CPTR 320
 * Date:      2/11/19
 */

//globals
var mapID = 'fiMst7AQxFtIUp8Tatrzlf11hJdTs7Vw';
var map, fg;

window.onload = function() {

    L.mapquest.key = 'fiMst7AQxFtIUp8Tatrzlf11hJdTs7Vw';

    fg = L.featureGroup();

    map = L.mapquest.map('map', {
        center: [46.0439, -118.378229],
        layers: [L.mapquest.tileLayer('map'), fg],
        zoom: 12
    });
    getInfo(46.0439, -118.378229);
}

//get the latitude and longitude to input into our map
function getLocation(){
    var location = document.getElementById("location").value;
    console.log(location);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState == 4 && this.status == 200){
            var first = JSON.parse(this.responseText);
            getInfo(first.results[0].locations[0].latLng.lat, first.results[0].locations[0].latLng.lng);
            console.log(first.results[0].locations[0].latLng.lat);
            console.log(first.results[0].locations[0].latLng.lng);
        }
    };
    xhttp.open("GET", "http://open.mapquestapi.com/geocoding/v1/batch?key=fiMst7AQxFtIUp8Tatrzlf11hJdTs7Vw&location=" + location, true);
    xhttp.send();
}


//adds a marker on the map
function addMarker(lat, long){
    L.marker([lat, long], {
        text: 'Home',
        type: 'circle',
    }).bindPopup("Hello world <br> i am a popup").addTo(fg);
}

//function called to add more items on the map
function addMore(){
    var city = document.getElementById("location").value;
    getLocation();
}

//gets information about the city to display in a box
function getInfo(lat, long){
    getWeatherToday(lat, long);
}

//function to get weather of today
function getWeatherToday(lat, long){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState == 4 && this.status == 200){
            var parsed = JSON.parse(this.responseText);
            toRespond = parsed.main.temp;
            fiveDay("Current Temp: " + toRespond, lat, long);
        }
    };
    xhttp.open("GET", "http://api.openweathermap.org/data/2.5/weather?lat=" + lat + "&lon=" + long + "&APPID=91d1477634f2e11cf7f4f2d5be685f45", true);
    xhttp.send();
}

//function to get the five day weather forecast
function fiveDay(current, lat, long){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if(this.readyState == 4 && this.status == 200){
            var five = JSON.parse(this.responseText);
            dayonetemp = five.list[0].main.temp;
            daythreetemp = five.list[2].main.temp;
            dayfourtemp = five.list[3].main.temp;
            dayfivetemp = five.list[4].main.temp;
            dayoneweather = five.list[0].weather[0].main;
            daythreeweather = five.list[2].weather[0].main;
            dayfourweather = five.list[3].weather[0].main;
            dayfiveweather = five.list[4].weather[0].main;
            L.marker([lat, long], {
                text: 'Home',
                type: 'circle',
            }).bindPopup(current + "<br> Tomorrow Temp: " + dayonetemp + "|| Tomorrow Weather: " + dayoneweather
            + "<br> Day 3 Temp: " + daythreetemp + " || Day 3 Weather: " + daythreeweather
            + "<br> Day 4 Temp: " + dayfourtemp + " || Day 4 Weather: " + dayfourweather
            + "<br> Day 5 Temp: " + dayfivetemp + " || Day 5 Weather: " + dayfiveweather).addTo(fg);
            
        }
    };
    xhttp.open("GET", "http://api.openweathermap.org/data/2.5/forecast?lat=" + lat + "&lon=" + long + "&APPID=91d1477634f2e11cf7f4f2d5be685f45", true);
    xhttp.send();
}