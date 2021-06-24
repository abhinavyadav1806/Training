function convert()
{

    var input = document.getElementById("input").value;
    console.log(input)
    var cho =document.getElementsByName("choice");

    if(cho[0].checked)
    {
        var m = input * 60;
        document.getElementById("result").innerHTML =+input+ "hour = " +m+"minute";
    
    }

    if(cho[1].checked)
    {   
        var s = input * 3600;
        document.getElementById("result").innerHTML = +input+ "hour = " +s+"second";

    }

    // if(document.getElementById("htm").checked)
    // {
    //     var m = input * 60;
    //     document.getElementById("result").innerHTML =+input+ "hour = " +m+"minute";
    // }

    // if(document.getElementById("hts").checked)
    // {
    //     var s = input * 3600;
    //     document.getElementById("result").innerHTML =+input+ "hour = " +s+"minute";
    // }
}