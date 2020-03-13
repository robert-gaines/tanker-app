
<?php

    include('dbconnect.php');

    echo "DB Build Script"."<br>"."--------------------"."<br>";

    /* TABLE INVENTORY */

    /*
      -> ACFT_DATA
      -> USERS
      -> WRDCO
      -> TRANSACTIONS
      -> MISSION_DATA
    */

    /* Query creates a table to contain all of the aircraft data */

    $create_acft_data = "CREATE TABLE ACFT_DATA (
                                                        ACFT_ID INT(12) AUTO_INCREMENT,
                                                        ACFT_COUNTRY VARCHAR(256),
                                                        ACFT_TYPE VARCHAR(256),
                                                        TAILNUMBER VARCHAR(256),
                                                        UNIT VARCHAR(256),
                                                        CMD VARCHAR(256),
                                                        DODAAC VARCHAR(256),
                                                        LOCATION VARCHAR(256),
                                                        PRIMARY KEY (ACFT_ID)
                                                ) ";

    /* Query creates a table for all users */

    $create_user_data = "CREATE TABLE USERS (
                                                        USER_ID INT(6) AUTO_INCREMENT,
                                                        USER_FIRST VARCHAR(256),
                                                        USER_LAST VARCHAR(256),
                                                        USER_RANK VARCHAR(256),
                                                        USER_NAME VARCHAR(256),
                                                        DESCRIPTION VARCHAR(256),
                                                        ISADMIN VARCHAR(256),
                                                        IS_BOOM VARCHAR(256),
                                                        USER_PASS VARCHAR(256),
                                                        IS_INACTIVE VARCHAR(256),
                                                        PRIMARY KEY(USER_ID),
                                                        UNIQUE KEY UNIQUE_USER_NAME (USER_NAME)
                                            ) ";

    /* Query creates a table which will list all of the WRDCO's  */

    $create_wrdco_data = "CREATE TABLE WRDCO (
                                                        WRDCO_ID INT(6) AUTO_INCREMENT,
                                                        UNIT VARCHAR(256),
                                                        LOCATION VARCHAR(256),
                                                        CMD VARCHAR(256),
                                                        WRDCO VARCHAR(256),
                                                        DSN VARCHAR(256),
                                                        COMMERCIAL VARCHAR(256),
                                                        EMAIL VARCHAR(256),
                                                        PRIMARY KEY (WRDCO_ID)
                                             )";

    /* Query creates a table for the data associated with transaction entry */

    $create_transaction_data = "CREATE TABLE TRANSACTIONS (
                                                        TRANSACTION_ID INT(24) AUTO_INCREMENT,
                                                        MISSION_NUMBER VARCHAR(256),
                                                        JETTISON BOOLEAN,
                                                        TAIL_NUMBER VARCHAR(256),
                                                        BRANCH VARCHAR(256),
                                                        ACFT_TYPE VARCHAR(256),
                                                        UNIT VARCHAR(256),
                                                        DODAAC VARCHAR(256),
                                                        COMMAND VARCHAR(256),
                                                        CALLSIGN VARCHAR(256),
                                                        POUNDS_DELIVERED FLOAT,
                                                        TOTAL_GALLONS FLOAT,
                                                        FMS_COUNTRY VARCHAR(256),
                                                        PRIMARY KEY(TRANSACTION_ID)
                                                      )";

    /* Query creates a table for the data associated with each mission */

    $create_mission_data = "CREATE TABLE MISSION_DATA (
                                                        MISSION_NUMBER VARCHAR(256),
                                                        TAIL_NUMBER VARCHAR(256),
                                                        UNIT VARCHAR(256),
                                                        HOME_STATION VARCHAR(256),
                                                        COMMAND VARCHAR(256),
                                                        BOOM_OPERATOR VARCHAR(256),
                                                        TRANSACTION_DATE VARCHAR(256),
                                                        JULIAN_DATE VARCHAR(256),
                                                        FUEL_TYPE VARCHAR(256),
                                                        PRIMARY KEY(MISSION_NUMBER)
                                                      )";

    /* Query creates a table for application session data */

    $create_access_data = "CREATE TABLE ACCESS_DATA (
                                                      SESSION_ID INT(24) AUTO_INCREMENT,
                                                      USER_NAME VARCHAR(256),
                                                      USER_IP VARCHAR(256),
                                                      SESSION_DATE VARCHAR(256),
                                                      SESSION_TIME VARCHAR(256),
                                                      PRIMARY KEY(SESSION_ID)
                                                    )";

    /* Array comprises all of the SQL Table Creation queries  */

    $queries = array(
                      $create_acft_data,
                      $create_user_data,
                      $create_wrdco_data,
                      $create_transaction_data,
                      $create_mission_data,
                      $create_access_data
                    );

    for($i = 0; $i < count($queries); $i++)
    {
      echo "[+] Sending: "." ".$queries[$i]." <br><br>";
      $query = $queries[$i];
      $tx_query = mysqli_query($conn,$query);
      if($tx_query)
      {
        echo "[*] Query Transmitted Successfully "."<br>";
      }
      else
      {
        echo "[!] Failed to send transmission "."<br>";
        echo "[!] Error: ".mysqli_error($conn);
      }
    }

 ?>
