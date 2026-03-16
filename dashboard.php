<?php
include "db.php";
$result = $conn->query("SELECT * FROM guests ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Wedding RSVP Dashboard</title>
<style>
body{ font-family:Arial; background:#f4f4f4; text-align:center; }
table{ border-collapse:collapse; margin:auto; width:90%; background:white; }
th,td{ padding:12px; border:1px solid #ddd; }
th{ background:#c49b7a; color:white; }
tr:nth-child(even){ background:#f9f9f9; }
</style>
</head>
<body>
<h2>Wedding RSVP List</h2>
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Guests</th>
<th>Message</th>
<th>Date</th>
</tr>

<?php
while($row = $result->fetch_assoc()){
  echo "<tr>";
  echo "<td>".$row['name']."</td>";
  echo "<td>".$row['email']."</td>";
  echo "<td>".$row['phone']."</td>";
  echo "<td>".$row['guests_number']."</td>";
  echo "<td>".$row['message']."</td>";
  echo "<td>".$row['created_at']."</td>";
  echo "</tr>";
}
?>
</table>
</body>
</html>