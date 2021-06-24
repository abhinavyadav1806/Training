<?php $products = array(
"Electronics" => array
(
"Television" => array
(
array(
"id" => "PR001", 
"name" => "MAX-001",
"brand" => "Samsung"
),
array(
"id" => "PR002", 
"name" => "BIG-301",
"brand" => "Bravia"
),
array(
"id" => "PR003", 
"name" => "APL-02",
"brand" => "Apple"
)
),

"Mobile" => array
(
array(
"id" => "PR004", 
"name" => "GT-1980",
"brand" => "Samsung"
),
array(
"id" => "PR005", 
"name" => "IG-5467",
"brand" => "Motorola"
),
array(
"id" => "PR006", 
"name" => "IP-8930",
"brand" => "Apple"
)
)
),

"Jewellary" => array
(
"Earrings" => array
(
array(
"id" => "PR007", 
"name" => "ER-001",
"brand" => "Chopard"
),
array(
"id" => "PR008", 
"name" => "ER-002",
"brand" => "Mikimoto"
),
array(
"id" => "PR009", 
"name" => "ER-003",
"brand" => "Bvlgari"
)
),
"Necklaces" => array
(
array(
"id" => "PR010", 
"name" => "NK-001",
"brand" => "Piaget"
),
array(
"id" => "PR011", 
"name" => "NK-002",
"brand" => "Graff"
),
array(
"id" => "PR012", 
"name" => "NK-003",
"brand" => "Tiffany"
)
)
)
)
?>

<?php

//TASK 1
echo ("<h3> List all products </h3>");
echo '<table id="table">
<tr>
<th>Category</th>
<th>Subcategory</th>
<th>ID</th>
<th>NAME</th>
<th>BRAND</th>
</tr>';

foreach($products as $key1 => $value1)
{
foreach($value1 as $key2 => $value2)
{
foreach($value2 as $key3 => $value3)
{
echo '<tr>';
echo '<td>' .$key1 .'</td>';
echo '<td>' .$key2 .'</td>';  
echo '<td>' .$value3['id'] .'</td>'; 
echo '<td>' .$value3['name'] .'</td>'; 
echo '<td>' .$value3['brand'] .'</td>'; 
}
}
}
echo '</table>';


//TASK 2
echo ('<h3> List all products in Mobile subcategory </h3>');
echo '<table id="table">
<tr>
<th>Category</th>
<th>Subcategory</th>
<th>ID</th>
<th>NAME</th>
<th>BRAND</th>
</tr>';

foreach($products as $key1 => $value1)
{
foreach($value1 as $key2 => $value2)
{
foreach($value2 as $key3 => $value3)
{
if($key1 == "Electronics" && $key2 == "Mobile")
{
echo '<tr>';
echo '<td>' .$key1 .'</td>';
echo '<td>' .$key2 .'</td>';  
echo '<td>' .$value3['id'] .'</td>'; 
echo '<td>' .$value3['name'] .'</td>'; 
echo '<td>' .$value3['brand'] .'</td>';
} 
}
}
}
echo '</table>';


//TASK 3
echo ('<h3> List all products with their id, name, subcategory and category with brand name = "Samsung" </h3>');
echo '<table id="table">';
foreach($products as $key1 => $value1)
{
foreach($value1 as $key2 => $value2)
{
foreach($value2 as $key3 => $value3)
{
if($key1 == "Electronics" && $key2 == "Television" && $value3["brand"] == "Samsung")
{
echo "<tr> <td> CATEGORY:   ".$key1;
echo "<tr> <td> SUBCATEGORY:    ".$key2;
echo "<tr> <td> PRODUCT ID:   ".$value3["id"];
echo "<tr> <td> PRODUCT NAME:    ".$value3["name"];
echo "</tr>";
}

if($key1 == "Electronics" && $key2 == "Mobile" && $value3["brand"] == "Samsung")
{	
echo "<tr> <td> CATEGORY:   ".$key1;
echo "<tr> <td> SUBCATEGORY:    ".$key2;
echo "<tr> <td> PRODUCT ID:   ".$value3["id"];
echo "<tr> <td> PRODUCT NAME:    ".$value3["name"];
echo "</tr>";
} 
}
}
}
echo '</table>';


//TASK 4 and 5
echo ("<h3> Delete product with id = PR003___&&___Update product name ='BIG-555' with id = PR002. </h3>");
echo '<table id="table">
<tr>
<th>Category</th>
<th>Subcategory</th>
<th>ID</th>
<th>NAME</th>
<th>BRAND</th>
</tr>';

foreach($products as $key1 => $value1)
{
foreach($value1 as $key2 => $value2)
{
foreach($value2 as $key3 => $value3)
{
if($key1 == "Electronics" && $key2 == "Television" && $value3["id"] == "PR002")
{
$update_Pname = str_replace("BIG-301", "BIG-555", $value3['name']);
echo '<tr id="'.$value3['id'].'">';
echo '<td>' .$key1 .'</td>';
echo '<td>' .$key2 .'</td>';  
echo '<td>' .$value3['id'] .'</td>'; 
echo '<td>' .$update_Pname .'</td>'; 
echo '<td>' .$value3['brand'] .'</td>'; 
}

else if($value3["id"] != "PR003")
                {
                 echo '<tr id="'.$value3['id'].'">';
                 echo '<td>' .$key1 .'</td>';
                 echo '<td>' .$key2 .'</td>';  
                 echo '<td>' .$value3['id'] .'</td>'; 
                 echo '<td>' .$value3['name'] .'</td>'; 
                 echo '<td>' .$value3['brand'] .'</td>';
}

        }
    }
}
echo '</table>';



?>


<html>
<head>
<title>Php_Task</title>
<link rel="stylesheet" href="Task1.css">
</head>

<body></body>

</html>