<?php
if(isset($_POST['button'])) {

    $buttonValue = $_POST['button'];

    if (is_numeric($buttonValue)) {
        // Append the numeric value to the result
        $_POST['result'] .= $buttonValue;
    }
    else if($buttonValue == '=') {
        // Evaluate the expression
        $expression = $_POST['result'];
        if (strpos($expression, '/0') !== false) {
            $_POST['result'] = "Number Can't be divide by zero";
        } else {
            eval("\$_POST['result'] = $expression;");
        }
    }
    else if($buttonValue == 'C') {
        // Clear the result
        $_POST['result'] = '';

    } else {
        // Append the operator to the result
        $_POST['result'] .= $buttonValue;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Calculator</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./imgs/calculator.ico" type="image/x-icon">
</head>
<body>

    <div class="main-header">
        <h1>Fu<span>ll</span> Calcula<span>tor</span></h1>
        <div class="line"></div>
    </div>

    <div class="main-container">

        <form action="" method="post">

            <div class="head">
                <input type="text" name="result" id="result" placeholder="Enter a number..." value="<?php echo isset($_POST['result']) ? $_POST['result'] : ''; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            </div><br>

            <div class="content">

                <button type="submit" name="button" value="7">7</button>
                <button type="submit" name="button" value="8">8</button>
                <button type="submit" name="button" value="9">9</button>
                <button type="submit" name="button" value="+">+</button>

                <button type="submit" name="button" value="4">4</button>
                <button type="submit" name="button" value="5">5</button>
                <button type="submit" name="button" value="6">6</button>
                <button type="submit" name="button" value="-">−</button>

                <button type="submit" name="button" value="1">1</button>
                <button type="submit" name="button" value="2">2</button>
                <button type="submit" name="button" value="3">3</button>
                <button type="submit" name="button" value="*">×</button>

                <button type="submit" name="button" value="0">0</button>
                <button type="submit" name="button" value="C">C</button>
                <button type="submit" name="button" value="/">÷</button>
                <button type="submit" name="button" value="=">=</button>

            </div>

        </form>

    </div>

</body>
</html>
