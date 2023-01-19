<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Conversion</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/convert.css">
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
    <div class="container conv">
        <h3>Area Converter</h3>
        <form method = "post">
            <div class="main-box">
                <div class="input-number">
                    <input type="text" name="number" value="<?php echo "$number"?>" placeholder="Enter number">
                </div>
                <div class="select-units">
                    <div class="select-from">
                        <label for="fromUnit"> Convert From</label>
                        <select name="fromUnit" id="">
                            <option value="milligram">Milligram</option>
                            <option value="gram">Gram</option>
                            <option value="kilogram">Kilogram </option>
                            <option value="metric_ton">Metric Ton</option>
                            <option value="pound">Pound</option>
                            <option value="ounce">Ounce</option>
                        </select>
                    </div>
                    <div class="select-to">
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