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
            <img src="<?=ASSETS ?>/images/signup.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-6 p-5">
            <div class="card-header border-0 bg-white h3 text-center">Signup</div>
            <div class="card-body">
                <form method="post">
                <div class="input-group mb-3">
                    <input type="text" name="firstname" class="form-control shadow-none py-2 px-3 rounded-pill" placeholder="First name" value="<?=get_val('firstname'); ?>">
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="lastname" class="form-control shadow-none py-2 px-3 rounded-pill" placeholder="Last name" value="<?=get_val('lastname'); ?>">
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control shadow-none py-2 px-3 rounded-pill" placeholder="Email" value="<?=get_val('email'); ?>">
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control shadow-none py-2 px-3 rounded-pill" placeholder="password">
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="cpassword" class="form-control shadow-none py-2 px-3 rounded-pill" placeholder="confirm password">
                </div>
                <small>Already have an account. <a href="<?=ROOT ?>/login" class="text-danger fw-bold">Login</a></small>
                <div class="input-group my-3">
                    <button type="submit" class="button border-0 mx-0 formBTN">Signup</button>
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