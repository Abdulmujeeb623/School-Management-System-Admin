<?php
session_start();
error_reporting(0);

class Database {
    private $conn;

    public function __construct($host, $username, $password, $database) {
        $this->conn = new mysqli($host, $username, $password, $database);
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

class Authentication {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    private function testInput($x) {
        $x = trim($x);
        $x = stripslashes($x);
        $x = htmlspecialchars($x);
        return $x;
    }

    public function authenticate($name, $password) {
        $conn = $this->db->getConnection();
        $name = $this->testInput($name);
        $password = $this->testInput($password);

        $sql = "SELECT * FROM user2 WHERE teacher_name=? AND pass1=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $password);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows) {
                // Fetch the user's role from the database
                $user = $result->fetch_assoc();
                $role = $user['role'];
                
                $_SESSION['name'] = $name;
                $_SESSION['role'] = $role; // Store the user's role in the session
                
            } else {
                return "Wrong username and/or password";
            }
        }

        $stmt->close();
        return null;
    }
}

$database = new Database("localhost", "crysta10_crysta10", "Crystalline_623", "crysta10_crystalline");
$auth = new Authentication($database);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($password)) {
        $err = $auth->authenticate($name, $password);

        if ($err === null) {
            // Check the user's role and redirect accordingly
            $userRole = $_SESSION['role'];
            if ($userRole === 'teacher') {
                header('Location: cr_adm_dashboard.php');
            } elseif ($userRole === 'admin') {
                header('Location: cr_adm_dashboard.php');
            }  else {
                # code...
                header('Location: C_teach_login.php');
            }
            exit();
        }
    }

    $database->closeConnection();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To CMA - Sign up, Log in</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hide-password {
            display: none;
        }
    </style>
</head>

<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="sign-in-form p-4">
        <h1 class="text-center">Welcome to CMA</h1>
        <h2 class="text-center">Log in</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" id="name" name="name" placeholder="Please enter your name" class="form-control" title="Enter your name" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" id="password" name="password" class="password form-control" placeholder="~~~~~~~~~~" title="Enter your password" required />
                <span class="show-password">Show Password</span>
            </div>
            <div class="mb-3 text-center">
                <input type="submit" name="submit" value="Log in" class="btn btn-warning" title="Log in" />
                <input type="reset" name="cancel" value="Cancel" class="btn btn-danger" title="Cancel" />
            </div>
            <div class="mb-3 text-center">
                <a href="ForgottenPassword.php" style="background-color: black; color: white; padding: 5px; text-decoration: none;">Forgotten password</a>
            </div>
        </form>
        <?php
        echo "<div class=\"red\">";
        if (isset($err))
            echo $err;
        echo "</div>";
        ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.show-password').on('click', function() {
            var passwordInput = $('input[name="password"]');
            if (passwordInput.attr('type') === 'password') {
                passwordInput.attr('type', 'text');
            } else {
                passwordInput.attr('type', 'password');
            }
        });
    });
</script>
<?php include("Crystalline_footer.php"); ?>
</body>
</html>
