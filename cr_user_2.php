<?php
function test_input($data) {
    $data = trim($data);          
    $data = stripslashes($data);    
    $data = htmlspecialchars($data); 
    return $data;
}

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crystalline";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = test_input($_POST['student_name']);
    $pass1 = test_input($_POST['pass1']);

    //  hash the password before storing it in the database for security.
    

    $sql = "INSERT INTO user (student_name, pass1, pass2) VALUES ('$student_name', '$pass1', '$pass1')";

    if ($conn->query($sql) === true) {
        echo "<script>alert('Account successfully created!'); window.location='Crystalline_login.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
