<?php
session_start();
require_once '../functions.php';

// Lấy danh sách nhân viên từ hàm getEmployeeInfo()
$employees = getEmployeeInfo();

// Số dòng hiển thị trên mỗi trang
$rowsPerPage = 5;

// Tính tổng số trang dựa trên số dòng và số lượng nhân viên
$totalRows = count($employees);
$totalPages = ceil($totalRows / $rowsPerPage);

// Xác định trang hiện tại
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = intval($_GET['page']);
} else {
    $currentPage = 1;
}

// Đảm bảo trang hiện tại không vượt quá số trang tổng cộng
if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
} elseif ($currentPage < 1) {
    $currentPage = 1;
}

// Tính offset (vị trí bắt đầu) cho trang hiện tại
$offset = ($currentPage - 1) * $rowsPerPage;

// Lấy danh sách nhân viên cho trang hiện tại
$currentEmployees = array_slice($employees, $offset, $rowsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
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
        <h3 class="text-center">Employee List</h3>
        <a href="../View/employee_add.php" class="btn btn-primary">Add more Employee</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Ordinal Number</th>
                    <th scope="col">FullName</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">MobilePhone</th>
                    <th scope="col">Position</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = ($currentPage - 1) * $rowsPerPage + 1; ?>
                <?php foreach ($currentEmployees as $employee): ?>
                    <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><?php echo $employee['FullName']; ?></td>
                        <td><?php echo $employee['Address']; ?></td>
                        <td><?php echo $employee['Email']; ?></td>
                        <td><?php echo $employee['MobilePhone']; ?></td>
                        <td><?php echo $employee['Position']; ?></td>
                        <td>
                            <a href="employee_detail.php?num=<?php echo $i; ?>" class="btn btn-primary">Details</a>
                            <a href="employee_update.php?num=<?php echo $i; ?>" class="btn btn-success">Update</a>
                            <a href="employee_del.php?num=<?php echo $i; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Hiển thị phân trang -->
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
