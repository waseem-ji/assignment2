<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Assignment 2</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="container">
        <header>
            <h3>Unit Conversion</h3>
            <nav class="navigation">
                <ul class="clearfix">
                    <li><a href="length.php">Length</a></li>
                    <li><a href="temperature.php">Temperature</a></li>
                    <li><a href="area.php">Area</a></li>
                    <li><a href="weight.php">Weight</a></li>
                    <li><a href="time.php">Time</a></li>
                </ul>
            </nav>
        </header>

    </div>
    <div class="container">
        <form name="calculator" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="Calc ">
            <h3>Simple calculator</h3>
            <div class="Calc__top clearfix">

            <div class="Calc__entry">
                <input type="number" placeholder="Number 1" class="number" name="number1">
                <input type="number" placeholder="Number 2" class="number" name="number2">
            </div>
            <div class="Calc__bop ">
                <input type="submit" name="calculate" value="ADD" class="Calc__basicOp op-btn"> 
                <input type="submit" name="calculate" value="SUB" class="Calc__basicOp op-btn">           
                <input type="submit" name="calculate" value="MUL" class="Calc__basicOp op-btn">
                <input type="submit" name="calculate" value="DIV" class="Calc__basicOp op-btn">
            </div>
        </div>
        <div class="Calc__bot">
            <div class="container Calc__aop">
                <input type="submit" name="calculate" value="Square" class="Calc__advOp op-btn">
                <input type="submit" name="calculate" value="SquareRoot" class="Calc__advOp op-btn">
            </div>
        </div>
        </form>
        <div class="output">
            <!-- Echo output -->
        </div>
        <?php
        // $number1 = $number2 = $result = 0;
        $operator = $output = "";
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
                    $output = "Sum = " . $result;
                    break;
                case("SUB"):
                    $result = $number1 - $number2;
                    $output =  "Difference = " .$result;
                    break;
                case("MUL"):
                    $result = $number1 * $number2;
                    $output = "Product = " . $result;
                    break;
                case("DIV"):
                    if ($_POST["number2"] == 0){
                        echo"<span class=\"error\"> Error : Cannot divide by zero</span. ";
                    }
                    $result= $number1/$number2;
                    $output = " Division = " . $result;
                    break;
                case("Square"):
                    if(!empty($_POST["number1"])){
                        $result = $number1 **2;
                        $output = "Square = " . $result;
                        break;
                    }
                    else{
                        $result = $number2 **2;
                        $output = "Square = " . $result;
                        break;
                    }
                case("SquareRoot"):
                    // $num = isset($_POST["number1"]) ? $_POST["number1"]:$_POST["number2"];
                    // $num = floatval($num);
                    // echo "num= $num";
                    // $result = $num **0.5;
                    // echo "Squareroot = " . $result;
                    // break;
                    if(!empty($_POST["number1"])){
                        $result = $number1 **0.5;
                        $output = "Square Root = " . $result;
                        break;
                    }
                    else{
                        $result = $number2 **0.5;
                        $output = "Square Root = " . $result;
                        break;
                    }
                default:
                    
                    break;
                    
            }
        ?>
        

        
    </div>
    <div class="container">
        <div class="result">
            <div class="result__box">
                <span>
                    <?php echo $output; ?>
                </span>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <p>Simple Calculator and unit converion page 2023 &copy</p>
        </div>
    </footer>
</body>
</html>