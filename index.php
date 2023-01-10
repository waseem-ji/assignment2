<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
/* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
    .error{
        color:red;
    }
    </style>
    <title>Assignment 2</title>
</head>
<body>
    <form name="calculator" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <table width="400"  cellspacing="1" cellpadding="1">
            <tr>
                <td>Calculator</td>
                <td><input type="number" name="number1"></td>
                <td><input type="number" name="number2"></td>
            </tr>
            <br>
            <tr>
                <td><input type="submit" name="calculate" value="ADD"> </td>
                <td><input type="submit" name="calculate" value="SUB"></td>                
                <td><input type="submit" name="calculate" value="MUL"></td>
                <td><input type="submit" name="calculate" value="DIV"></td>
            </tr>
            <!-- <tr>
                <td><input type="number" name="number1"></td>
            </tr> -->
            <tr>
                <td><input type="submit" name="calculate" value="Square"></td>
                <td><input type="submit" name="calculate" value="SquareRoot"></td>
            </tr>
        </table>

    </form>
    <?php
    $number1 = $number2 = $result = 0;
    $operator = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["number1"]) && empty($_POST["number2"])){
            echo "<span class=\"error\">Error: Please enter both numbers </span>";
            // how does 0 constitute as empty?
        }
        $number1 = $_POST["number1"];
        $number2 = $_POST["number2"];
        $operator = $_POST["calculate"];
    }
    ?>
    <?php
        // echo "<h3>Value Entered</h3>";
        // echo $number;
        // echo $operator;
        switch($operator){
            case("ADD"):
                $result = $number1 + $number2;
                echo "Sum = " . $result;
                break;
            case("SUB"):
                $result = $number1 - $number2;
                echo "Difference = " .$result;
                break;
            case("MUL"):
                $result = $number1 * $number2;
                echo "Product = " . $result;
                break;
            case("DIV"):
                if ($_POST["number2"] == 0){
                    echo"<span class=\"error\"> Error : Cannot divide by zero</span. ";
                }
                $result= $number1/$number2;
                echo " Division = " . $result;
                break;
            case("Square"):
                $result = $number1 **2;
                echo "Square = " . $result;
                break;
            case("SquareRoot"):
                $result = $number1**0.5;
                echo "Sqaure root = " . $result;
            default:
                echo "Enter two numbers";
                
        }
    ?>
    <hr>
    <h4>Unit conversion</h4>
    <h5>Length conversion</h5>
    
</body>
</html>