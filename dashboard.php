<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['authenticated'])) {
    $_SESSION['status'] = "Please Login to access User Dashboard";
    header('Location: login.php');
    exit(0);
}

$page_title = "Dashboard";
include('includes/header.php');
include('includes/navbar.php');
?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <?php include('includes/alert.php'); ?>

            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-dark-green text-white text-center rounded-top">
                    <h3><i class="bi bi-person-circle"></i> User Dashboard</h3>
                </div>
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <h5>
                            <?= isset($_SESSION['auth_user']['username']) 
                                ? "Welcome, <strong>{$_SESSION['auth_user']['username']}</strong>!"
                                : "Welcome, Guest!"; 
                            ?>
                        </h5>
                        <p class="text-muted">You have successfully logged in. Below you can access your profile information and settings.</p>
                    </div>

                    <!-- User Info -->
                    <div class="row text-center mb-3">
                        <div class="col-md-4">
                            <h5 class="text-muted">Username</h5>
                            <p class="text-dark-green"><?= $_SESSION['auth_user']['username']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-muted">Phone No.</h5>
                            <p class="text-dark-green"><?= $_SESSION['auth_user']['phone']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-muted">Email</h5>
                            <p class="text-dark-green"><?= $_SESSION['auth_user']['email']; ?></p>
                        </div>
                    </div>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col-md-8 -->
    </div> <!-- /.row -->
</div> <!-- /.container -->

<style>
    .bg-dark-green {
        background-color: #006600; /* Dark green for the header */
    }
    .text-dark-green {
        color: #006600; /* Dark green for text */
    }
</style>


<?php include('includes/footer.php'); ?>