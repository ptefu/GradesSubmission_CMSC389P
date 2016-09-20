<!doctype html>
<html>
    <head> 
		<title>Grades Submission Form</title>	
	</head>

	<body>
        <h2>Grades Submission Form</h2>
		
		<?php
			class Course {
				private $courseName;
				private $sectionNum;
				private $studentArray;
				private $fileName;
				
				public function __construct($courseName_in, $sectionNum_in) {
					$this->courseName = $courseName_in;
					$this->sectionNum = $sectionNum_in;
					$this->studentArray = [];
					echo "Course: " . $this->courseName . ", Section: " . $this->sectionNum;
				}
		
				public function retrieveFile() {
					$this->fileName = $this->courseName . $this->sectionNum;
					$fp = fopen(($this->fileName . ".txt"), 'r') or die("Could not open file");
					while (!feof($fp)) {
						$line = trim(fgets($fp));
						if ($line != '') {
							array_push($this->studentArray, $line);
						}
					}
				}
				
				public function getStudents() {
					return $this->studentArray;
				}
				
				public function getCourseName() {
					return $this->courseName;
				}
				
				public function getSectionNum() {
					return $this->sectionNum;
				}
				
			}
			
			//driver
			session_start();
			if (empty($_SESSION['courseName'])) {
				$course = new Course(trim($_POST['courseName']), trim($_POST['sectionNum']));
			} else {
				$course = new Course(trim($_SESSION['courseName']), trim($_SESSION['sectionNum']));
			}
			$course->retrieveFile();
			$studentArray = $course->getStudents();
			$_SESSION['array'] = $studentArray;
			$_SESSION['courseName'] = $course->getCourseName();
			$_SESSION['sectionNum'] = $course->getSectionNum();
		?>
		
		<br><br>
		<form action="processGradesSubmission.php" method="post">
			<table id="table" border="1">
				<?php
					if (isset($_SESSION['backArray'])){ // do this if back button was pressed on next page
						$i = 0; //counter for radio button array
						$prevRadioEntries = $_SESSION['backArray']; // retrieve back array from next page
						$charHolder = array('A','B','C','D','E','F'); // array to compare chars
						foreach($studentArray as $student) {
							$radioName = "radio" . $student;
							
							echo "<tr> <td>$student</td>";
								
							// check each char with the char at i from returned radio button array
							foreach($charHolder as $char) {
								if ($prevRadioEntries[$i] == $char) {
									echo "<td><input type='radio' name=\"$radioName\" value='$char' checked = \"checked\">$char</td>";
								} else {
									echo "<td><input type='radio' name=\"$radioName\" value='$char'>$char</td>";
								}
							}
							
							echo "</tr>";
							$i++; //increment counter
						}
					} else {
						foreach($studentArray as $student) {
							$radioName = "radio" . $student;
							echo "<tr>
									<td>$student</td>
									<td><input type='radio' name=\"$radioName\" value='A'>A</td>
									<td><input type='radio' name=\"$radioName\" value='B'>B</td>
									<td><input type='radio' name=\"$radioName\" value='C'>C</td>
									<td><input type='radio' name=\"$radioName\" value='D'>D</td>
									<td><input type='radio' name=\"$radioName\" value='E'>E</td>
									<td><input type='radio' name=\"$radioName\" value='F'>F</td>
								  </tr>";
						}
					}					
				?>
			</table>
			
			<br><br>
			
			<input type="submit" value="Continue" >
			
		</form>
		
    </body>
</html>