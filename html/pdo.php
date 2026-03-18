<?php
try {
    // Create connection
    // Note: as of PHP 8.0.0, PDO::ERRMODE_EXCEPTION is the default mode
    $dsn = "mysql:host=db;port=3306;dbname=blogdb;charset=utf8mb4";
    $conn = new PDO($dsn, 'blog', '1234', 
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Print server version
    echo "Server version: {$conn->getAttribute(PDO::ATTR_SERVER_VERSION)}\n";
    
    // Create table if not existing
    $sql = "CREATE TABLE IF NOT EXISTS tbl (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            num INT,
            flt FLOAT,
            active BOOLEAN
    )";
    $conn->exec($sql);

    // Insert
    $sql = "INSERT INTO tbl (name, num, flt, active) 
            VALUES ('val1', 1, 3.1415, TRUE), 
                   ('val2', 2, 1.5, FALSE)";
    $count = $conn->exec($sql);
    var_dump($count);

    // Insert with prepared statements
    $sql = "INSERT INTO tbl (name, num, flt, active)
            VALUES (:name, :num, :flt, :active)";
    $res = $conn->prepare($sql);
    $res->bindValue(':name', null, PDO::PARAM_NULL);
    $res->bindValue(':num', 12, PDO::PARAM_INT);
    $res->bindValue(':flt', 3.1415);
    $res->bindValue(':active', false, PDO::PARAM_BOOL);
    $res->execute();
    echo "<pre>";
    $res->debugDumpParams();
    echo "</pre>";

    // Select with prepared statements
    $sql = "SELECT * FROM tbl 
            WHERE id < ? OR name = ? 
            LIMIT ?";
    $res = $conn->prepare($sql);
    $res->bindValue(1, 4, PDO::PARAM_INT);
    $res->bindValue(2, 'val2');
    $res->bindValue(3, 5, PDO::PARAM_INT);
    $res->execute();
    echo "<pre>";
    $res->debugDumpParams();
    echo "</pre>";
    var_dump($res->fetchAll(PDO::FETCH_ASSOC));
}
catch (Throwable $e) {
    die("PDO failed: {$e->getMessage()}\n");
}
