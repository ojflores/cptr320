# Lab 2: Weather Map

In this lab you will be creating a weather map using public web services.

## Learning Outcomes

At the completion of this checkpoint:

* you will have used a public maps API.
* you will have used a public weather API.
* you will have written JavaScript to access a public web service.
* you will have created weather maps single page web application.
* you will be familiar with the basics of a map API.
* you will be familiar with the basics of a weather API.

## Resources

* [Ajax Tutorial](https://www.w3schools.com/xml/ajax_intro.asp)
* [OpenWeatherMap.org](https://openweathermap.org/.org)
* [Postman](https://www.getpostman.com/)
* [Mapquest developer](https://developer.mapquest.com/)
* [Leaflet](http://leaflet.org/)

## Assignment

Build a single page web application that shows the current weather and 5 day forecast for city.
The user should be able to add city locations to the map using a search tool.
Once the city has been added, the pin can be clicked to reveal a bubble with the weather information for that city.
The user can continue to add cities to the map.
Weather data is updated each time the user clicks the pin for that city.

In this assignment, you will be using [OpenWeatherMap.org](https://openweathermap.org/.org) and [Mapquest](https://developer.mapquest.com/).
Using the in-class exercises as a starting point, you will be connecting the weather data to a map.
Your website will display weather locations on the map using the Mapquest Javascript API.
Here are the specific things your implementation must include.

### Lab Preparation

These steps should have been completed in class as part of an exercise.
This is just a reminder.

* Get an API key from [Mapquest developer](https://developer.mapquest.com/).
  * You will need a Mapquest account to get an API key.
* Get an API key from [OpenWeatherMap.org](https://openweathermap.org/.org).
  * You will need a OpenWeatherMap account to get an API key.

### Specifications

* Public web services required to be used:
  * [Mapquest.js](https://developer.mapquest.com/documentation/mapquest-js/v1.3/)
  * [Geocoding API](https://developer.mapquest.com/documentation/geocoding-api/)
  * [Current Weather Data](https://openweathermap.org/current)
  * [5 day / 3 hour forecast](https://openweathermap.org/forecast5)
* Must use the web service JSON return type.
  All responses must then parse the JSON to get the data you need for your application.

* All weather data must originate from [OpenWeatherMap.org](https://openweathermap.org/.org) web service.
  * The weather data should be requested on demand.

* All map data must originate from [Mapquest](https://www.mapquest.com/) web service.
  * The map data should be requested on demand.

* Actions available to the user.
  * Add a pin to the map by searching for a city.
    * The city name should appear next to the pin.
  * Clicking on a pin opens a window to view the weather details.
    * Both the current temperature and the 5 day forecast.
    * Include any relevant additional details about the location or weather.

* Extra Credit: Incorporate a temperature weather map.

Additional notes:

* Please include a header in each of your JavaScript files that lists the course and term, your name, and a contact email.  
  See the below for an example comment.
* Be sure to utilize appropriate code formatting standards.
* Before you begin the assignment, estimate the time you believe it will take you to complete the assignment.
    Then log your time and submit both your initial estimate and the final time that it took.

Because this assignment requires that you write PHP code that is interpreted on a web server, you will need use your local web server (from Vagrant) and deploy on your public CS web server.

**Questions?**

Ask your instructor right away so that you don't waste time going down a dead end.

## Rubric

* Single Page Application Features (10 points each)
  * Only using JavaScript (and single page load)
  * Search Box
  * Adding Pin
  * Displaying Bubble
* Using Public Endpoints (10 points each)
  * Map
  * Geocoding
  * Current Weather
  * 5 Day Forecast
* 20 points: Professionalism: Comments, Formatting and Style, Time Records
* 10 points: Xtra Credit: temperature map
