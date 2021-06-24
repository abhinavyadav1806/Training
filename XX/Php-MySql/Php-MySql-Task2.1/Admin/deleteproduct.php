<?php
    include "../config.php";

    $query = "SELECT * FROM product";
    $result = mysqli_query($connect,$query);
        
    if($result->num_rows>0)
    {
        while($row=mysqli_fetch_array($result))
        {   
            $id = $_GET['id'];
            if($row['id'] == $_GET['id'])
            {
                $sql = "DELETE FROM product WHERE id = $id";
                $result = mysqli_query($connect,$sql);
                header("Location: manageproducts.php");
            }
        }
    }
?>