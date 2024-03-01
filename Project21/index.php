<?php
    $products = [
        [
            "name" => "Product 1",
            "price" => "$15.99",
            "description" => "This is  product 1.",
            "image" => "assets/images/product.jpg"
        ],
        [
            "name" => "Product 2",
            "price" => "$15.99",
            "description" => "This is  product 2.",
            "image" => "assets/images/product.jpg"
        ],
        [
            "name" => "Product 3",
            "price" => "$15.99",
            "description" => "This is  product 3.",
            "image" => "assets/images/product.jpg"
        ],
        [
            "name" => "Product 4",
            "price" => "$15.99",
            "description" => "This is  product 4.",
            "image" => "assets/images/product.jpg"
        ],
        [
            "name" => "Product 5",
            "price" => "$15.99",
            "description" => "This is  product 5.",
            "image" => "assets/images/product.jpg"
        ],
        [
            "name" => "Product 6",
            "price" => "$15.99",
            "description" => "This is  product 6.",
            "image" => "assets/images/product.jpg"
        ],
        [
            "name" => "Product 7",
            "price" => "$15.99",
            "description" => "This is  product 7.",
            "image" => "assets/images/product.jpg"
        ]

]; 
$itemsPerPage = 4;
$currentPage = isset($_GET['page']) ? $_GET['page'] :  1;// lấy curent page
$totalPages = ceil(count($products) / $itemsPerPage);
$currentPageItems = array_slice($products , ($currentPage - 1) * $itemsPerPage , $itemsPerPage);
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegetable Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .pagination{
            margin-top : 10px;
            margin-left: 130px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Vegetable Shop</h1>
        <div class="row">
            <?php foreach($currentPageItems as $product) {?>
                <div class="col-3">
                    <div class="card">
                        <img src="assets/images/product.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name'] ?></h5>
                            <p class="card-text"><?php echo $product['description'] ?></p>
                            <p class="card-text"><?php echo $product['price'] ?></p>
                            <a href="#" class="btn btn-primary">Add to cart</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if($currentPage>1): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $currentPage - 1?>">Previous</a></li>
                <?php endif; ?> 
                <?php for ($i = 1;$i <= $totalPages; $i++): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php  echo $i ?>"><?php echo $i ?></a></li>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages):?>
                    <li class="page-item"><a class="page-link" href="?page<?php echo $currentPage ?>">Next</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
</body>
</html>