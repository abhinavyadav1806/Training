<?php
    include "../config.php";
   
    $query = mysqli_query($connect, "SELECT * FROM data");

    echo '<h2> List of all the Users in Database </h2>
        <table id="table" border="2">
        <tr>
        <th>ID</th>
        <th>ROLE</th>
        <th>USERNAME</th>
        <th>PASSWORD</th>
        <th>EMAIL</th>
        <th>Action</th>
        </tr>';

        // while($row = mysqli_fetch_array($query)) 
        foreach($query as $row)
        {
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['role'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>";
                    echo "<a href='edituser.php?id=". $row['id'] ."'>EDIT</a> &nbsp";
                    echo "<a href='deleteuser.php?id=". $row['id'] ."'>DELETE</a> &nbsp";
                echo "</td>";
            echo "</tr>";
        }
    echo '</table>';
?>