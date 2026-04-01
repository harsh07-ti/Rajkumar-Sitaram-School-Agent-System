<?php
$conn = new mysqli("localhost", "root", "", "school");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Rajkumar Sitaram School</title>
</head>
<body>

<h2>🛠️ Admin Panel</h2>

<!-- Add Student -->
<h3>Student Add करें</h3>
<form method="POST">
    नाम: <input type="text" name="name"><br><br>
    मोबाइल: <input type="text" name="mobile"><br><br>
    कक्षा: <input type="text" name="class"><br><br>
    <button type="submit" name="addStudent">Add Student</button>
</form>

<?php
if(isset($_POST['addStudent'])){
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $class = $_POST['class'];

    $conn->query("INSERT INTO students (name, mobile, class) VALUES ('$name','$mobile','$class')");
    echo "✅ Student Add हो गया";
}
?>

<hr>

<!-- Add Notice -->
<h3>Notice Add करें</h3>
<form method="POST">
    <textarea name="notice"></textarea><br><br>
    <button type="submit" name="addNotice">Add Notice</button>
</form>

<?php
if(isset($_POST['addNotice'])){
    $notice = $_POST['notice'];
    $conn->query("INSERT INTO notice (message) VALUES ('$notice')");
    echo "✅ Notice Add हो गया";
}
?>

<hr>

<h3>📢 सभी Notices</h3>

<?php
$result = $conn->query("SELECT * FROM notice ORDER BY id DESC");

while($row = $result->fetch_assoc()){
    echo "<p>".$row['message']."</p>";
}
?>

</body>
</html>
