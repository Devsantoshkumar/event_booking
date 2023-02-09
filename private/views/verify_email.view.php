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

            if(count($errors) == 0){
                if(isset($_SESSION['OTPSEND'])){
                    echo '<div class="alert rounded-0 alert-success alert-dismissible fade show" role="alert">';
                    echo $_SESSION['OTPSEND'];
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }else{
                    echo "";
                }
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
            <div class="card-header border-0 bg-white h3 text-center">Email Verification</div>
            <div class="card-body">
                <form method="POST">
                <div class="input-group mb-3">
                    <input type="text" name="otp" class="form-control shadow-none py-2 px-3 rounded-pill" placeholder="Enter 6 digit otp">
                </div>
                <small>OTP is expired. <a href="<?=ROOT ?>/verify_email/otpsend" class="text-danger fw-bold">Send otp again</a></small>
                
                <div class="input-group my-3">
                    <input type="submit" class="button border-0 mx-0" value="Verify">
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