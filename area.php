<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Conversion</title>
</head>
<body>
    <?php
    $number = "";
    $fromUnit = "";
    $toUnit = "";
    $result ="";
    const AREA_TO_SQMETER = array(
        "square_millimeter" => 0.000001,
        "square_centimeter" => 0.0001,
        "square_meter" => 1,
        "square_kilometer" => 1000000,
        "acre" => 4046.8564224,
        "hectare" => 10000
    );
    ?>
    <?php
        if(isset($_POST['submit'])){
            $number = $_POST['number'];
            $fromUnit = $_POST['fromUnit'];
            $toUnit = $_POST['toUnit'];

            $result = ConvertArea($number,$fromUnit,$toUnit);
            
        }
    ?>
    <?php
        function ConvertToSQMeter ($number,$fromUnit){
            $sqmlength = $number * AREA_TO_SQMETER[$fromUnit];
            return $sqmlength;
        }

        function ConvertFromSQMeter ($number,$toUnit){
            $requiredArea = $number / AREA_TO_SQMETER[$toUnit];
            return $requiredArea; 
        }

        function ConvertArea($number,$fromUnit,$toUnit){
            $a = ConvertToSQMeter($number,$fromUnit);
            $b = ConvertFromSQMeter($number,$toUnit);
            return $b;
        }
    ?>
    <div>
        <h3>Area Converter</h3>
        <form method = "post">
            <div>
                <input type="text" name="number" value="<?php echo "$number"?>">
                <label for="fromUnit"> Convert From</label>
                <select name="fromUnit" id="">
                    <option value="square_kilometer">Sqaure Kilometer</option>
                    <option value="square_centimeter">Square Centimeter</option>
                    <option value="square_meter">Square Meter</option>
                    <option value="square_kilometer">Square Kilometer</option>
                    <option value="acre">Acre</option>
                    <option value="hectare">Hector</option>
                </select>
                <label for="toUnit"> Convert to</label>
                <select name="toUnit">
                    <option value="square_kilometer">Sqaure Kilometer</option>
                    <option value="square_centimeter">Square Centimeter</option>
                    <option value="square_meter">Square Meter</option>
                    <option value="square_kilometer">Square Kilometer</option>
                    <option value="acre">Acre</option>
                    <option value="hectare">Hector</option>
                </select>
            </div>
            <br>

            <input type="submit" name="submit" value="Get Results">
        </form>
    </div>
    <div>
        
        <?php
            if(isset($_POST['submit'])){
                echo "<h3>Result</h3>";
                echo "$number $fromUnit is $result $toUnit";
            }
        ?>
    </div>
    <br>
    <a href="index.php">Click here to go back</a>
</body>
</html>