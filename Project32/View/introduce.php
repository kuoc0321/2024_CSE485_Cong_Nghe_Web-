<?php 
    require_once '../functions.php';
    $Departmentnum = getNumerDepartments();
    $EmployeeNum = getNumberEmployee();
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
</head>
</head>
<body>
    <?php include '../View/layout/header_foruser.php';?>
	<h1>Our Story</h1>
	<p>SALES<br>
	September 19, 2019 - One Mount Group was established with the ambition of<br>
	creating Vietnam's largest technological ecosystem providing solutions and services<br>
	along the entire value chain in the financial services, distribution, real estate, and<br>
	retail sectors.<br>
	Starting with VinShop, a dedicated retail app enabling independent shop owners to<br>
	grow their business via tech enabled supply chain and inventory management.<br>
	VinID, a super app and Vietnam's largest consumer loyalty program integrating<br>
	many functions such as payment, housing management, goods purchase, and<br>
	financial services. And OneHousing, a one-stop destination for all needs in housing, supporting<br>
	buying, selling, investing and other real-estate-related services.</p>

    <p>    "Our company currently consists of <?php echo $Departmentnum ?> units with approximately <?php echo $EmployeeNum ?> employees."</p>
	<img src="../public/image/logo2.png" alt="">
	<?php
	require_once "../View/layout/footer.php";
	?>

</body>

</html>