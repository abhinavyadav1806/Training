<?php
    include "../config.php";

    include "../config.php";

    $query = mysqli_query($connect, "SELECT * FROM product");

    echo '<h2> List of all the Product in Database </h2>
        <table id="table" border="2">
        <tr>
        <th>ID</th>
        <th>IMAGE</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>Action</th>
        </tr>';

    // while($row = mysqli_fetch_array($query)) 
    foreach($query as $row)
    {
    echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo '<td> <img src=" images/'.$row['image'].'"/> </td>';
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>";
            echo "<a href='editproduct.php?id=". $row['id'] ."'>EDIT</a> &nbsp";
            echo "<a href='deleteproduct.php?id=". $row['id'] ."'>DELETE</a> &nbsp";
        echo "</td>";
    echo "</tr>";
    }

    echo '</table>';
?>
