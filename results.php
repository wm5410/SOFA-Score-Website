<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SOFA Score Results</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Your existing CSS styles here */
        
        /* Additional styles for the footer */
        footer {
            background-color: #222;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Style for the logout button */
        .logout-button {
            background-color: #555;
            color: white;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #777;
        }
        
    </style>
</head>
<body>
    <h1>SOFA Score Results</h1>
    
    <div class='container'>
    
    <!-- Display the calculated SOFA score -->
    <h2>Score Breakdown: </h2>
    
        <br>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve values from the POST request
        $dropdownRespiratory  = isset($_POST["respiratorydropdown"]) ? $_POST["respiratorydropdown"] : "";
        $checkboxRespiratory  = isset($_POST["respiratory_binary"]) ? $_POST["respiratory_binary"] : "";
        $sliderNervous  = isset($_POST["slider"]) ? $_POST["slider"] : "";
        $dropdownCardiovascular  = isset($_POST["arterialPressure"]) ? $_POST["arterialPressure"] : "";
        $dropdownLiver = isset($_POST["liver"]) ? $_POST["liver"] : "";
        $numberInputCoagulation = isset($_POST["coagulation"]) ? $_POST["coagulation"] : "";
        $dropdownKidneys = isset($_POST["kidneys"]) ? $_POST["kidneys"] : "";
        
        // Display the received values for error checking
//        echo "<h2>Values Received:</h2>";
//        echo "<p>Dropdown Value: " . htmlspecialchars($dropdownRespiratory) . "</p>";
//        echo "<p>Checkbox Value: " . ($checkboxRespiratory ? 'Checked' : 'Unchecked') . "</p>";
//        echo "<p>Slider Value: " . htmlspecialchars($sliderNervous) . "</p>";
//        echo "<p>Number Input Value: " . htmlspecialchars($dropdownCardiovascular) . "</p>";
//        echo "<p>Dropdown Value: " . htmlspecialchars($dropdownLiver) . "</p>";
//        echo "<p>Number Input Value: " . htmlspecialchars($numberInputCoagulation) . "</p>";
//        echo "<p>Number Input Value: " . htmlspecialchars($dropdownKidneys) . "</p>";
        
            
        if (isset($_POST['respiratory_binary'])) {
            // The checkbox is checked, value is 1
            $checkboxValue = 1;
        } else {
            // The checkbox is not checked, value is 0
            $checkboxValue = 0;
        }
            
            
        //Calculations
        $totalScore = 0;
        
        //Respatory
        if($dropdownRespiratory == 1)
        {
            $totalScore += 0;
            echo "<p>Respiratory Score: +0</p>";
        }
        if($dropdownRespiratory == 2)
        {
            $totalScore += 1;
            echo "<p>Respiratory Score: +1</p>";
        }
        if($dropdownRespiratory == 3)
        {
            $totalScore += 2;
            echo "<p>Respiratory Score: +2</p>";
        }
        if($dropdownRespiratory == 4)
        {
            if($checkboxValue == 1)
            {
                $totalScore += 3;
                echo "<p>Respiratory Score: +3</p>";
            }
            else{
                $totalScore += 2;
                echo "<p>Respiratory Score: +2</p>";
            }
        }
        if($dropdownRespiratory == 5)
        {
            if($checkboxValue == 1)
            {
                $totalScore += 4;
                echo "<p>Respiratory Score: +4</p>";
            }
            else{
                $totalScore += 2;
                echo "<p>Respiratory Score: +2</p>";
            }
        }
        
        
        //Central nervous system
        if($sliderNervous == 15)
        {
            $totalScore += 0;
            echo "<p>Central nervous system Score: +0</p>";
        }
        if($sliderNervous >= 13 && $sliderNervous <=14)
        {
            $totalScore += 1;
            echo "<p>Central nervous system Score: +1</p>";
        }
        if($sliderNervous >= 10 && $sliderNervous <=12)
        {
            $totalScore += 2;
            echo "<p>Central nervous system Score: +2</p>";
        }
        if($sliderNervous >= 6 && $sliderNervous <=9)
        {
            $totalScore += 3;
            echo "<p>Central nervous system Score: +3</p>";
        }
        if($sliderNervous < 6)
        {
            $totalScore += 4;
            echo "<p>Central nervous system Score: +4</p>";
        }
        
        
        //Cardiovascular 
        if($dropdownCardiovascular == 1)
        {
            $totalScore += 0;
            echo "<p>Cardiovascular Score: +0</p>";
        }
        if($dropdownCardiovascular == 2)
        {
            $totalScore += 1;
            echo "<p>Cardiovascular Score: +1</p>";
        }
        if($dropdownCardiovascular == 3)
        {
            $totalScore += 2;
            echo "<p>Cardiovascular Score: +2</p>";
        }
        if($dropdownCardiovascular == 4)
        {
            $totalScore += 3;
            echo "<p>Cardiovascular Score: +3</p>";
        }
        if($dropdownCardiovascular == 5)
        {
            $totalScore += 4;
            echo "<p>Cardiovascular Score: +4</p>";
        }
        
        
        //Liver
        if($dropdownLiver == 1)
        {
            $totalScore += 0;
            echo "<p>Liver Score: +0</p>";
        }
        if($dropdownLiver == 2)
        {
            $totalScore += 1;
            echo "<p>Liver Score: +1</p>";
        }
        if($dropdownLiver == 3)
        {
            $totalScore += 2;
            echo "<p>Liver Score: +2</p>";
        }
        if($dropdownLiver == 4)
        {
            $totalScore += 3;
            echo "<p>Liver Score: +3</p>";
        }
        if($dropdownLiver == 5)
        {
            $totalScore += 4;
            echo "<p>Liver Score: +4</p>";
        }
        
        
        //Coagulation
        if($numberInputCoagulation >= 150)
        {
            $totalScore += 0;
            echo "<p>Coagulation Score: +0</p>";
        }
        if($numberInputCoagulation < 150 && $numberInputCoagulation >= 100)
        {
            $totalScore += 1;
            echo "<p>Coagulation Score: +1</p>";
        }
        if($numberInputCoagulation < 100 && $numberInputCoagulation >= 50)
        {
            $totalScore += 2;
            echo "<p>Coagulation Score: +2</p>";
        }
        if($numberInputCoagulation < 50 && $numberInputCoagulation >= 20)
        {
            $totalScore += 3;
            echo "<p>Coagulation Score: +3</p>";
        }
        if($numberInputCoagulation < 20)
        {
            $totalScore += 4;
            echo "<p>Coagulation Score: +4</p>";
        }
        
        
        //Kidneys
        if($dropdownKidneys == 1)
        {
            $totalScore += 0;
            echo "<p>Kidney Score: +0</p>";
        }
        if($dropdownKidneys == 2)
        {
            $totalScore += 1;
            echo "<p>Kidney Score: +1</p>";
        }
        if($dropdownKidneys == 3)
        {
            $totalScore += 2;
            echo "<p>Kidney Score: +2</p>";
        }
        if($dropdownKidneys == 4)
        {
            $totalScore += 3;
            echo "<p>Kidney Score: +3</p>";
        }
        if($dropdownKidneys == 5)
        {
            $totalScore += 4;
            echo "<p>Kidney Score: +4</p>";
        }
        
        echo "<br>";
        echo "<h1>Total Score: " . htmlspecialchars($totalScore) . "</h1>";
    }
    ?>

        
    </div>
    
    <!-- Footer with logout button -->
    <footer>
        <a href="logout.php" class="logout-button">Logout</a>
    </footer>
    
    
</body>
</html>