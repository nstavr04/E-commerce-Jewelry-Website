<?php

// $test = phpinfo();
// echo $test;

// function OpenConnection()
//    {
        $dbServerName = "universitycsdbnstavr04.database.windows.net";
        $connectionOptions = array("Database" => "epl343ProjectTeam2",
                    "UID" => "Project343",
                    "PWD" => "Team2!343");
        $conn = sqlsrv_connect($dbServerName, $connectionOptions);
        if($conn == false)
            echo "Connection was unsuccessful";

            $_SESSION["serverName"] = "universitycsdbnstavr04.database.windows.net";
            $_SESSION["connectionOptions"] = array(
                "Database" => "epl343ProjectTeam2",
                "UID" => "Project343",
                "PWD" => "Team2!343"
            );
            // $conn = sqlsrv_connect($dbServerName, $connectionOptions);

            $_SESSION["conn"]=$conn;

    //     return $conn;
    // };

    

    // function ReadData()
    // {
    //     try
    //     {
    //         $conn = OpenConnection();
    //         $tsql = "SELECT [FirstName] FROM dbo.Clients";
    //         $getProducts = sqlsrv_query($conn, $tsql);
    //         if ($getProducts == FALSE)
    //             echo "Error getting data";
    //         $productCount = 0;
    //         while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
    //         {
    //             echo($row['FirstName']);
    //             echo("<br/>");
    //             $productCount++;
    //         }
    //         sqlsrv_free_stmt($getProducts);
    //         sqlsrv_close($conn);
    //     }
    //     catch(Exception $e)
    //     {
    //         echo("Error!");
    //     }
    // }

    //ReadData()

?>
