<?php

class DatabaseHandler {
    private $connection;

    public function __construct($dbHost, $dbUser, $dbPass, $dbName) {
        // Create a database connection
        $this->connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function fetchAllResults() {
        // Modify your query to fetch all data and order by student name
        $query = "SELECT * FROM scores ORDER BY student_name ASC";

        $result = $this->connection->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}
$dbHost = "localhost";
$dbUser = "crysta10_crysta10";
$dbPass = "Crystalline_623";
$dbName = "crysta10_crystalline";


$dbHandler = new DatabaseHandler($dbHost, $dbUser, $dbPass, $dbName);

$studentInfo = $dbHandler->fetchAllResults();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
</head>
<body>
<?php include ("cr_adminav.php"); ?>
    <div class="container">
        <h1 class="text-center mt-4 mb-4">Student Records</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Student Name</th>
                    <th>Class Name</th>
                    <th>Subjects</th>
                    <th>Assignments</th>
                    <th>Test 1</th>
                    <th>Test 2</th>
                    <th>Exams</th>
                    <th>Total Score</th>
                    <th>Average Score</th>
                    <th>Teacher report</th>
                    <th>HOS report</th>
                    
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($studentInfo as $student) { ?>
                    <tr>
                        <td><?php echo $student['student_name']; ?></td>
                        <td><?php echo $student['class_name']; ?></td>
                        <td><?php echo $student['subjects']; ?></td>
                        <td><?php echo $student['assignments']; ?></td>
                        <td><?php echo $student['test1']; ?></td>
                        <td><?php echo $student['test2']; ?></td>
                        <td><?php echo $student['exams']; ?></td>
                        
                        <td><?php echo $student['total_score']; ?></td>
                        <td><?php echo $student['average_score']; ?></td>
                        <td><?php echo $student['teacherReport']; ?></td>
                        <td><?php echo $student['principalReport']; ?></td>
                        
                        <td><a href="cr_editall2.php?id=<?php echo $student['id']; ?>" class="btn btn-primary btn-sm">Edit</a></td>
                        <td><a href="cr_editall2.php?id=<?php echo $student['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<?php include ("Crystalline_footer.php"); ?>
</body>
</html>
