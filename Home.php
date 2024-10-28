<?php 
$page_title = "Home Page";
include('includes/header.php');
include('includes/navbar.php');
?>
<!-- Hero Section -->
<div class="bg-light py-5 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4">Welcome to Cosa's System</h1>
                <p class="lead">A Secure Login and Registration System with Email Verification</p>
                <a href="register.php" class="btn btn-dark-green btn-lg">
                    <i class="fas fa-user-plus"></i> Get Started
                </a>
                <a href="login.php" class="btn btn-outline-dark-green btn-lg ms-2">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <i class="fas fa-shield-alt fa-3x text-dark-green mb-3"></i>
                <h5>Secure Authentication</h5>
                <p>We use the latest encryption and security techniques to ensure your data is protected.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-envelope fa-3x text-dark-green mb-3"></i>
                <h5>Email Verification</h5>
                <p>All users are required to verify their email address, ensuring account validity and security.</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-user-check fa-3x text-dark-green mb-3"></i>
                <h5>User-Friendly Interface</h5>
                <p>Our platform is designed with simplicity in mind, providing a smooth user experience.</p>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-dark-green {
        background-color: #006600; /* Dark green background */
        color: #fff;
        border: none;
    }
    .btn-dark-green:hover {
        background-color: #004d00; /* Slightly darker green */
    }
    .btn-outline-dark-green {
        color: #006600; /* Dark green text */
        border-color: #006600;
    }
    .btn-outline-dark-green:hover {
        background-color: #004d00; /* Dark green background on hover */
        color: #fff;
        border-color: #004d00;
    }
    .text-dark-green {
        color: #006600; /* Dark green color for icons */
    }
</style>


<?php include('includes/footer.php'); ?>