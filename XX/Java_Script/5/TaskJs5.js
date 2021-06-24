function calculate()
{
    var num1 = document.getElementById("num1").value;
    var num2 = document.getElementById("num2").value;
    var num3 = num1*num2;
    var num4 = 2 * num1 + 2 * num2;

    document.getElementById("result").innerHTML = "Area is" +num3+ "sq. mtr <br><br>";

    document.getElementById("result1").innerHTML = "Perimeter is" +num4+ "sq. mtr";
}