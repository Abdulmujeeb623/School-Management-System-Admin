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
    $role = test_input($_POST['role']);

    // Hash the password before storing it in the database for security.
   // $hashed_pass = password_hash($pass1, PASSWORD_DEFAULT);

    // Create a prepared statement
    $sql = $conn->prepare("INSERT INTO user2 (teacher_name, pass1, role) VALUES (?, ?, ?)");
    $sql->bind_param("sss", $student_name, $pass1, $role);

    if ($sql->execute() === true) {
        echo "<script>alert('Account successfully created!'); window.location='C_teach_login.php'</script>";
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
    $conn->close();
}
?>
