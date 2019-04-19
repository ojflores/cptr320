# Lab 1: TODO REST API

In this checkpoint you will be creating a REST API for a TODO list.

## Learning Outcomes

At the completion of this checkpoint:

* you will have identified REST endpoints.
* you will have written API documentation for REST endpoints.
* you will have implemented REST endpoints using a front controller architecture.
* you will be familiar with the basics of API documentation using Swagger (OpenAPI).
* you will be familiar with the basics of PHP to implement REST endpoints.

##  Set Up Database

The **todo** database needs to be loaded into your local and production environment.
Using _phpmyadmin_, import the **{repo}/sql/todo.sql** file into the _todo_ database.
After importing the database you will see three tables: list, task, and user.
Feel free to add any test data you need to these tables.

## Requirements

### API Documentation

Save your YAML config file into the **todo-1.0.0-swagger.yaml**.

### API Implementation

Using Front Controller architecture used in class.

The TODO list needs to support multiple TODO lists.
The API allows you to create, search, list, modify, delete and activate/de-activate lists.

* Support CRUD operations on list.
  * Create new list(DONE)
  * Read list(done)
  * Update existing list (done)
  * Delete existing list (done)
* Create support for these features.
  * List TODO Lists (done)
  * Search Lists
  * Activate list (extra credit)
  * De-activate list (extra credit)

For each TODO list, support adding tasks to the list.
These task can be created, searched, listed, removed, updated, and complete/in-complete.

* Support CRUD operations on tasks.
  * Create new task (DONE)
  * Read task (DONE)
  * Update existing task (DONE)
  * Delete existing task (DONE)
* Create support for these features.
  * List tasks for a specific list
  * Search tasks
  * Complete task (extra credit)
  * In-complete task (extra credit)

Additional notes:

* Be sure to utilize appropriate REST standards and validate your JSON output.
* While the database has a _users_ table, you are not being asked to create User resource endpoints.
* Before you begin the assignment, estimate the time you believe it will take you to complete the assignment.
    Then log your time and submit both your initial estimate and the final time that it took.

Because this assignment requires that you write PHP code that is interpreted on a web server, you will need use your local web server (from Vagrant) and deploy on your public CS web server.

**Questions?**

Ask your instructor right away so that you don't waste time going down a dead end.

## Resources

* [Swagger](https://swagger.io/)
* [REST API Tutorial](https://restfulapi.net/)

## Rubric

* 20 points: API Documentation
* Endpoint Implementation (5 points each)
  * 20 points: CRUD List Endpoints
  * 5 points: List Endpoint
  * 5 points: Search List Endpoint
  * 5 points: Xtra Credit: Alternate endpoints
  * 20 points: CRUD Task Endpoints
  * 5 points: List Task Endpoint
  * 5 points: Search Task Endpoint
  * 5 points: Xtra Credit: Complete end points
* 20 points: Professionalism: Comments, Formatting and Style, Time Records
