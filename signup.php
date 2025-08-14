
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form was submitted
    if (isset($_POST['submit'])) {
        // Determine which button was clicked
        $userType = $_POST['userType'];

        // Handle the form submission based on the button clicked
        switch ($userType) {
            case 'student':
                // Update table for student
                $tableName = "student_table";
                break;
            case 'university':
                // Update table for university
                $tableName = "university_table";
                break;
            case 'sponsor':
                // Update table for sponsor
                $tableName = "sponsor_table";
                break;
            default:
                
                break;
        }

       
        $conn = new mysqli("localhost", "root", "", "projectverse", 3306);
        
        // Check for connection errors
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        
        $uname = $_POST['uname'];
        $upass1 = $_POST['upass1'];
        $upass2 = $_POST['upass2'];
        
        // Insert data into the determined table
        $sql = "INSERT INTO $tableName (username, password, compass) VALUES ('$uname', '$upass1', '$upass2')";
        
        // Execute query
        if ($conn->query($sql) === TRUE) {
            echo "Registered successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Close connection
        $conn->close();
    }
}
?>
