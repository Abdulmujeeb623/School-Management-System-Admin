<?php
// Check if the session role is "admin"
if ($_SESSION['role'] === 'admin') {
    // Include the code if the user is an admin
    include('cr_adminav.php');
} else {
    // Redirect the user to another page if not an admin
    header('Location: cr_adm_dashboard.php');
    exit(); // Terminate script execution
}
?>

<body>
    <div class="container">
        <h2>User Registration</h2>
        <div id="app">
            <form @submit="handleSubmit" method="post" action="C_user.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="student_name">Teacher Name:</label>
                    <input v-model="userData.student_name" type="text"  name="student_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pass1">Password:</label>
                    <input v-model="userData.pass1" type="password" name="pass1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pass2">Confirm Password:</label>
                    <input v-model="userData.pass2" type="password" name="pass2"  class="form-control" required>
                </div>
                <div class="form-group">
                 <label for="role">Role:</label>
                <select v-model="userData.role" name="role" class="form-control" required>
                <option value="teacher">Teacher</option>
                <option value="admin">Admin</option>
    </select>
</div>

                <button type="submit" class="btn btn-warning">Register</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <script>
       new Vue({
       el: '#app',
       data: {
    userData: {
        student_name: '',
        pass1: '',
        pass2: '',
        role: 'teacher' // Set the default role to 'teacher'
    }
},

    methods: {
        handleSubmit(event) {
            if (this.userData.pass1 !== this.userData.pass2) {
                alert("Passwords do not match.");
                event.preventDefault();
            }
        }
    }
});
</script>

<?php include('Crystalline_footer.php');?>
</body>
</html>
