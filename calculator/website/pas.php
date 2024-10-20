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
        <nav>
            <a href="../website/index.php" class="header-links" style="text-decoration: none;"><i class="fa-solid fa-plus-minus"> Basic Arithmetics</i></a>
            <a href="../website/pas.php" class="header-links"><i class="fa-solid fa-brain"> Probability and Statistics</i></a>
            <a href=""></a>
        </nav>
    </header>
    
    
    <hr>
    <div class="parent-form">
        <div class="pas-tp-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
                <h3><u>Theoretical probability</u></h3>
                <p>Based only on mathematics, theoretical probability is the chance that an event <mark style="background-color: #FF7747;">will</mark> occur.</p>
                <h3><u>Formula:</u></h3>
                <p>P(A) = number of desired outcomes / total number of possible outcomes</p>
                <label for="num1Box">Event:
                    <input type="text" name="num1Box" id="num1Box" placeholder="0" required>
                </label>
                <label for="num2Box">Total Outcomes:
                    <input type="text" name="num2Box" id="num2Box" placeholder="0" required>
                </label>
                <button type="submit" name="tp-submit-form" value="tp" id="tp-button">Calculate</button>
            </form>
        </div>

        <div>
            <p class="form-answer">
                <?php 
                    $num1 = filter_input(INPUT_GET, "num1Box", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $num2 = filter_input(INPUT_GET, "num2Box", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $tp_submit_form = filter_input(INPUT_GET, "tp-submit-form", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $result = "N/A";

                    if ($num1 != null && $num2 != null) {
                        if ($num2 != 0 && $tp_submit_form == "tp") {
                            $result = $num1 / $num2;
                        } else {
                            $result = "Cannot divide by zero!";
                        }
                    } else if ($tp_submit_form !== null && ($num1 == null || $num2 == null)) {
                        $result = "Insert values!";
                    } else if ($tp_submit_form == null && ($num1 == null || $num2 == null)) {
                        $result = "N/A";
                    }else{
                        $result = "Something went wrong...";
                    }

                    if ($result == "Insert values!" ||  $result == "Something went wrong...") {
                        echo "<span style='color: red;'>" . htmlspecialchars($result) . "</span>";
                    } else {
                        echo "Result: " . htmlspecialchars($result);
                    }
                ?>
            </p>
        </div>
    </div>
    

    <div class="Control-panel">
        <button onclick="document.location = 'pas.php'" class="control-panel-buttons">Theoretical probability</button>
        <button onclick="document.location = 'additionRule_pas.php'" class="control-panel-buttons">Addition Rule</button>
    </div>
    

    <div style="background-color: black; margin: 0; position: fixed; padding: 0; left: 0; bottom: 0; width: 100%;">
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