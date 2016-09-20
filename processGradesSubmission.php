<!doctype html>
<html>
    <head> 
		<title>Grades Submission Confirmation</title>	
	</head>

	<body>
        <h2>Grades To Submit</h2>
        
        <table id="table" border="1">
            <tr><td align="center">Name</td><td align="center">Grade</td></tr>
            <?php
                session_start();
				$_SESSION['isBack'] = true;
				$backArray = [];///
                foreach ($_SESSION['array'] as $student) {
                    $radioName = "radio" . $student;
                    $grade = $_POST[$radioName];
					array_push($backArray, $grade);
                    echo "<tr><td>$student</td> <td>$grade</td></tr>";
                }
				$_SESSION['backArray'] = $backArray;
            ?>      
        </table>
        
        <br>
        
        <form action="confirmationPage.php" method="post">
            <input type="submit" value="Submit">
        </form>
        
        <br>
        
        <form action="gradesSubmissionForm.php" method="post">
            <input type="submit" value="Back" name="backButton">
        </form>
        
    </body>
    
</html>