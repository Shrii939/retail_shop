<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbms = "shop";
$link = mysqli_connect($servername, $username, $password, $dbms);
$conn = mysqli_select_db($link, $dbms);

if ($conn) {
    echo ("connected");
} else {
    die("not connected " . mysqli_connect_error());
}

?>
<html>

<head>
    <title>Items-page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <form class="form-inline my-4 my-lg-2 p-3" method="post">
        <input class="form-control mr-sm-2" type="text" name="product_name" placeholder="Enter the product">
        <input class="form-control mr-sm-2" type="text" name="product_price" placeholder="Enter the price">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="save">submit</button>
    </form>
    <h1>Hello welcome to items page you will see the itms shortlly</h1>
    <form class="form-inline my-4 my-lg-2 p-3" method="post">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="search" name="search">Search</button>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>

<?php

if (isset($_POST['save'])) {
    mysqli_query($link, "INSERT INTO product (product_name, product_price) VALUES('$_POST[product_name]', '$_POST[product_price]')");
    echo "insertion done";
}

if (isset($_POST['search'])) {
    $res = mysqli_query($link, "SELECT * FROM product");
    echo "<table>";
    echo "<tr >";
    echo "<th>";
    echo "id";
    echo "</th>";
    echo "<th>";
    echo "name";
    echo "</th>";
    echo "<th>";
    echo "price";
    echo "</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_array($res)) {
        echo "<tr >";
        echo "<th>";
        echo $row["product_id"];
        echo "</th>";
        echo "<th>";
        echo $row["product_name"];
        echo "</th>";
        echo "<th>";
        echo $row["product_price"];
        echo "</th>";
        echo "</tr>";
    }
}
?>