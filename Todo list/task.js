var array=[];
var completedarray=[];

function addTask()
{
    var add = document.getElementById('addtask').value;

    var addobject=
    {
        add
    };
    
    array.push(addobject);
    display();
}

function display()
{
    var div="";

    for(i=0; i<=array.length-1; i++)
    {
        div+="<ul>\
        <li><input type='checkbox' id='checkbox"+i+"' onclick='pushtocomplete("+i+")'>\
        "+array[i].add+"\
        <input type='text' id='alpha_"+i+"'>\
        <button onclick=ClickDelete("+i+","+'array'+")>delete</button>\
        <button id='btnedit' onclick='editrow("+i+")'>Edit</button> <button id='btnupdate' onclick='update("+i+")'>Update</button></li></ul>";
    }
    document.getElementById("todo").innerHTML = div;       
}

function ClickDelete(i,a)
{
    a.splice(i,1);
    if(a==array)
    {
        display();
    }
    else if(a==completedarray)
    {
        displaycomplete();
    }
}

function editrow(i)
{
    document.getElementById("alpha_"+i).value = array[i].add;
}

function update(i)
{
    var add=document.getElementById("alpha_"+i).value;

    var addobjectx=
    {
        add
    };

    array[i]=addobjectx;
    display();
}

function pushtocomplete(i)
{
    var add = array[i];

    completedarray.push(add);
    ClickDelete(i,array);

    displaycomplete();

}

function displaycomplete()
{
    var div="";
    for(i=0; i<=completedarray.length-1; i++)
    {
        div+="<ul>\
        <li><input type='checkbox' checked id='checkbox"+i+"' onclick='pushto_todo("+i+")' >\
        "+completedarray[i].add+"\
        <input type='text' id='completed_"+i+"'>\
        <button onclick=ClickDelete("+i+","+'completedarray'+")>delete</button>\
        <button id='btnedit' onclick='editrow_update("+i+")'>Edit</button> <button id='btnupdate' onclick='update_completed("+i+")'>Update</button></li></ul>";
    }
    document.getElementById("completed").innerHTML = div;
}

function pushto_todo(i)
{
    var add = completedarray[i];
    array.push(add);
    
    ClickDelete(i,completedarray);
    display();
}

function editrow_update(i)
{
    document.getElementById("completed_"+i).value = completedarray[i].add;
}

function update_completed(i)
{
    var add=document.getElementById("completed_"+i).value;

    var addobjectcomplete=
    {
        add
    };

    completedarray[i]=addobjectcomplete;
    displaycomplete();
}