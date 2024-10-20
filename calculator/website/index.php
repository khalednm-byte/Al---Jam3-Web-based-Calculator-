<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesheet.css?v=1.1">
    <script src="https://kit.fontawesome.com/d7b796c30b.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <title>Calculator - KHALED</title>
</head>
<body>

    <header>
        <h1>
            <i class="fa-solid fa-calculator"> Al - Jam3</i> 
        </h1>
        <nav id="header-nav" style="display: flex; margin-left: 20px; gap: 15px;">
            <a href="../website/index.php" class="header-links" style="text-decoration: none;"><i class="fa-solid fa-plus-minus"> Basic Arithmetics</i></a>
            <a href="../website/pas.php" class="header-links"><i class="fa-solid fa-brain"> Probability and Statistics</i></a>
            <a href=""></a>
        </nav>
    </header>

    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <div class="container">

            <div class="col-1">
                <label for="num1Box">
                    <input type="text" name="num1" id="num1Box" placeholder="0">
                </label>
            </div>
            
            <div class="col-2">
                <label for="num2Box">
                    <input type="text" name="num2" id="num2Box" placeholder="0">
                </label>
            </div>
            
        </div>

        <div class="Control-panel">
            <div>
                <button type="submit" name="operation" value="add" id="addition-button"><i class="fa-solid fa-plus"></i></button>
            </div>
            <div>
                <button type="submit" name="operation" value="subtract" id="subtraction-button"><i class="fa-solid fa-minus"></i></button>
            </div>
            <div>
                <button type="submit" name="operation" value="multiply" id="multiplication-button"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div>
                <button type="submit" name="operation" value="divide" id="division-button"><i class="fa-solid fa-divide"></i></button>
            </div>
        </div>
    </form>
    
    <?php
        $num1 = filter_input(INPUT_GET, "num1", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $num2 = filter_input(INPUT_GET, "num2", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $operation = filter_input(INPUT_GET, "operation", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $result = "N/A";

        if ($num1 != null && $num2 != null) {
            switch ($operation) {
                case "add":
                    $result = $num1 + $num2;
                    break;
                case "subtract":
                    $result = $num1 - $num2;
                    break;
                case "multiply":
                    $result = $num1 * $num2;
                    break;
                case "divide":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Cannot divide by zero";
                    }
                    break;
                default:
                    $result = "Invalid operation";
                    break;
            }
        }else if ($operation !== null && ($num1 == null || $num2 == null)) {
            $result = "Insert at least Two Numbers";
        }else if ($operation == null && ($num1 == null || $num2 == null)) {
            $result = "N/A" ;
        }else {
            $result = "Something went wrong...";
        }

        if ($result == "Insert at least Two Numbers" || $result == "Something went wrong...") {
            echo "<p class='container' style='color: red;'> " . htmlspecialchars($result) . "</p>";
        }else {
            echo "<p class='container'>Result: " . htmlspecialchars($result) . "</p>";
        }

        
    ?>
    
    <div style="background-color: black; margin: 0; padding: 0; left: 0; bottom: 0; width: 100%;">
        <footer style="text-align: center; color: white; padding: 15px;">
            <h5>Created by Khaled Alnwelate.</h5>
            <h5>Follow me on: 
                <a href="https://www.instagram.com/khalednoilati/" id="insta" title="My Instagram" aria-label="Instagram Profile">
                    <i class="fa-brands fa-square-instagram"></i>
                </a>   
                <a href="https://github.com/khalednm-byte" id="github" title="My Github" aria-label="Github Profile">
                    <i class="fa-brands fa-square-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/khaled-alnwelate-15337a25a" id="linkedin" title="My Linkedin" aria-label="Linkedin Profile">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
            </h5>
        </footer>
    </div>


</body>
</html>