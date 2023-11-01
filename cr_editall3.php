<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the form submission to update the student's information in the database

    // Retrieve all form field values
    $studentId2 = $_POST['id'];
    $studentName2 = $_POST['student_name'];
    $className = $_POST['class_name'];
    $assignments = $_POST['assignments'];
    $test1 = $_POST['test1'];
    $test2 = $_POST['test2'];
    $exams = $_POST['exams'];
    $totalScore = $_POST['total_score'];
    $averageScore = $_POST['average_score'];

    // Prepare the SQL query to update the student's information
    $query = "UPDATE scores SET student_name = ?, class_name = ?, assignments = ?, test1 = ?, test2 = ?, exams = ?, total_score = ?, average_score = ? WHERE id = ?";
    $stmt = $connection->prepare($query);

    // Bind the parameters
    $stmt->bind_param("ssiiiiidi", $studentName2, $className, $assignments, $test1, $test2, $exams, $totalScore, $averageScore, $studentId2);

    // Execute the update query
    if ($stmt->execute()) {
        // Redirect back to the student listing page after a successful update
        header("Location: cr_editall.php");
        exit();
    } else {
        // Handle the update error
        echo "Error updating student information: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$connection->close();
?>
