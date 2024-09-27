<?php 
$page_title = "Login Form";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Login Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="form-group mb-3"> 
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group mb-3"> 
                                <label for="phone">phone Number</label>
                                <input type="text" id="phone" name="phone" class="form-contrrol"> 
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>  
                            <div class="form-group mb-3">
                                <label for="confirm_password">Confirm_Password</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name=""
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>