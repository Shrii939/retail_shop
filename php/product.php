<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sshop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/product.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="product.php">product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="search.php">display</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="update.php">update</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <form action="../php/product.php" method="post">
        <div class="container mt-5 border p-5">
            <div class="text-center m-4 text-dark">
                <h1>Product page</h1>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="pname" placeholder="product name" required />
                <label for="floatingInput">product name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="cost" required name="pprice" />
                <label for="floatingInput">product cost</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="stock" required name="pstock" />
                <label for="floatingInput">product stock</label>
            </div>
            <div>
                <button name="save">
                    save
                    <span class="followers" name="save"></span>
                </button>
            </div>
        </div>
    </form>
    <form class="m-3" action="" method="post">
        <button name="display" class="btn btn-outline-success" type="submit">display</button>
    </form>

    <?php
    if (isset($_POST["display"])) {
        echo "<div class='container table table-bordered table-responsive-sm '>";
        echo " <table class='table'>";
        echo "<thead>";
        echo "  <tr>";
        echo "    <th>Product ID</th>";
        echo "    <th>Product</th>";
        echo "    <th>Price</th>";
        echo "    <th>Stock</th>";
        echo "  </tr>";
        echo " </thead>";
        echo "<tbody>";
        // Fetch data from the database
        $sql = "SELECT * FROM product";
        $result = $conn->query($sql);
        // Loop through each row of data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["pid"] . "</td>";
            echo "<td>" . $row["pname"] . "</td>";
            echo "<td>" . $row["pprice"] . "</td>";
            echo "<td>" . $row["pstock"] . "</td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
    </table>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</html>

<?php
if (isset($_POST["save"])) {
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pstock = $_POST['pstock'];
    echo "inside";
    $sql = "INSERT INTO product (pname, pprice, pstock) VALUES ('$pname' ,'$pprice', '$pstock')";
    echo "$sql";
    if (mysqli_query($conn, $sql)) {
        echo "record created successfully";
        header("Location: product.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>