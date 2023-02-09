<?php $this->view('admin-includes/header'); ?>
<?php $this->view('admin-includes/navigation'); ?>

<div class="container-fluid">
            <div class="row flex-nowrap">
              <!-- sidebar start -->
              <?php $this->view('admin-includes/sidebar'); ?>
              <!-- sidebar end -->
                <div class="col">
                <?php $this->view('admin-includes/topbar'); ?>


                   <div class="row p-4">
                    <div class="col d-flex justify-content-between align-items-center">
                      <span class="pageHeading fs-5">New Category</span>
                      <div class="actionBtns d-flex justify-content-center align-items-center">
                        <div class="pageDate d-flex justify-content-center align-items-center">
                          <input type="date" class="form-control shadow-none" name="date" id="date">
                        </div>
                        <a href="<?=ROOT ?>/users" class="add text-decoration-none rounded d-flex justify-content-center align-items-center text-light mx-2"><span class="material-symbols-sharp">visibility</span></a>
                        <span class="add rounded d-flex justify-content-center align-items-center text-light mx-2"><span class="material-symbols-sharp">filter_list</span></span>
                      </div>
                    </div>
                  </div>


                  <div class="row d-flex justify-content-center pt-1">
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


                  <div class="row">
                    <div class="col">
                    <div class="card px-5 bg-transparent rounded-0 border-0">
                      <div class="card-body">
                        <div class="counting-data bg-white py-4 shadow-sm">
                        <div class="card-header border-0 bg-white text-muted h3 fw-bold text-center">Add category</div>
                          <div class="card-body px-5">
                              <form method="POST" enctype="multipart/form-data">
                              
                              <div class="input-group mb-3">
                                  <input type="text" name="firstname" class="form-control shadow-none" value="<?=get_val('firstname')?>" placeholder="First name">
                              </div>

                              <div class="input-group mb-3">
                                  <input type="text" name="lastname" class="form-control shadow-none" value="<?=get_val('lastname')?>" placeholder="Last name">
                              </div>

                              <div class="input-group mb-3">
                                  <input type="email" name="email" class="form-control shadow-none" value="<?=get_val('email')?>" placeholder="Email id">
                              </div>

                              <div class="input-group mb-3">
                                  <input type="password" name="password" class="form-control shadow-none" placeholder="Create new password">
                              </div>

                              <div class="input-group mb-3">
                                  <input type="password" name="cpassword" class="form-control shadow-none" placeholder="Create new password">
                              </div>

                              <select class="form-select shadow-none mb-3" name="rank">
                                    <option selected>Select Role</option>
                                    <option value="admin">admin</option>
                                    <option value="creator">creator</option>
                                    <option value="normal">normal</option>
                              </select>

                              <div class="input-group mb-3">
                                  <input type="file" name="image" class="form-control shadow-none">
                              </div> 
                              
                              <div class="input-group my-3">
                                  <button type="submit" class="add rounded border-0 d-flex justify-content-center align-items-center text-light px-4">Add</button>
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
    </div>




<?php $this->view('admin-includes/footer'); ?>