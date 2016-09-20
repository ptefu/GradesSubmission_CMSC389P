<!doctype html>
<html>
    <head> 
		<title>Section Form</title>	
	</head>

	<body>
		<h1>Section Information</h1>
		
		<form action="gradesSubmissionForm.php" method="post">
            <!-- go straight to grades submission form without processing this page bc
                entered course and section should exist-->
        <p style="float: left;">
            <strong>Course Name (e.g. cmsc128):</strong> <input type="text" name="courseName" required/>
        </p>
        
        <br><br><br>
        
        <p style="float: left;">
            <strong>Section (e.g. 0101):</strong> <input type="text" name="sectionNum" required/>
        </p>
        
        <br><br><br><br>
        
        <input type="submit" value="Submit">
            
		</form>
    </body>
</html>