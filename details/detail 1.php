<?php
include "../actions/display_detail_action.php";
include "../actions/display_cart_action.php";
include "../actions/display_search_action.php";
include "../actions/cart_action.php";

if (isset($_GET['product_id']) ) {
    $productId = $_GET['product_id'];
} else {
    echo "Product ID not provided in the URL.";
}
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Adding to Cart</title>
</head>

<body> -->

<!-- Confirmation form -->
<!-- <form id="product_id" action="../actions/cart_action.php" method="POST"> -->
<!-- Include the hidden input field for productId -->
<!-- <input name="product_id" value=" -->
<?php
//  echo $productId;
?>
<!-- "> -->

<!-- Button to trigger confirmation -->
<!-- <button type="submit" class="btn btn-outline-dark btn-square">Add to Cart</button>
    </form>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Homepage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">

    </div>
    <div class="col-lg-6 text-center text-lg-right">
        <div class="d-inline-flex align-items-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-toggle="dropdown">My Account</button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button class="dropdown-item" type="button">Sign in</button>
                    <button class="dropdown-item" type="button">Sign up</button>
                    <button class="dropdown-item" type="button">Help</button>
                </div>
            </div>
            <div class="btn-group mx-2">
                <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-toggle="dropdown">CEDIS</button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button class="dropdown-item" type="button">EUR</button>
                    <button class="dropdown-item" type="button">GBP</button>
                    <button class="dropdown-item" type="button">CAD</button>
                </div>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-toggle="dropdown">EN</button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button class="dropdown-item" type="button">FR</button>
                    <button class="dropdown-item" type="button">AF</button>
                    <button class="dropdown-item" type="button">RU</button>
                </div>
            </div>
        </div>
        <div class="d-inline-flex align-items-center d-block d-lg-none">
            <a href="" class="btn px-0 ml-2">
                <i class="fas fa-heart text-dark"></i>
                <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
            </a>
            <a href="" class="btn px-0 ml-2">
                <i class="fas fa-shopping-cart text-dark"></i>
                <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
            </a>
        </div>
    </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="" class="text-decoration-none">
                <span class="">Welcome</span>
                <span class="">Shopper</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form action="../actions/search_action.php" method="POST">
                <div class="input-group">
                    <input type="text" class="form-control" id="searchQuery" name="searchQuery" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Customer Service</p>
            <h5 class="m-0">002233456789</h5>
        </div>
    </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="../actions/seller_buyer_home_action.php" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Ecom</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Xpress</span>
                </a>
                <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">

                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Ecom</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Xpress</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="../actions/seller_buyer_home_action.php" class="nav-item nav-link">Home</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories<i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                    <a href="shop fashion.html" class="dropdown-item">Fashion</a>
                                    <a href="shop electronics.html" class="dropdown-item">Electronics</a>
                                    <a href="shop skincare.html" class="dropdown-item">Skincare</a>
                                    <a href="shop stationery.html" class="dropdown-item">Stationery</a>
                                    <a href="shop hygiene.html" class="dropdown-item">Hygiene</a>
                                    <a href="shop fruits and veggies.html" class="dropdown-item">Fruit&Veggies</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="../views/cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
                                    <?php getCartCount(); ?>
                                </span>                            
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->




    <!-- Shop Detail Start -->
                    <?php
                        displayProductDetails($productId);
                    ?>
                    <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p>Designed for the modern adventurer, this stylish bag seamlessly blends fashion with functionality.</p>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <h4 class="mb-3">Additional Information</h4>
                            <p>Crafted from durable yet lightweight materials, it features multiple compartments and pockets to keep your essentials organized on the go. Whether you're navigating the city streets or embarking on a weekend getaway, our Urban Explorer Backpack is the perfect companion for your daily adventures.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Spacious main compartment for all your essentials
                                        </li>
                                        <li class="list-group-item px-0">
                                            Water-resistant material keeps your belongings dry
                                        </li>
                                        <li class="list-group-item px-0">
                                            Adjustable straps for a comfortable fit
                                        </li>
                                        <li class="list-group-item px-0">
                                            Padded laptop sleeve to protect your tech gear
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">
                                            Lightweight material for easy carrying
                                        </li>
                                        <li class="list-group-item px-0">
                                            Durable construction for long-lasting use
                                        </li>
                                        <li class="list-group-item px-0">
                                            Stylish and modern design for urban adventurers
                                        </li>
                                        <li class="list-group-item px-0">
                                            Multiple pockets for organization on the go
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">1 review for "Brown Quilt bag"</h4>
                                    <div class="media mb-4">
                                        <img src="../img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6>John Doe<small> - <i>01 Jan 2024</i></small></h6>
                                            <div class="text-primary mb-2">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p>Very spacious</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="../img/iron.jpeg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Iron</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>GHC123.00</h5>
                                <h6 class="text-muted ml-2"><del>GHC123.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="../img/hoodie.jpeg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Hoodie</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>GHC300.00</h5>
                                <h6 class="text-muted ml-2"><del>GHC300.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="../img/phone.jpeg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">Iphone</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>GHC1500.00</h5>
                                <h6 class="text-muted ml-2"><del>GHC1500.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="../img/sharpeners.jpeg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">sharpeners</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>GHC3.00</h5>
                                <h6 class="text-muted ml-2"><del>GHC3.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="../img/charger.jpeg" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">charger</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>GHC123.00</h5>
                                <h6 class="text-muted ml-2"><del>GHC123.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4"></p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, Tema,Ghana</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>ecomxpress@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>0200342465</p>
            </div>
            <div class="col-md-4 mb-5">
                <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Categories</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Details</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Cart</a>
                    <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                    <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                <p>For Promotion,Sales and Discounts </p>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Your Email Address">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Sign Up</button>
                        </div>
                    </div>
                </form>
                <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                <div class="d-flex">
                    <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

<!-- http://localhost/Web Technologies Team Folder/GitHub/Ecommerce-WebTech-Team5/FrontendEcomXpress/detail 1.php -->