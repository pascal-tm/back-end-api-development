Complete Web Backend Course (PHP)
===========

## Installation

### GIT gebruiken om cursus te downloaden
  - Download en installeer [GIT](http://git-scm.com/). Installeer de CLI-versie.

  - Maak een map "web-backend" aan 

  - Open je [CLI](http://en.wikipedia.org/wiki/Command-line_interface):

    1. Navigeer naar de map "web-backend" via de CLI:
    
       ````
       cd \user\dropbox\web-backend
       ````
    2. Clone de web-backend repository:
       
       ````
       git clone https://github.com/pascal-tm/back-end-api-development course-material
       ````
       Remark: By adding back-end-api-development-course at the end of this command, Git will create a folder called back-end-api-development-course and will put the files of the repository in that folder.

      

### Folder structure

  - The folder structure of the back-end-api-development course should look as follows:
  
    ```
    back-end-api-development  (folder)
    |- course-material (folder)
    |- solutions (folder)
    ```
  
    - The "course-material" folder contains this repository
    - The "solutions" folder will contain your own solutions to the exercises. This will become a repository as well.

## Updating to the newest version of the course

  - To update your local version of the course
    1. Using your CLI, navigate to the folder where the course is located
    
       ````
       cd \user\dropbox\back-end-api-development\course-material
       ````
    2. Execute the pull command:
       
       ````
       git pull
       ````

## Uploading your own solutions to your personal repository

  - [Create a GitHub repository](https://help.github.com/articles/create-a-repo) that will contain your solutions

  - Every time you finish an exercise, you need to push these changes to your online repository

  - Open your CLI and follow these steps:

    1. Navigate to your solution folder:
       ````
       cd \user\dropbox\back-end-api-development\solutions
       ````

    2. Check the status of your local git repository to see if anything has been changed
       ````
       git status
       ````

    3. Add the changes to your local repository
       ````
       git add .
       ````
    The `.` means the whole working directory

    4. Finalise your changes by committing them to the repository. Add a message that says what has been added and changed.
       ````
       git commit -m "Add solution exercise debug errors"
       ````
    The `-m` stand for "message". This allows you to describe the commit you make with words. That way your create a "changelog". 

    5. Add the changes of your local repository to your online repository, so they can be found online
       ````
       git push origin main
       ````
    `origin` represents the online location of your repository. `main` (or sometimes `master`) represents your local version.


## Contributors
