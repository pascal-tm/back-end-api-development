<?php

    try {
        
        $result = null;

        $db = createSqliteDbConnection('example-database.sqlite');

        $allUsers = fetchResultForQuery(
            $db, 
            "SELECT * FROM users"
        );

        $firstUser = fetchResultForQuery(
            $db, 
            "SELECT name, email FROM users LIMIT 1"
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


    function fetchResultForQuery($db, $query)
    {
        $result = array();

        $preparedStatement = $db->prepare($query);

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

        <h1>Databases: connection and retrieval</h1>

        <h2>Getting all users from a users database table</h2>

        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
            </tr>
            <?php foreach($allUsers as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
            </tr>

            <?php endforeach ?>
        </table>
        
        <p>dump of the <code>$allUsers</code> array:</p>
        <pre><?php print_r($allUsers) ?></pre>
        
        <h2>Getting the first user from a users database table</h2>

        <p>name: <?= $firstUser[0]['name'] ?>, email: <?= $firstUser[0]['email'] ?></p>

    </body>
</html>