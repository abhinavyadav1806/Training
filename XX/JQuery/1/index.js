var array=[];

$(document).ready(function(){

    $('#add_product').click(function(){

        if (validate())
        {
            fetchvalue();
            var div;
                for(i=array.length-1; i<=array.length-1; i++)
                {
                    // console.log(array[i])
                    div+="<tr sku='"+array[i].product_sku+"' name='"+array[i].product_name+"' price='"+array[i].product_price+"' quantity='"+array[i].product_quantity+"'>\
                    <td>"+array[i].product_sku+"</td>\
                    <td>"+array[i].product_name+"</td>\
                    <td>"+array[i].product_price+"</td>\
                    <td>"+array[i].product_quantity+"</td>\
                    <td><a href='#' class='edit'>Edit</a> <a href='#' class='delete'>Delete</a></td>";
                }
            $('#table').append(div);
        }
        
    });


    $('#table').on('click', '.delete', function(){

        $(".error").hide();  
        $(".success").hide();  

        if (confirm('Are you sure to delete this record ?')) 
        {
            var row = $(this).closest('tr');
            row.remove();
            alert('Product is deleted!!!');
        }
    });


    $('#table').on("click", ".edit", function () 
    {   
        $(".error").hide();
        $(".success").show();
        $("#btnUpdate").show(); 
        $("#add_product").hide();

        $("#product_sku").val($(this).parents("tr").attr("sku"));
        $("#product_name").val($(this).parents("tr").attr("name"));
        $("#product_price").val($(this).parents("tr").attr("price"));
        $("#product_quantity").val($(this).parents("tr").attr("quantity"));        
    });


    $('#btnUpdate').click(function()
    {
        product_sku = $("#product_sku").val();
        product_name = $("#product_name").val();
        product_price = $("#product_price").val();
        product_quantity = $("#product_quantity").val();

        if (validate())
        {            
            for (var i=0; i < array.length; i++)
            {
                if(product_sku == array[i].product_sku)
                {
                    array[i].product_name = $("#product_name").val();
                    array[i].product_price = $("#product_price").val();
                    array[i].product_quantity = $("#product_quantity").val();
                }
            }

            
            var div = "";
            for(var i=0; i<=array.length-1; i++)
            {
                // console.log(array[i])
                div+="<tr sku='"+array[i].product_sku+"' name='"+array[i].product_name+"' price='"+array[i].product_price+"' quantity='"+array[i].product_quantity+"'>\
                <td>"+array[i].product_sku+"</td>\
                <td>"+array[i].product_name+"</td>\
                <td>"+array[i].product_price+"</td>\
                <td>"+array[i].product_quantity+"</td>\
                <td><a href='#' class='edit'>Edit</a> <a href='#' class='delete'>Delete</a></td>";
            }

              
            $("tr:eq(1)").remove();
            $('#table').append(div);

            $("#btnUpdate").hide(); 
            $("#add_product").show();
            $(".success").show();
        }
    });
});

function fetchvalue()
{
    var product_sku = $('#product_sku').val();
    var product_name = $('#product_name').val();
    var product_price = $('#product_price').val();
    var product_quantity = $('#product_quantity').val();

    var product =
    {
        product_sku,
        product_name,
        product_price,
        product_quantity
    }

    array.push(product);
}

function validate()
{   
    var pattern=/^[0-9]+$/;
    var pattern_string = /^[a-zA-Z]+$/;

    var product_sku = $("#product_sku").val().trim();
    var product_name = $("#product_name").val().trim();
    var product_price = $("#product_price").val().trim();
    var product_quantity = $("#product_quantity").val().trim();

    if (product_sku == "" || product_name == "" || product_price == "" || product_quantity == "" )
    {  
        $("#product_sku").css("border"," 2px solid red");
        $("#product_name").css("border"," 2px solid red");
        $("#product_price").css("border"," 2px solid red");
        $("#product_quantity").css("border"," 2px solid red");
            //console.log("Product SKU cannot be empty");
            return false;
    }
    else if(!pattern.test(product_sku) || !pattern.test(product_price) || !pattern.test(product_quantity))
    {        
        $("#product_sku").css("border"," 2px solid red");
        $("#product_price").css("border"," 2px solid red");
        $("#product_quantity").css("border"," 2px solid red");
        //console.log("Product SKU should be integer");
        return false;
    }
    else if(!pattern_string.test(product_name))
    {        
        $("#product_name").css("border"," 2px solid red");
        //console.log("Product SKU should be integer");
        return false;
    }
    $(".success").hide();
    return true;        
}   