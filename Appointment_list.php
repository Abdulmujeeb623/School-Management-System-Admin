<?php



// Assuming you have a database connection established
$conn = new mysqli("localhost", "crysta10_crysta10", "Crystalline_623", "crysta10_crystalline");

// Fetch data from the appointments table
$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
?>
<?php include('cr_adminav.php')?>
<body>

<div class="container">
    <h2>Appointment List</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Guardian Name</th>
                    <th>Guardian Email</th>
                    <th>Child Name</th>
                    <th>Child Age</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?php echo $row['guardian_name']; ?></td>
                        <td><?php echo $row['guardian_email']; ?></td>
                        <td><?php echo $row['child_name']; ?></td>
                        <td><?php echo $row['child_age']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Include jQuery and Bootstrap JS -->
<?php include('Crystalline_footer.php')?>
</body>
</html>
