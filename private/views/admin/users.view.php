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
                      <span class="pageHeading fs-5">All Users</span>
                      <div class="actionBtns d-flex justify-content-center align-items-center">
                        <div class="pageDate d-flex justify-content-center align-items-center">
                          <input type="date" class="form-control shadow-none" name="date" id="date">
                        </div>
                        <a href="<?=ROOT ?>/users/add" class="add text-decoration-none rounded d-flex justify-content-center align-items-center text-light mx-2"><span class="material-symbols-sharp">add</span></a>
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
                          <div class="card px-3 bg-transparent rounded-0 border-0">
                            <div class="card-body py-0">
                              <div class="counting-data bg-white py-4 shadow-sm">
                              <div class="card-header border-0 bg-white h5 text-uppercase fw-bold text-center">All Users</div>
                                <div class="card-body px-5">
                                <?php if($rows) : ?>
                                    <table class="table">
                                        <tr>
                                          <th>S.No.</th>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Role</th>
                                          <th>Status</th>
                                          <th>Created At</th>
                                          <th>Action</th>
                                        </tr>
                                        <?php $cid = 1; ?>
                                        <?php foreach($rows as $row): ?>
                                        <tr>
                                          <td><?=$cid ?></td>
                                          <td><?=$row->firstname ?> <?=$row->lastname ?></td>
                                          <td><?=$row->email ?></td>
                                          <td class="text-capitalize"><?=$row->rank ?></td>
                                          <?php 
                                             if($row->email_varified == NULL){
                                                 $status = "Unverified";
                                             }else{
                                                  $status = "Verified";
                                             }
                                          ?>
                                          <td class="text-capitalize"><?=$status; ?></td>
                                          <td><?=get_date($row->date); ?></td>
                                          <td>
                                            <a href="<?=ROOT ?>/users/edit/<?=$row->users_id ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="<?=ROOT ?>/users/delete/<?=$row->users_id ?>" class="btn btn-sm btn-danger">Delete</a>
                                          </td>
                                        </tr>
                                        <?php $cid++; ?>
                                        <?php endforeach; ?>
                                    </table>
                                    <?php else:  ?>
                                      <div class="h5 text-center bg-danger text-white p-3">Users are not found at this time</div>
                                    <?php endif; ?>
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