<html>
    <head>
    </head>
    <body>
        <h1>KELLY AND ZACH'S AWESOME CALCALTOR!!!</h1>
        <form action="calculator.php" method="get">
            <input type="text" name="expr">
            <input type="submit" value="Calculate">
        </form>
        <?php
            $expression = $_GET["expr"];
            if ($expression != null)
            {
                $validRegex = "/^(\s*-?[0-9]+(\.[0-9]+)?\s*[\/\*\+\-])*(\s*-?[0-9]+(\.[0-9]+)?\s*)$/";
                if(preg_match($validRegex, $expression))
                {
                    $divisionRegex = "/\/\s*0(\.[0-9]+)?/";
                    if(preg_match($divisionRegex, $expression))
                        echo "Division by zero error!";
	                else
                    {
                        $expression = str_replace("--", "- -", $expression);
                        $result = eval("return " . $expression . ";");
                        echo $expression . " = " . $result;
                    }
                }
                else 
                    echo "Invalid expression!";
            }
        ?>
    </body>
</html>
