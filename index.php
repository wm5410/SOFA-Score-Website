
<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>
 
<!-- ------------------------------------------------------------------ -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SOFA (Sequential Organ Failure Assessment)</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        
        .container {
            max-width: 400px;
            padding-right: 40px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #888;
            border-radius: 5px;
            background-color: #fff; /* White background for input fields */
            color: #333;
        }

        input[type="submit"] {
            background-color: #555; /* Dark grey submit button */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #777; /* Light grey on hover */
        }
        
        
    </style>
</head>
<body>
     <!-- Get user input as login page -->
    <h1>SOFA (Sequential Organ Failure Assessment)</h1>
    <div class="container">
        <form action="sofa.php" method="post">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>

            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>

            <label for="nhi">NHI Number:</label>
            <input type="text" id="nhi" name="nhi" pattern="[A-Z]{3}[0-9]{4}" title="A valid NHI number should be in the format AAANNNN (A=uppercase letter, N=digit), For example NHI1234." required>

            <input type="submit" value="Submit">
        </form>
    </div>
    
        <!-- Footer displaying PHP version -->
    <footer>
        PHP Version: <?php echo phpversion(); ?>
    </footer>
    
</body>
</html>

<!-- ------------------------------------------------------------------ -->
