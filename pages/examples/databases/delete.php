<?php

    try {
        
        $db = createSqliteDbConnection('chinook.sqlite');
       
        $employeesColumns = fetchResultForQuery(
            $db, 
            'PRAGMA table_info(employees)'
        );

        // Check if an employee need to be deleted
        if (isset($_GET['id']))
        {
            $employeesDeleteQuery = "DELETE FROM employees WHERE EmployeeId = :employeeId";

            $params = [
                ':employeeId' => (int) $_GET['id']
            ];

            fetchResultForQuery(
                $db, 
                $employeesDeleteQuery,
                $params
            );
        }

        // Get all employees
        $employeesQuery = "SELECT * FROM employees";
        $employees = fetchResultForQuery(
            $db, 
            $employeesQuery
        );


        closeSqliteDbConnection($db);
    } 
    catch (PDOException $e) 
    {
        // Handle any errors
        echo "Error: " . $e->getMessage();
    }

    function createSqliteDbConnection($dbFilePath)
    {
        // Create a new PDO instance for SQLite
        $db = new PDO("sqlite:" . $dbFilePath);

        // Set error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }


    function fetchResultForQuery($db, $query, $params = false)
    {
        $result = array();

        // Preparing means sanitizing them, checking for errors/malicious code before execution
        $preparedStatement = $db->prepare($query);

        if ($params)
        {
            foreach ($params as $placeholder => $value) {
                $preparedStatement->bindParam($placeholder, $value);
            }
        }

        // Execute the query
        $preparedStatement->execute();

        // Fetch all the result as an associative array
        $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function closeSqliteDbConnection($db)
    {
        // Close the database connection
        $db = null;
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/directory.css">
    <link rel="stylesheet" type="text/css" href="/css/facade.css">
</head>
    <body>

        <h1>Databases: delete</h1>

        <h2>Getting all employees from the database</h2>

        <p><b>query:</b> <code><?= $employeesQuery ?></code></p>

        <table>
            <tr>
                <td>action</td>
                <?php foreach($employeesColumns as $column): ?>
                    <td><?= $column['name'] ?></td>
                <?php endforeach ?>
            </tr>
            <?php foreach($employees as $employee): ?>
            <tr>
                <td><a href="delete.php?id=<?= $employee['EmployeeId'] ?>">delete</a></td>
                <?php foreach($employee as $employeeData): ?>
                    <td><?= $employeeData ?></td>
                <?php endforeach ?>
            </tr>
            <?php endforeach ?>
        </table>

    </body>
</html>