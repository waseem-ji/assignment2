<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Conversion</title>
</head>
<body>
    <?php
    $number = "";
    $fromUnit = "";
    $toUnit = "";
    $result ="";
    const WEIGHT_TO_KILOGRAM = array(
        "milligram" => 0.000001,
        "gram" => 0.001,
        "kilogram" => 1,
        "metric_ton" => 1000,
        "pound" => 0.453592,
        "ounce" => 0.0283495
    );
    ?>
    <?php
        if(isset($_POST['submit'])){
            $number = $_POST['number'];
            $fromUnit = $_POST['fromUnit'];
            $toUnit = $_POST['toUnit'];

            $result = ConvertWeight($number,$fromUnit,$toUnit);
            
        }
    ?>
    <?php
        function ConvertToKilogram ($number,$fromUnit){
            $kgWeigth = $number * WEIGHT_TO_KILOGRAM[$fromUnit];
            return $kgWeigth;
        }

        function ConvertFromKilogram ($number,$toUnit){
            $requiredWeight = $number / WEIGHT_TO_KILOGRAM[$toUnit];
            return $requiredWeight; 
        }

        function ConvertWeight($number,$fromUnit,$toUnit){
            $a = ConvertToKilogram($number,$fromUnit);
            $b = ConvertFromKilogram($a,$toUnit);
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
                    <option value="milligram">Milligram</option>
                    <option value="gram">Gram</option>
                    <option value="kilogram">Kilogram </option>
                    <option value="metric_ton">Metric Ton</option>
                    <option value="pound">Pound</option>
                    <option value="ounce">Ounce</option>
                </select>
                <label for="toUnit"> Convert to</label>
                <select name="toUnit">
                    <option value="milligram">Milligram</option>
                    <option value="gram">Gram</option>
                    <option value="kilogram">Kilogram </option>
                    <option value="metric_ton">Metric Ton</option>
                    <option value="pound">Pound</option>
                    <option value="ounce">Ounce</option>
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