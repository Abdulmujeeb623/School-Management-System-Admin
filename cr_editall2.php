
<?php
$host = "localhost"; // Your database host
$username = "crysta10_crysta10"; // Your database username
$password = "Crystalline_623"; // Your database password
$database = "crysta10_crystalline"; // Your database name


// Create a database connection
$dbHandler = new mysqli($host, $username, $password, $database);

// Check the connection
if ($dbHandler->connect_error) {
    die("Connection failed: " . $dbHandler->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $studentId = $_GET['id'];

    // Load the student data from the database based on the ID
    $query = "SELECT * FROM scores WHERE id = ?";
    $stmt = $dbHandler->prepare($query);
    $stmt->bind_param("i", $studentId);
    $stmt->execute();
    $result = $stmt->get_result();
    $studentData = $result->fetch_assoc();

    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_student'])) {
        // Handle form submission to update student information
        $studentId = $_POST['id'];
        $studentName = $_POST['student_name'];
        $className = $_POST['class_name'];
        $subjects = $_POST['subjects'];
        $assignments = $_POST['assignments'];
        $test1 = $_POST['test1'];
        $test2 = $_POST['test2'];
        $exams = $_POST['exams'];
        $totalScore = $_POST['total_score'];
        $averageScore = $_POST['average_score'];
        $teacherReport = $_POST['teacher_report'];
        $principalReport = $_POST['principal_report'];

        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            $query = "UPDATE scores SET student_name = ?, class_name = ?, subjects = ?, assignments = ?, test1 = ?, test2 = ?, exams = ?, total_score = ?, average_score = ?, teacherReport = ?, principalReport = ? WHERE id = ?";
            $stmt = $dbHandler->prepare($query);
            $stmt->bind_param("sssssssssssi", $studentName, $className, $subjects, $assignments, $test1, $test2, $exams, $totalScore, $averageScore, $teacherReport, $principalReport, $studentId);
        } else {
            $query = "UPDATE scores SET student_name = ?, class_name = ?, subjects = ?, assignments = ?, test1 = ?, test2 = ?, exams = ?, total_score = ?, average_score = ?, teacherReport = ? WHERE id = ?";
            $stmt = $dbHandler->prepare($query);
            $stmt->bind_param("ssssssssssi", $studentName, $className, $subjects, $assignments, $test1, $test2, $exams, $totalScore, $averageScore, $teacherReport, $studentId);
        }
        $stmt->execute();
        $stmt->close();

        // Redirect to the student records page after the update
        header("Location: cr_editall.php");
    } elseif (isset($_POST['delete_student'])) {
        // Handle form submission to delete a student
        $studentId = $_POST['id'];

        // Delete the student's information from the database
        $query = "DELETE FROM scores WHERE id = ?";
        $stmt = $dbHandler->prepare($query);
        $stmt->bind_param("i", $studentId);
        $stmt->execute();
        $stmt->close();

        // Redirect to the student records page after the delete
        header("Location: cr_editall.php");
    }
}
?>
<?php include("cr_adminav.php"); ?>

<body>

<div class="container">
    <h1 class="text-center mt-4 mb-4">Edit Student Record</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $studentData['id']; ?>">
        <div class="form-group">
            <label for="student_name">Name</label>
            <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $studentData['student_name']; ?>">
        </div>
        <div class="form-group">
            <label for="class_name">Class</label>
            <input type="text" class="form-control" id="class_name" name="class_name" value="<?php echo $studentData['class_name']; ?>">
        </div>
        <<div class="form-group">
    <label for="subjects">Subjects</label>
    <input type="text" class="form-control" id="subjects" name="subjects" value="<?php echo $studentData['subjects']; ?>">
</div>

<div class="form-group">
    <label for="assignments">Assignments</label>
    <input type="number" class="form-control" id="assignments" name="assignments" value="<?php echo $studentData['assignments']; ?>">
</div>

<div class="form-group">
    <label for="test1">Test 1</label>
    <input type="number" class="form-control" id="test1" name="test1" value="<?php echo $studentData['test1']; ?>">
</div>

<div class="form-group">
    <label for="test2">Test 2</label>
    <input type="number" class="form-control" id="test2" name="test2" value="<?php echo $studentData['test2']; ?>">
</div>

<div class="form-group">
    <label for="exams">Exams</label>
    <input type="number" class="form-control" id="exams" name="exams" value="<?php echo $studentData['exams']; ?>">
</div>

<div class="form-group">
    <label for="total_score">Total Score</label>
    <input type="number" class="form-control" id="total_score" name="total_score" value="<?php echo $studentData['total_score']; ?>">
</div>

<div class="form-group">
    <label for="average_score">Average Score</label>
    <input type="number" class="form-control" id="average_score" name="average_score" value="<?php echo $studentData['average_score']; ?>">
</div>

<div class="form-group">
    <label for="teacher_report">Teacher Report</label>
    <textarea class="form-control" id="teacher_report" name="teacher_report"><?php echo $studentData['teacherReport']; ?></textarea>
</div>
<?php
        // Check if the session role is 'admin' to display the 'Principal Report' field
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            echo '<div class="form-group">';
            echo '<label for="principal_report">Principal Report</label>';
            echo '<textarea class="form-control" id="principal_report" name="principal_report">' . $studentData['principalReport'] . '</textarea>';
            echo '</div>';
        }
        ?>
          <button type="submit" name="update_student" class="btn btn-warning">Update</button>
          <button type="submit" name="delete_student" class="btn btn-danger">Delete</button>
          </form>
          </div>


        
        

<?php include("Crystalline_footer.php"); ?>
</body>
</html>
