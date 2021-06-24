var store =
[
    {id:101, name:"Product 101", price:150, image: "football.png"},
	{id:102, name:"Product 102", price:120, image: "tennis.png"},
	{id:103, name:"Product 103", price:90, image: "basketball.png"},
	{id:104, name:"Product 104", price:110, image: "table-tennis.png"},
    {id:105, name:"Product 105", price:80, image: "soccer.png"}
];

function Product()
{
    var display = "";
   
	for(var i=0; i<store.length;i++)
	{
		display +='<div id=" '+store[i].id+' " class="product">\
		<img src="images/'+store[i].image+' ">\
		<h3 class="title"><a href="#">'+store[i].name+'</a></h3>\
		<span>Price: $'+store[i].price+'</span>\
		<a class="add-to-cart" data-productid="'+store[i].id+'" data-productname="'+store[i].name+'" data-productprice="'+store[i].price+'" data-productimage="'+store[i].image+'" href="#">Add To Cart</a>\
		</div>';
	}

	$("#products").html(display);	
}

//Function to diplay GRAND SUM TOTAL of all the items.
function grandtotal()
{
	var totalprice = 0;
		$("#table tbody tr").each(function()
		{
			totalprice = totalprice + Number($(this).find("td").eq(5).html());
		});

	$("#grandtotal").html("<b> TOTAL AMOUNT IS: $ </b>" + totalprice);
}


$(document).ready(function()
{
    console.log("HELLO");
	Product();

	$("#products .add-to-cart").click(function(e){

		console.log("Add to cart");
		var productid = $(this).data(productid).productid;
		var productname = $(this).data(productname).productname;
		var productprice = $(this).data(productprice).productprice;
		var productimage = '<img src="images/'+$(this).data(productimage).productimage+'">';
		
		var quantityid = "quantity_"+productid;
		var totalid = "total_"+productid;
		var rowid = "row_"+productid;

		var precount = $("#table tbody #"+quantityid+"").html();
		var quantity = precount == undefined ? 1 : precount;

		//assumed that their is no prior item in the table.
		let isExists = false;
		
		var pname = $("#table tbody #"+rowid+"").find("td").eq(2).html();
		if(productname == pname)
		{
			quantity = Number(quantity) + 1;	
			isExists = true;			
		};		

		//Total of price and quantity
		var total = (productprice * quantity);

		if(isExists)
		{
			$("#table tbody #"+quantityid+"").html(quantity);		
			$("#table tbody #"+totalid+"").html(total);
		}
		else
		{
			var tabledata = "<tr id=" + rowid +" style='padding:20px;'> <td style='padding:20px;'>" +productimage+"</td> <td style='padding:20px;'>" + productid + "</td> <td style='padding:20px;'>" + productname + "</td> <td style='padding:20px;'>" + productprice + "</td> <td style='padding:20px;' id=quantity_" + productid +">" + quantity + "</td> <td style='padding:20px;' id=total_" + productid +">" +total+"</td>\
			<td> <a href='#' class='update'>Update</a> <a href='#' style='display:none' class='add'>Add</a> <a href='#' class='remove'>Remove</a></td> </tr>";
			
			$("#table tbody").append(tabledata);
		}

		grandtotal();
   });

   $('#table tbody').on('click', '.remove', function()
   {
		$(this).closest('tr').remove();
   });

   $('#table tbody').on('click', '.update', function()
   {	
	   	$('.update').hide();
		var  quantity = $(this).closest('tr').find("td").eq(4).html();
		$(this).closest('tr').find("td").eq(4).html("<input type='number' id='inputnumber' min='1' value=" + quantity +">");
		$('.add').show();
   });

   $('#table tbody').on('click', '.add', function()
   {	
		alert("add pressed");
		var quantity = $("#inputnumber").val();
		var productprice = $(this).closest('tr').find("td").eq(3).html();
		var productid = $(this).closest('tr').find("td").eq(1).html();
		var totalid = "total_"+productid;
		var total = (productprice * quantity);
		$(this).closest('tr').find("td").eq(4).html(quantity);
		$("#table tbody #"+totalid+"").html(total);	

		grandtotal();
   });

});

