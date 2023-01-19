<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Length Conversion</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/convert.css">
</head>
<body>
    <?php
         $number = "";
         $fromUnit = "";
         $toUnit = "";
         const LENGHT_TO_METER = array(
            "inches" => 0.0254,
            "foot" => 0.3048,
            "yards" => 0.9144,
            "miles" => 1609.344,
            "millimeters" => 0.001,
            "centimeters" => 0.01,
            "meters" => 1,
            "kilometers" => 1000,
         );
    ?>
    <?php
            if(isset($_POST['submit'])){
                $number = $_POST['number'];
                $fromUnit = $_POST['fromUnit'];
                $toUnit = $_POST['toUnit'];

                $result = ConvertLength($number,$fromUnit,$toUnit);
            }
            // echo "$fromUnit" . "  " . "$toUnit";
    ?>
    <?php

    function convertToMeter($number,$fromUnit){
        $meterLength = $number * LENGHT_TO_METER[$fromUnit];
        // echo $meterLength;
        return $meterLength;
    }
    function convertFromMeter($number,$toUnit){
        $requiredLength = $number/LENGHT_TO_METER[$toUnit];
        // echo $requiredLength;
        return $requiredLength;
    }
    function ConvertLength($number,$fromUnit,$toUnit){
        $a = convertToMeter($number,$fromUnit);
        $b = convertFromMeter($a,$toUnit);
        // echo $b;
        return $b;
    }
    ?>
        
        
        <div class="container conv ">
        <h2>Length Converter</h2>
        <form  method = "post">

            <div class="main-box">
                    <div class="input-number">
                        <input type="number" name="number" value="<?php echo"$number" ?>" class="input-box" placeholder="Enter number">
                    </div>
      

                    <div class="select-units">
                        <div class="select-from">
                            <label for="fromUnit"> Convert From</label>
                            <select name="fromUnit" id="">
                                <option value="millimeters">millimeter</option>
                                <option value="centimeters">centimeter</option>
                                <option value="meters">meter</option>
                                <option value="kilometers">kilometer</option>
                                <option value="inches">Inch</option>
                                <option value="yards">Yard</option>
                                <option value="foot">Foot</option>
                                <option value="miles">Mile</option>
                            </select>

                        </div>
                        <div class="select-to">
                            <label for="toUnit"> Convert to</label>
                            <select name="toUnit">
                                <option value="millimeters">millimeter</option>
                                <option value="centimeters">centimeter</option>
                                <option value="meters">meter</option>
                                <option value="kilometers">kilometer</option>
                                <option value="inches">Inch</option>
                                <option value="yards">Yard</option>
                                <option value="foot">Foot</option>
                                <option value="miles">Mile</option>
                            </select>

                        </div>
                        <input type="submit" name="submit" value="Get Results" class="submit">

                    </div> 
            </div>
                  
        </form>
    </div>
    <div class="container ">
        <?php
                if(isset($_POST['submit'])){
                    echo "<div class='results'>";
                    echo "<h3>Result</h3>";
                    echo "<p> &nbsp  $number $fromUnit is $result $toUnit</p>";
                    echo "</div>";
                }
            ?>
     
     <br>
     
    </div>
    <div class="container">
        <div class="backlink">
            <a href="index.php" class="goBack">Click here to go back</a>
        </div>

    </div>
</body>
</html>