<?php

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

?>
