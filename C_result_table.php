<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: Crystalline_login.php');
    exit();
}
?>

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

    public function fetchResults() {
        // Modify your query to fetch all the input values for the specific student
        $query = "SELECT * FROM scores WHERE student_name = ? ORDER BY subjects ASC";
    
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $_SESSION['name']);
        $stmt->execute();
    
        $result = $stmt->get_result();
        $data = array();
    
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    
        $stmt->close();
    
        return $data;
    }
    
}

$dbHost = "localhost";
$dbUser = "crysta10_crysta10";
$dbPass = "Crystalline_623";
$dbName = "crysta10_crystalline";

$dbHandler = new DatabaseHandler($dbHost, $dbUser, $dbPass, $dbName);
$results = $dbHandler->fetchResults();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
</head>
<body>
    <?php include('Crystalline_navbar2.php'); ?>
    <div class="mt-3">
        <center><h3>Results</h3>
        <p>Welcome, <?php echo $_SESSION['name']; ?>!</p></center>
        <br><br><hr>
        <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NAME</th>
                <th>CLASS</th>
                <th>WRITING</th>
                <th>READING</th>
                <th>MUSICAL</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($results)): ?>
                <?php $firstResult = reset($results); // Get the first result in the array ?>
                <tr>
                    <td><?= $firstResult['student_name'] ?></td>
                    <td><?= $firstResult['class_name'] ?></td>
                    <td><?= $firstResult['writing'] ?></td>
                    <td><?= $firstResult['reading'] ?></td>
                    <td><?= $firstResult['musical'] ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>



<br><br><hr>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
               <th>SUBJECT</th>
                <th>ASSIGNMENTS</th>
                <th>TEST 1</th>
                <th>TEST 2</th>
                <th>EXAMS</th>
                <th>TOTAL</th>
                <th>AVERAGE</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $result): ?>
                <tr>
                    <td><?= $result['subjects'] ?></td>
                    <td><?= $result['assignments'] ?></td>
                    <td><?= $result['test1'] ?></td>
                    <td><?= $result['test2'] ?></td>
                    <td><?= $result['exams'] ?></td>
                    <td><?= $result['total_score'] ?></td>
                    <td><?= $result['average_score'] ?></td>

                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<br><br><hr>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>MENTAL</th>
                <th>HONESTY</th>
                <th>NEATNESS</th>
                <th>POLITENESS</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($results)): ?>
                <?php $firstResult = reset($results); // Get the first result in the array ?>
                <tr>
                    <td><?= $firstResult['mental'] ?></td>
                    <td><?= $firstResult['honesty'] ?></td>
                    <td><?= $firstResult['neatness'] ?></td>
                    <td><?= $firstResult['politeness'] ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<br><br><hr>
<br><br><hr>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Teacher Report</th>
                <th>Principal Report</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($results)): ?>
                <?php $firstResult = reset($results); // Get the first result in the array ?>
                <tr>
                    <td><?= $firstResult['teacherReport'] ?></td>
                    <td><?= $firstResult['principalReport'] ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

    </div>
    
    <?php include('Crystalline_footer.php'); ?>
</body>
</html>


