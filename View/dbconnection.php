<?php

// $test = phpinfo();
// echo $test;

function OpenConnection()
    {
        $dbServerName = "universitycsdbnstavr04.database.windows.net";
        $connectionOptions = array("Database" => "epl343ProjectTeam2",
                    "UID" => "nstavr04",
                    "PWD" => "admin1234!");
        $conn = sqlsrv_connect($dbServerName, $connectionOptions);
        if($conn == false)
            echo "Connection was unsuccessful";

        return $conn;
    };

    function ReadData()
    {
        try
        {
            $conn = OpenConnection();
            $tsql = "SELECT [FirstName] FROM dbo.Clients";
            $getProducts = sqlsrv_query($conn, $tsql);
            if ($getProducts == FALSE)
                echo "Error getting data";
            $productCount = 0;
            while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
            {
                echo($row['FirstName']);
                echo("<br/>");
                $productCount++;
            }
            sqlsrv_free_stmt($getProducts);
            sqlsrv_close($conn);
        }
        catch(Exception $e)
        {
            echo("Error!");
        }
    }

ReadData()


?>
