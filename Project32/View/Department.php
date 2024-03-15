<?php
session_start();
require_once '../functions.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $current_user = $_SESSION['username'];
    $res = getAllByUser($username);
    $currentRole = $res[0]['Role'];
}
$departments = getDepartmentInfo();

$rowsPerPage = 5;
$totalRows = count($departments);
$totalPages = ceil($totalRows / $rowsPerPage);

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = intval($_GET['page']);
} else {
    $currentPage = 1;
}

if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
} elseif ($currentPage < 1) {
    $currentPage = 1;
}

$offset = ($currentPage - 1) * $rowsPerPage;

$currentDepartments = array_slice($departments, $offset, $rowsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }

        .navbar-brand:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
<?php require_once "../View/layout/header_foruser.php"; ?>

<main>
    <h3 class="text-center">Department List</h3>
    <?php if($currentRole == "admin"): ?>
        <a href="../View/department_add.php" class="btn btn-primary">Add more department</a>
    <?php endif; ?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">DepartmentID</th>
            <th scope="col">Department Name</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = ($currentPage - 1) * $rowsPerPage + 1; ?>
        <?php foreach ($currentDepartments as $department): ?>
            <tr>
                <th scope="row"><?php echo $department['DepartmentID']; ?></th>
                <td><?php echo $department['DepartmentName']; ?></td>
                <td><?php echo $department['Address']; ?></td>
                <td><?php echo $department['Email']; ?></td>
                <td><?php echo $department['Phone']; ?></td>
                <td>
                    <?php if($currentRole == "admin"): ?>
                        <a href="department_detail.php?number=<?php echo $department['DepartmentID']; ?>" class="btn btn-primary">Detail</a>
                        <a href="department_update.php?number=<?php echo $department['DepartmentID']; ?>" class="btn btn-success">Update</a>
                        <a href="department_del.php?number=<?php echo $department['DepartmentID']; ?>" class="btn btn-danger">Delete</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item <?php echo ($currentPage == 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?php echo ($currentPage - 1); ?>">Previous</a>
            </li>
            <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                <li class="page-item <?php echo ($page == $currentPage) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?php echo ($currentPage == $totalPages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?php echo ($currentPage + 1); ?>">Next</a>
            </li>
        </ul>
    </nav>
</main>

<?php require_once "../View/layout/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
