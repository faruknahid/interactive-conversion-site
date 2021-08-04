<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
#define("filepath", "data.txt");



$catagory = "";
$amount = 0;
$result=0;
$catErr= $amountErr = "";
$flag = false;
$successfulMessage = $errorMessage = "";



if($_SERVER['REQUEST_METHOD'] === "POST") {

    if (empty($_POST['catagory'])) {
        $catErr="value cannot be empty";
        $flag=true;
        // code...
    }
    else{
        $catagory=$_POST['catagory'];
    }

    if (empty($_POST['amount'])) {
        $amountErr="value cannot be empty";
        $flag=true;
        // code...
    }
    else{
        $amount=$_POST['amount'];
    }
    
    if($catagory=="inch_to_feet")
    {
        global $result;
        $result=$amount/12;
    }
    elseif($catagory=="feet_to_inch")
    {
        global $result;
        $result=$amount*12;
    }
}

?>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <p>Page 1 [Home]</p> 
        <p>Interactive Conversion site </p>
        1. <a href="home.php">Home</a> 2. <a href="conversion.php">Conversion Rate</a> 3. <a href="history.php">History</a>
        <p>Converter</p>
         <form class="" action="conversion.php" method="post">
            <label for="catagory" >Select Catagory:</label>

            <select name="catagory" id="catagory">
                <option value="inch_to_feet">Inch_to_feet</option>  
                <option value="feet_to_inch">feet_to_inch</option>
                <option value="cm_to_meter">cm_to_meter</option>  
                <option value="meter_to_cm">meter_to_cm</option>  
                <option value="km_to_meter">km_to_meter</option>  
            </select>
            <br>

            Value: <input id="amount" type="text" name="amount" value="" placeholder="Enter a Value" required><br><br>
            <input id="result" type="submit" name="result" value="result"><br>
            Result: <p><?php echo $result ?></p>  
         </form>
    </body>
</html>