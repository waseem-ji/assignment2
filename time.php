<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Conversion</title>
</head>
<body>
    <?php
    $number = "";
    $fromUnit = "";
    $toUnit = "";
    $result ="";
    const TIME_TO_SECONDS = array(
        "microsecond" => 0.000001,
        "millisecond" => 0.001,
        "second" => 1,
        "minute" => 60,
        "hour" => 3600,
        "day" => 86400,
        "week" => 604800,
        "month"=>2629800,
        "year"=>31557600 
    );
    ?>
    <?php
        if(isset($_POST['submit'])){
            $number = $_POST['number'];
            $fromUnit = $_POST['fromUnit'];
            $toUnit = $_POST['toUnit'];

            $result = ConvertTime($number,$fromUnit,$toUnit);
            
        }
    ?>
    <?php
        function ConvertToSeconds ($number,$fromUnit){
            $stime = $number * TIME_TO_SECONDS[$fromUnit];
            return $stime;
        }

        function ConvertFromSeconds ($number,$toUnit){
            $requiredTime = $number / TIME_TO_SECONDS[$toUnit];
            return $requiredTime; 
        }

        function ConvertTime($number,$fromUnit,$toUnit){
            $a = ConvertToSeconds($number,$fromUnit);
            $b = ConvertFromSeconds($a,$toUnit);
            return $b;
        }
    ?>
    <div>
        <h3>Time Convertor</h3>
        <form method = "post">
            <div>
                <input type="text" name="number" value="<?php echo "$number"?>">
                <label for="fromUnit"> Convert From</label>
                <select name="fromUnit" id="">
                    <option value="microsecond">Microsecond </option>
                    <option value="millisecond">Millisecond</option>
                    <option value="second">Second</option>
                    <option value="minute">Minute</option>
                    <option value="hour">Hour</option>
                    <option value="day">Day</option>
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                    <option value="year">Year</option>
                </select>
                <label for="toUnit"> Convert to</label>
                <select name="toUnit">
                    <option value="microsecond">Microsecond </option>
                    <option value="millisecond">Millisecond</option>
                    <option value="second">Second</option>
                    <option value="minute">Minute</option>
                    <option value="hour">Hour</option>
                    <option value="day">Day</option>
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                    <option value="year">Year</option>
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