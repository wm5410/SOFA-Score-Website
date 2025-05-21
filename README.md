# SOFA Score Web Application

## Overview

This dynamic website calculates the Sequential Organ Failure Assessment (SOFA) score to estimate ICU mortality risk. Built with hand‑written PHP, JavaScript, HTML, and CSS, it uses cookies (or sessions) and server‑side processing to manage user data and computing.

## Requirements

- Plain PHP, JavaScript, HTML, and CSS (no auto-generated code)  
- Directory structure with `index.php` as the default page  
- Separate external CSS (`style.css`) and JS files (if any)  
- Cookies (or sessions) to remember patient details  
- Server‑side validation and calculations in PHP  

## Structure

```
/ (root)
│   index.php          ← Patient info input
│   sofa.php           ← Form for six SOFA components
│   result.php         ← Displays subscores and total score
│   logout.php         ← Clears cookies/session
│   style.css          ← Common stylesheet
│   (optional) script.js ← Any client‑side helpers
└───assets/
    └───images/        ← (optional) icons or diagrams
```

## Workflow

1. **index.php**  
   - Prompts for NHI (AAANNNN), surname, firstname  
   - Validates NHI with regex  
   - Reads existing cookies (or session) to auto‑populate fields  
   - Sets cookies for patient details on submit via POST to `sofa.php`

2. **sofa.php**  
   - Receives patient data via `$_POST`  
   - Displays patient details and sets cookies  
   - Presents form for six SOFA inputs with appropriate controls:  
     - Respiratory (dropdown + checkbox)  
     - Nervous (slider)  
     - Cardiovascular (dropdown)  
     - Liver (dropdown)  
     - Coagulation (number input)  
     - Kidneys (dropdown)  
   - Validates inputs client‑side/JS as needed  
   - Submits subscores via POST to `result.php`

3. **result.php**  
   - Retrieves patient info from cookies (or session)  
   - Processes POSTed subscores in PHP to compute total  
   - Displays each component’s subscore and the final SOFA score  
   - Provides logout link to `logout.php`

4. **logout.php**  
   - Clears cookies (or session) and redirects to `index.php`

## Features

- **Server-side validation**: NHI regex, required fields, numeric ranges  
- **Cookie (or session) management**: Persist patient data across visits  
- **PHP processing**: All score calculations done on the server  
- **JavaScript UI enhancements**: Input feedback (e.g., slider value display, error messages)  
- **Responsive CSS**: Consistent styling across pages via external `style.css`  

## Usage

- Deploy to a PHP‑enabled web server root folder.  
- Navigate to `http://<server>/index.php`.  
- Enter and submit patient details.  
- Complete the SOFA component form and submit.  
- View detailed score breakdown and total.  
- Click “Logout” to clear data and restart.
