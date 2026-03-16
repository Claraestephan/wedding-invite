<?php
include "db.php";

print_r($_POST);

// الحصول على البيانات من الفورم
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$guests = intval($_POST['guests']);
$message = trim($_POST['message']);

// التحقق من صحة الإيميل
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    die("Invalid email");
}

// إدخال البيانات أو تحديثها إذا موجودة مسبقاً
$stmt = $conn->prepare("
INSERT INTO guests (name,email,phone,guests_number,message)
VALUES (?,?,?,?,?)
ON DUPLICATE KEY UPDATE
name=VALUES(name),
guests_number=VALUES(guests_number),
message=VALUES(message)
");

$stmt->bind_param("sssds",$name,$email,$phone,$guests,$message);

if($stmt->execute()){
    echo "RSVP saved successfully";
}else{
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>