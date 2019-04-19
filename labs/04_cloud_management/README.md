# Lab 4: Cloud Management

In this lab the class will be creating a CLI for managing a cloud server.

## Learning Outcomes

At the completion of this checkpoint:

* you will have used a cloud API.
* you will have written PHP code to access a web service.
* you will be familiar with the basics of a cloud API.
* you will be familiar with the basics of writing a CLI.

## Resources

* [Proxmox](https://www.proxmox.com/en/)
* [Proxmox API](https://pve.proxmox.com/wiki/Proxmox_VE_API)
* [Postman](https://www.getpostman.com/)
* [Lumen](https://developer.mapquest.com/)
* [Guzzle](https://guzzle.readthedocs.io/en/stable/)

## Assignment

Build a command line interface that can manage users and cloud based VMs.
In this assignment, you will be using [Proxmox API](https://pve.proxmox.com/wiki/Proxmox_VE_API).

The framework we have been using has a nice interface to add commands to artisan.
You will be adding commands to artisan to manage Proxmox.
To connect to the Proxmox API, we will be using [Guzzle](https://guzzle.readthedocs.io/en/stable/).
Guzzle is a PHP HTTP client that makes it easy to send HTTP requests and trivial to integrate with web services.

The class will be exploring and learning about Proxmox together.
Since the lab requires a lot of research and learning about new topics, the requirements have been keep to a minimum.
Each student will be pick one endpoint to implement as a CLI command.
The student must implement this command on their project branch and create a merge request to be graded (and merged into the project).
At the end of the lab, all endpoints should be implemented into a single project.

The command should support the configuration options provided by proxmox when doing that task.

[ProxmoxVE API Client](https://github.com/ZzAntares/ProxmoxVE) is used to make it even easier to utilize the Proxmox API.
The client handle getting a token and submitting the token for future requests that require access.

### Team Process

Work on this as a group on Wednesday, Thursday and Friday this week.

You will be creating a Merge Request to submit your code to the project.
Have a classmate review your code them the Merge Request and post comments.
You must **post** and **review** a merge request.

As part of the review process, you should test their code and write comments about style and functionality.

### Specifications

* Proxmox test cluster has been setup for this assignment:
  * [Test Cluster](https://proxmox-test.cs.wallawalla.edu:8006)
  * User: cptr320, Password: cptr320
  * Talk to Cameron and William for changing setting on the test server

* [Gitlab Project](https://gitlab.cs.wallawalla.edu/cptr320/cloud320)
  * Merge request must be made to this project (master branch).
  * Make a branch to do all your work. (It is good practice to start the branch name with your username "carmpr/node_list".)

* Lumen and Proxmox tasks
  * List users
  * Create user
  * Read user
  * Delete user
  * List VMs
  * Read VM status
  * Create VM
  * Delete VM
  * Backup VM
  * Start VM
  * Shutdown VM
  * Give user access to VM
  * List VMs user has access
  * Move VM to different node
  * OTHER TASKS can be suggested

* Commands must support required and optional arguments 

* Change must be sent as a Merge Request for inclusion in project.

Additional notes:

* Please include a header in each of your PHP files that lists the course and term, your name, and a contact email.  
* Be sure to utilize appropriate code formatting standards.
* Before you begin the assignment, estimate the time you believe it will take you to complete the assignment.
    Then log your time and submit both your initial estimate and the final time that it took.

Because this assignment requires that you write PHP code that is interpreted on a PHP server, you will need use your local server (from Vagrant).

**Questions?**

Ask your instructor right away so that you don't waste time going down a dead end.

## Rubric

* CLI command (50 points)
  * Documentation
  * Code
  * Merge Request
  * Optional arguments
* Code Review (10 points)
  * Review and Test Merge Request
* Class survey (20 points)
  * Teamwork
* 20 points: Professionalism: Comments, Formatting and Style, Time Records
* 10 points: Xtra Credit: Implement a second endpoint