<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Conversion</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/convert.css">
</head>
<body>
    <?php
         $number = "";
         $fromUnit = "";
         $toUnit = "";
         const TEMPERATURE_TO_CELSIUS = array(
            "kelvin"=>1,
            "farenheit"=>2,
            "celsius"=>3
         );
    ?>
    <?php
            if(isset($_POST['submit'])){
                $number = $_POST['number'];
                $fromUnit = $_POST['fromUnit'];

            }
            // echo "$fromUnit" . "  " . "$toUnit";
    ?>
    
    <div class="container conv">
        <h3>Temperature Converter</h3>
        <form  method = "post">
            <div class="main-box">
                <div class="input-number">
                    
                    <input type="text" id= "input-number" name="number" value="<?php echo"$number" ?>" placeholder="Enter number">
                </div>
                <div class="select-from">
                    <label for="fromUnit"> Convert From</label>
                    <select name="fromUnit" id="">
                        <option value="kelvin">Kelvin</option>
                        <option value="farenheit">Farenhiet</option>
                        <option value="celsius">Celsius</option>
                    </select>

                </div>
            </div>
            <br>
            <div class="container submit-temp">

                <input type="submit" name="submit" value="Get Results">
            </div>
        </form>

    </div>
    <div class="container ">
        
        <?php
            if (isset($_POST['submit'])){
                echo "<div class='results '>";
                echo "<h3>Result</h3>";
                $option = TEMPERATURE_TO_CELSIUS[$fromUnit];
                switch($option){
                    case 1:{
                        $celsius = $number -273.15;
                        $farenheit = ($number*9/5) -459.67;
                        echo "$number $fromUnit is $celsius degree celsius and $farenheit F";
                        break;
                    }
                    case 2:{
                        $celsius = (($number-32)*5)/9;
                        $kelvin = (($number+459.67)*5)/9;
                        echo "$number $fromUnit is $celsius degree celsius and $kelvin K ";
                        break;
                    }
                    case 3:{
                        $farenheit = (($number*9)/5)+32;
                        $kelvin = $number +273.15;
                        echo "$number $fromUnit is $farenheit F and $kelvin K ";
                        break;
                    }
                    default:
                        echo"Incorrect option";
                        
                }
                echo "</div>";
            }
 
    ?>
    </div>
    <div class="container">
        <div class="backlink">
            <a href="index.php" class="goBack">Click here to go back</a>
        </div>

    </div>
</body>
</html>