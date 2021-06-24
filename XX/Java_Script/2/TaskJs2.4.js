var array=[];

function addProduct()
{
    var proid=document.getElementById('pid').value;
    var proname=document.getElementById('pname').value;
    var proprice=document.getElementById('pprice').value;
    
    var product={};
    product.productid=proid;
    product.productname=proname;
    product.productprice=proprice;

    array.push(product);
    display();

    //For UNIQUE ID
    if(i>0) 
    {
        for(var x =0; x <=array.length-2; x++) 
        {
            if(product.productid==array[x].productid)
            {
                array.splice(array.length-1, 1);
                alert("PLEASE CHECK YOUR PRODUCT ID, should be UNIQUE");
            }
    
        }
        display();
    }

}


function display()
{
    var div="<table id='table' border='0px' style=' border-spacing: 0px; padding:20px;'>";
    div+="<th style='padding:20px;'><b>Product Id</b></th>  <th style='padding:20px;'><b>Product Name </b></th>  <th style='padding:20px;'><b>Product Price</b></th>  <th style='padding:20px;'><b>Action</b></th>";
    
    for(i =0; i <=array.length-1; i++)
    {
        div+="<tr  style='padding:10px;'>";
        div+="<td  style='padding:10px;'>"+array[i].productid+"</td>";
        div+="<td  style='padding:10px;'>"+array[i].productname+"</td>";
        div+="<td  style='padding:10px;'>"+array[i].productprice+"</td>";
        div+="<td><button onclick='ClickDelete("+i+")'>delete</button></td>";
        div+="<td><button onclick='updateRow("+i+")'>Update</button></td>";

    }
    document.getElementById("result").innerHTML = div;       
}


function ClickDelete(i) 
{
    array.splice(i,1);
    display();
}


function click_UpdateProduct() 
{
    var productidx=document.getElementById('pid').value;
    var productnamex=document.getElementById('pname').value;
    var productpricex=document.getElementById('pprice').value;

    document.getElementById("pid").readonly = true;
                
    var productx={};
    productx.productidx=productidx;
    productx.productnamex=productnamex;
    productx.productpricex=productpricex;

    for(z=0; z<=array.length-1; z++)
    {
        if(productx.productidx==array[z].productid) 
        {
            array[z].productid=productx.productidx;
            array[z].productname=productx.productnamex;
            array[z].productprice=productx.productpricex;
        }
    }

    display();

    document.getElementById('buttonAdd').style.visibility="visible";
    document.getElementById('buttonUpdate').style.visibility="hidden";

}


function updateRow(i)
{
    document.getElementById('pid').value = array[i].productid;
    document.getElementById('pname').value = array[i].productname;
    document.getElementById('pprice').value = array[i].productprice;

    document.getElementById("buttonAdd").style.visibility = "hidden";
    document.getElementById('buttonUpdate').style.visibility="visible";
}


