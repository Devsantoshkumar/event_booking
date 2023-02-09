<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navigation'); ?>

<div class="container" style="min-height: 100vh;">
<div class="row d-flex justify-content-center pt-4">
        <div class="col-10">
        <?php 
            if(count($errors)>0)
            {
            echo '<div class="alert rounded-0 alert-danger alert-dismissible fade show" role="alert">';
                $i = 1;
                foreach($errors as $error){
                    echo "(".$i++.") ".$error."; ";
                }
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        ?>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-10 pb-5 pt-2">
        <div class="card border-0 shadow-sm mb-3">
        <div class="row g-0">
            <div class="col-md-6 p-5">
            <img src="<?= ASSETS ?>/images/signup.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-6 p-5">
            <div class="card-header border-0 bg-white h3 text-center">Reset Password</div>
            <div class="card-body">
                <form method="POST">
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control shadow-none py-2 px-3 rounded-pill" placeholder="New Password">
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="cpassword" class="form-control shadow-none py-2 px-3 rounded-pill" placeholder="Confirm Password">
                </div>
                <small>Login your account. <a href="<?=ROOT ?>/login" class="text-danger fw-bold">Login</a></small>
                <div class="input-group my-3">
                    <input type="submit" class="button border-0 mx-0" value="Reset">
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</div>

<?php $this->view('includes/footer'); ?>