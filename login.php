<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $uname = $_POST['uname'];
    $upass = $_POST['upass']; 

    
    $conn = new mysqli("localhost", "root", "", "projectverse", 3306);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $userType = $_POST['userType'];
    switch ($userType) {
        case 'student':
            $tableName = "student_table";
            $redirectPage = "../student/student.html";
            break;
        case 'university':
            $tableName = "university_table";
            $redirectPage = "../university/university.html";
            break;
        case 'sponsor':
            $tableName = "sponsor_table";
            $redirectPage = "../sponsor/sponsor.html";
            break;
        default:
            
            break;
    }


    $sql = "SELECT * FROM $tableName WHERE username='$uname' AND password='$upass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        header("Location: $redirectPage");
        exit(); 
    } else {
        
        echo "Invalid username or password!";
    }

   
    $conn->close();
    
}
?>
