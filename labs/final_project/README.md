# Lab Final Project: School

In this lab you will be creating and deploying a REST API server and single web page application client on a public cloud.

## Learning Outcomes

At the completion of this checkpoint:

* you will have created a REST API.
* you will have created a single web page application.
* you will have written JavaScript to access a REST web service.
* you will have written PHP to create a REST API.
* you will have documented a REST API using OpenAPI (Swagger.io).
* you will have set up a web service on a cloud platform.
* you will be familiar with the REST API for list, create, read, update and delete operations.
* you will have deployed an application to a public cloud.
* you will be familiar with servies in a public cloud.

## Resources

* [Ajax Tutorial](https://www.w3schools.com/xml/ajax_intro.asp)
* [Amazon Web Services](https://aws.amazon.com/)
* [AWS LAMP Install Tutorial](http://docs.aws.amazon.com/AWSEC2/latest/UserGuide/install-LAMP.html)
* [Composer](https://getcomposer.org/)
* [Lumen](https://lumen.laravel.com/)
* [Postman](https://www.getpostman.com/)
* [Swagger (OpenAPI Framework)](http://swagger.io/)

## Assignment

In this assignment, you will utilize the web service programming skills up to this point to create an complete REST based web service and single web page application front end.
The service will have list, create, read, update and delete hooks for you to utilize.
The service will also have two custom endpoints.
The web application front end will utilize your endpoints and your classmates endpoints to create an interactive application.
The application will then be deployed to a public cloud.

### Lab Preparation

* Read over all the requirements for your final project.
* Read over the team members and the individual tasks.
* Pick the topic for your project and tasks.
* Create gitlab project for your final project.
  * Share the project with all your team members.
* The final project will have three checkpoints before the final presentation.
  See the checkpoint details.
* Completed AWS account set up.

### Specifications

* Project Definition
  * Create a project README.d that defines the project and the team.
  * Give a brief description of the goals and pieces of the project.
* Swagger API Definition
  * Create a Swagger API definition for all the RSVP resources end points.
  * Include short descriptions of each of the resource end points and parameters.
* Web Service Requirements
  * At least two resources with list and CRUD endpoints
  * At least two custom URIs (Not standard endpoints)
* The RSVP web service must have the following properties.
  * Server written in PHP using Lumen.
  * Data is stored in a MySQL database.
  * Deploy the server on AWS.
  * Must use the web service JSON return type.
    All responses must then parse the JSON to get the data you need for your application.
* The single web page application must have the following properties.
  * Client implemented in JavaScript and HTML. (No PHP!)
  * Page does not reload.
    All information is dynamic in that page.
  * Deploy the server on AWS (separate server).

* Extra Credit: Incorporate a public web service.

Additional notes:

* Please include a header in each of your JavaScript and PHP files that lists the course and term, your name, and a contact email.  
  Check the in-class exercises for examples.
* Be sure to utilize appropriate code formatting standards.
* Before you begin a checkpoint, estimate the time you believe it will take you to complete the checkpoint.
    Then log your team's time and submit both your initial estimate and the final time that it took.
* Because this assignment requires that you write PHP code that is interpreted on a web server, you will need use your local web server (from Vagrant) and deploy on your public AWS web server.

### Checkpoints

1. Initial proposal.
   * Write up your idea and suggested endpoints in a README.md in your project gitlab.
1. Stubbed endpoints deployed on cloud.
   * README.md updated to show the location of web service.
   * Swagger API Definition YAML code completed and posted to gitlab.
   * AWS web service instance setup.
     * Create an AWS instance for hosting your REST web service.
     * Configure the web server for the Swagger API defined end points.
1. Completed Web Service deployed on cloud.
   * Update any related documentation.
   * Tests should be completed.
   * Deploy final version of the web service.
   * AWS web service instance updated.
     * Configure the SQL database server.
     * Load the SQL database.
   * AWS application instance setup.
     * Deploy your single web page application code.

### Project Ideas

For this final project you will be working with different aspects of University Life.
Below are some ideas and each team will pick their own topic.
Remember all the requirement must be meet.

* Sports Teams
* Dorm Rooms
* Class Grades
* Community Attendance

### Teams

Team _Silver Lake_

* Cameron Bierwagen
* Nate Chung
* Timothy Boskovic

Team _Berdeen Lake_

* Sheldon Woodward
* Dennis Herrera
* Alexander Lugo

Team _Mowich Lake_

* Nicholas Morin
* Dakota Maura
* Yohance Etienne

Team _Angeline Lake_

* Nick Perry
* Oscar Flores
* William Warren

### Tasks

Each team member will have two assigned tasks.
The tasks represent responsibilities they are going to ensure gets completed.
They do dot have to be the one to do the work but must make sure it is completed.

* Team Lead
* API documentation
* API implementation in PHP
* API tests
* Single page web application using HTML and Javascript
* Cloud deployment

**Questions?**

Ask your instructor right away so that you don't waste time going down a dead end.

## Grading

### Submission Instructions

Create a README.md file for your project.
The README should include the project name, team members, description, web service location, and the details about files in the project.
Include a URL to a working example of your lab project.
The README should be uploaded with your project on gitlab.

Each checkpoint has a CHECKPOINT_X.md file.
These checkpoint files are similar to the ASSIGNMENT.md file you have seen in labs.
In addition to the normal details you will find a place to put a project update.
Please fill this out.

## Checkpoint 1 Rubric

* Gitlab Project (10 points)
  * Team members and instructor have access
* Project Description (10 points)
  * README.md
  * Description
* 5 points: Professionalism: Comments, Formatting and Style, Time Records

## Checkpoint 2 Rubric

* AWS Cloud Instance (20 points each)
  * REST Web Service Set Up
* README Documentation Updated (5 points each)
* API YAML Documentation (20 points each)
* 5 points: Professionalism: Comments, Formatting and Style, Time Records

## Checkpoint 3 Rubric

* AWS Cloud Instance (20 points)
  * Web Application Set Up
* README Documentation Updated (5 points)
* Could Database Set Up (10 points)
* REST Web Service Functional (10 points)
* 5 points: Professionalism: Comments, Formatting and Style, Time Records

## Presentation Rubric

* Project Overview (10 points each)
* Endpoints (10 points each)
* Demo Single Page Application Features (10 points each)
  * Uses classmates web service
  * Supports all web service resources for list and CRUD
  * Supports custom endpoints web service

## Project Rubric

* Single Page Application Features (10 points each)
  * Only using JavaScript (and single page load)
  * Uses classmates web service
  * Supports all web service resources for list and CRUD
  * Supports custom endpoints web service
* Web Service Features (10 points each)
  * Only using PHP
  * Uses classmates web service
  * Supports all web service resources for list and CRUD
  * Supports custom endpoints web service
* 20 points: Professionalism: Comments, Formatting and Style, Time Records
* 10 points: Xtra Credit: public API

## Team Scaling

Based on your participation with the project your grade could be scaled up or down a letter grade.
The scaling will be based on your gitlab commits and team survey at the end of the project.
