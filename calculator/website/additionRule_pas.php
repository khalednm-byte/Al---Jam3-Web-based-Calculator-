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
                <h3><u>Addition Rule</u></h3>
                <p>The addition rule in probability and statistics is used to find the probability of the union of two events.</p>
                <h3><u>Formula:</u></h3>
                <p>P(<i>A</i> <span>&#8746;</span> <i>B</i>): <i>A</i> + <i>B</i> - <mark style="background-color: #FF7747;">P(<i>A</i><span>&#8745;</span><i>B</i>)</mark></p>
                <h3><u>Note:</u></h3>
                <p>The last part, that's marked in reddish, can be removed on the condition that both parts (<i>A</i> and <i>B</i>) never meet (Mutually exclusive).</p>
                <label for="num1Box">A
                    <input type="text" name="num1Box" id="num1Box">
                </label>
                <label for="num2Box">B
                    <input type="text" name="num2Box" id="num2Box">
                </label>
                <label for="num3Box">P(<i>A</i><span>&#8745;</span><i>B</i>)
                    <input type="text" name="intersection-value" id="num3Box" value="0" title="Leave zero if intersection isn't available!">
                </label>
                <button type="submit" name="tp-submit-form" value="tp" id="tp-button">Calculate</button>
            </form>
        </div>
        <div>
            <p class="form-answer">
            <?php
                $num1 = filter_input(INPUT_GET, "num1Box", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $num2 = filter_input(INPUT_GET, "num2Box", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $intersection = filter_input(INPUT_GET, "intersection-value", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $tp_submit_form = filter_input(INPUT_GET, "tp-submit-form", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $result = "N/A";

                if ($num1 != null && $num2 != null) {
                    if ($tp_submit_form == "tp") {
                        $result = $num1 + $num2 - $intersection;
                    } else {
                        $result = "Insert at least Two Numbers";
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