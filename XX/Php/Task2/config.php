<?php

// common variables and constants.
global $cart;
global $products;
global $grandtotal;

    $products = array
    (

        array(
            'id' => "products-101",
            'image' => 'images/football.png',
            "name" => 'product 101',
            'price' => '150',
            'quantity'=> '1',
        ),

        array(
            'id' => "products-102",
            'image' => 'images/tennis.png',
            'name' => 'product 102',
            'price' => '120',
            'quantity'=> '1',
        ),

        array(
            'id' => "products-103",
            'image' => 'images/basketball.png',
            'name' => 'product 103',
            'price' => '90',
            'quantity'=> '1',
        ),

        array(
            'id' => "products-104",
            'image' => 'images/table-tennis.png',
            'name' => 'product 104',
            'price' => '110',
            'quantity'=> '1',
        ),

        array(
            'id' => "products-105",
            'image' => 'images/soccer.png',
            'name' => 'product 105',
            'price' => '80',
            'quantity'=> '1',
        )
    );

    // foreach ($products as $key => $value)
    // {
    //     echo ' <form id="' . $value['id'] . '" class="product">
    //     <img src="' . $value['image'] . '">
    //     <h3 class="title"><a href="#">' . $value['name'] . '</a></h3>
    //     <span>Price: ' . $value['price'] . '</span>
    //     <a class="add-to-cart" href="#">Add To Cart</a>
    //     </form>';
    // }

?>
