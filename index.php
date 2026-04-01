<?php
$conn = new mysqli("localhost", "root", "", "school");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Panel - Rajkumar Sitaram School</title>
</head>
<body>

<h2>👨‍🎓 Student Panel</h2>

<form method="GET">
    मोबाइल नंबर डालें:
    <input type="text" name="mobile" required>
    <button type="submit">Search</button>
</form>

<?php
if(isset($_GET['mobile'])){
    $mobile = $_GET['mobile'];

    $result = $conn->query("SELECT * FROM students WHERE mobile='$mobile'");

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        echo "<h3>नाम: ".$row['name']."</h3>";
        echo "<h3>कक्षा: ".$row['class']."</h3>";
    } else {
        echo "<p>❌ कोई डेटा नहीं मिला</p>";
    }
}
?>

</body>
</html>
