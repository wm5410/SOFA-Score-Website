
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Data Processing</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>

        .container {
            max-width: 700px;
            margin-top: 20px;
            margin-bottom: 50px;
        }
        
        .nav{
            font-size: 15px;
            margin: 0;
        }

        h2 {
            color: #fff; /* White text color for headings */
        }

        p {
            color: #ccc; /* Light grey text color for content */
        }
        
        .submit-button{
            background-color: #555;
            color: white;
            border: none;
            padding: 5px 15px;
            margin: 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .submit-button:hover {
            background-color: #777;
        }
        
        /* Additional styles for the footer */
        footer {
            position: fixed;
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
    <h1>SOFA (Sequential Organ Failure Assessment) Score</h1>
    
    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $nhi = $_POST["nhi"];

    }
    ?>
     <!-- Nav bar -->
    <h1 class="nav">First Name: <?php echo htmlspecialchars($firstname); ?>  |  Last Name: <?php echo htmlspecialchars($lastname); ?>  |  NHI Number: <?php echo htmlspecialchars($nhi); ?></h1>
    
    <div class='container'>
        
        <p>Calculate each value and enter this in either the number input or dropdown boxes that match your value</p>
        
        <br>
        
        <a href="https://en.wikipedia.org/wiki/SOFA_score">If you need help with figuring out your values, CLICK ME!</a>
        
        <br>
        <br>
        <hr>
    
      <!-- Your input form for SOFA calculation -->
    <form action="results.php" method="post">
        <h2>Respiratory System</h2>
        <label for="respiratory_numeric">PaO2/FiO2 [mmHg (kPa)]: </label>
        <select id="respiratorydropdown" name="respiratorydropdown" required>
            <option value="1" selected>≥400 (53.3)</option>
            <option value="2">&lt 400 (53.3)</option>
            <option value="3">&lt 300 (40)</option>
            <option value="4">&lt 200 (26.7)</option>
            <option value="5">&lt 100 (13.3)</option>
        </select>
        <br>
        <br>
        <label for="respiratory_binary">Mechanically Ventilated:</label>
        <input type="checkbox" id="respiratory_binary" name="respiratory_binary">
        
        
        <br>
        <br>
        <br>
        <br>
        
        
        <h2>Nervous System</h2>
        <label for="slider">Glasglow coma scale (0-15):</label>
        <input type="range" id="slider" name="slider" min="0" max="15" value="0">
        <p>Selected Value: <span id="selectedValue">0</span></p>
        
        <script>
            // JavaScript to update the displayed value as the slider is moved
            const slider = document.getElementById("slider");
            const selectedValue = document.getElementById("selectedValue");

            slider.addEventListener("input", function () {
                selectedValue.textContent = slider.value;
            });
        </script>
        
        
        <br>
        <br>
        <br>
        <br>
        
        
        
        <h2>Cardiovascular System (up to 5 values)</h2>        
        <label for="arterialPressure">Mean Arterial Pressure (mmHg):</label>
        <select id="arterialPressure" name="arterialPressure" required>
            <option value="1" selected>MAP ≥ 70 mmHg</option>
            <option value="2">MAP &lt 70 mmHg</option>
            <option value="3">dopamine ≤ 5 μg/kg/min or dobutamine (any dose)</option>
            <option value="4">dopamine > 5 μg/kg/min OR epinephrine ≤ 0.1 μg/kg/min OR norepinephrine ≤ 0.1 μg/kg/min</option>
            <option value="5">dopamine > 15 μg/kg/min OR epinephrine > 0.1 μg/kg/min OR norepinephrine > 0.1 μg/kg/min</option>
        </select>
        
        <br>
        <br>
        <br>
        <br>
        
        
        <h2>Liver</h2>
        <label for="liver">Bilirubin (mg/dl) [μmol/L]: </label>
        <select id="liver" name="liver" required>
            <option value="1" selected>&lt  1.2 [&lt 20]</option>
            <option value="2">1.2–1.9 [20-32]</option>
            <option value="3">2.0–5.9 [33-101]</option>
            <option value="4">6.0–11.9 [102-204]</option>
            <option value="5">> 12.0 [> 204]</option>
        </select>
        
        
        <br>
        <br>
        <br>
        <br>
        
        
        <h2>Coagulation</h2>
        <label for="coagulation">Platelets (×103/μl):</label>
        <input type="number" id="coagulation" name="coagulation" min="1" max="150" value="150" required>
        <span id="error" style="color: red;"></span>
        <script>
            // JavaScript to display an error message if the entered value is outside the range
            const numberInput = document.getElementById("coagulation");
            const errorSpan = document.getElementById("error");

            numberInput.addEventListener("input", function () {
                const value = parseInt(numberInput.value);
                if (value < 1 || value > 150) {
                    errorSpan.textContent = "Value must be between 1 and 150.";
                } else {
                    errorSpan.textContent = "";
                }
            });
        </script>
        
        
        <br>
        <br>
        <br>
        <br>
        
        
        <h2>Kidneys</h2>
        <label for="kidneys">Creatinine (mg/dl) [μmol/L] (or urine output):</label>
        <select id="kidneys" name="kidneys" required>
            <option value="1" selected>< 1.2 [&lt; 110]</option>
            <option value="2">1.2–1.9 [110-170]</option>
            <option value="3">2.0–3.4 [171-299]</option>
            <option value="4">3.5–4.9 [300-440] (or &lt; 500 ml/day)</option>
            <option value="5">&gt; 5.0 [&gt; 440] (or &lt; 200 ml/day)</option>
        </select>
        
        
        <br>
        <br>
        <br>
        
        <hr>
        <input type="submit" class="submit-button" name="submit" value="Calculate SOFA Score">
    </form>
    
        
        
    </div>
    
        
    
    
       <!-- Footer with logout button -->
    <footer>
        <a href="logout.php" class="logout-button">Logout</a>
    </footer>

</body>
</html>