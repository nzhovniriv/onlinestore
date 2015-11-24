<?php
$mysqli_cat = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
$result_cat = mysqli_query($mysqli_cat, "SELECT description, price FROM store_catalog WHERE title = '$title_cat'");
mysqli_close($mysqli_cat);
$row_cat = mysqli_fetch_assoc($result_cat);
?>