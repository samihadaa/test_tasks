# test_tasks

## Project setup

```
npm install
npm run serve

```

### About the Project test_tasks

Technologie for front end : vue js 3,
Technologie for back end : PHP,
Database : Mysql,
Frameworke css : Bootstrap,
Other package used in this project : axios, jquery, datatables.net,
----------------DIRECTORY----------
"src/App.vue" : the front part where i show the datatable
"sec/api" : the backend part where i connect to the db and get all rows of tasks table
----------------STEPS--------------
1- Install vue js app
2- Add all needed pckages : axios, jquery, datatables.net,Bootstrap
3- Create new db in mysql with the name test_tasks
4- Create tasks table with fields : id, title, description and created_at
5- Add "api" file
6- Add config.php file where i create a class DbConnect to connect with mysql db
7- Create a "GET" route in order to get all posts rows
