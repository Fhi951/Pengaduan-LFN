<?php
include "../config/database.php";
mysqli_query($conn, "DELETE FROM users WHERE id=$_GET[id]");
header("Location: user_list.php");