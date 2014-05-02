Todo-App-Cakephp
================
#Introduction
 This is a basic Todo App done in cakephp

#features
Add new Todo
Delete Todo 
Edit Todo
Set Priority High Medium Low
Set Done Undone
Sort On Done,Pending,High,Low,Medium

#New Upcoming Features
Set Due Date
More Sorting Option
User Profile
Groups

#Setup
Create a local host setup in Windows or Linux 
Mysql > Create a database 
      > Create a table name 'tasks following this table description
    CREATE TABLE tasks (
    id int(10) unsigned NOT NULL auto_increment,
    title varchar(255) NOT NULL,
    done tinyint(1) default NULL,
    priority varchar(10) default NULL,
    created datetime default NULL,
    modified datetime default NULL,
    PRIMARY KEY (id)
                    );

#All done 


      


