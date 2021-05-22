<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "user", "password", "db");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_REQUEST["term"])){
    // Prepare a select statement DONT FORGET TO UPDATE YOUR TABLE NAME AND REMOVE THE BRACKETS
    $sql = "SELECT * FROM [INSERT TABLE NAME HERE] WHERE sn LIKE ?";


    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);

        // Set parameters
        $param_term = $_REQUEST["term"] . '%';

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                
				echo "<table>";
				echo "<tr>";
                echo "<th>store</th>";
                echo "<th>sn</th>";
                echo "<th>fault</th>";
                echo "<th>date</th>";
				echo "</tr>";
        while($row = mysqli_fetch_array($result)){
				echo "<tr>";
                echo "<td>" . $row['store'] . "</td>";
                echo "<td>" . $row['sn'] . "</td>";
                echo "<td>" . $row['fault'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
				echo "</tr>";
        }
        echo "</table>";

	       }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// close connection
mysqli_close($link);
?>
