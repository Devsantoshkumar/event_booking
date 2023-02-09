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
                      <span class="pageHeading fs-5">New Event</span>
                      <div class="actionBtns d-flex justify-content-center align-items-center">
                        <div class="pageDate d-flex justify-content-center align-items-center">
                          <input type="date" class="form-control shadow-none" name="date" id="date">
                        </div>
                        <a href="<?=ROOT ?>/events" class="add text-decoration-none rounded d-flex justify-content-center align-items-center text-light mx-2"><span class="material-symbols-sharp">visibility</span></a>
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
                        <div class="card-header border-0 bg-white text-muted h3 fw-bold text-center">Add Event</div>
                          <div class="card-body px-5">
                              <form method="POST" enctype="multipart/form-data">
                              
                              <div class="input-group mb-3">
                                  <input type="text" name="title" class="form-control shadow-none" value="<?=get_val('title')?>" placeholder="Event name">
                              </div>

                              <div class="input-group mb-3">
                                  <textarea name="description" class="form-control shadow-none" placeholder="Description"><?=get_val('description')?></textarea>
                              </div>

                              <div class="input-group mb-3">
                                  <input type="text" name="price" class="form-control shadow-none" value="<?=get_val('price')?>" placeholder="Event price">
                              </div>

                              <div class="input-group mb-3">
                                  <textarea name="address" class="form-control shadow-none" placeholder="Event address"><?=get_val('address')?></textarea>
                              </div>

                              <div class="input-group mb-3">
                                <?php
                                $state = new State();
                                $states = $state->findAll();
                                if($states):
                                ?>
                                <select name="state" class="form-control shadow-none" id="">
                                  <option value="">Select State</option>
                                  <?php foreach($states as $row): ?>
                                  <option value="<?=$row->states_id ?>"><?=$row->state ?></option>
                                  <?php endforeach; ?>
                                </select>
                                <?php endif; ?>
                              </div>

                              <div class="input-group mb-3">
                                <?php
                                $city = new City();
                                $cities = $city->findAll();
                                if($cities):
                                ?>
                                <select name="city" class="form-control shadow-none" id="">
                                  <option value="">Select City</option>
                                  <?php foreach($cities as $row): ?>
                                  <option value="<?=$row->citys_id ?>"><?=$row->city ?></option>
                                  <?php endforeach; ?>
                                </select>
                                <?php endif; ?>
                               </div>

                              <div class="input-group mb-3">
                                <?php
                                $category = new Category();
                                $categories = $category->findAll();
                                if($categories):
                                ?>
                                <select name="category" class="form-control shadow-none" id="">
                                  <option value="">Select Category</option>
                                  <?php foreach($categories as $row): ?>
                                  <option value="<?=$row->categorys_id ?>"><?=$row->category ?></option>
                                  <?php endforeach; ?>
                                </select>
                                <?php endif; ?>
                              </div>

                              <div class="input-group mb-3">
                              <input type="text" name="meta_keywords" class="form-control shadow-none" value="<?=get_val('meta_keywords')?>" placeholder="Meta Keywords">
                              </div>

                              <div class="input-group mb-3">
                                  <textarea name="meta_description" class="form-control shadow-none" placeholder="Meta Description"><?=get_val('meta_description')?></textarea>
                              </div>

                              <div class="input-group mb-5 d-flex justify-content-between align-items-center">
                                    <label for="file">Upload Image: </label>
                                    <input type="file" name="image" class="form-control ms-2 shadow-none">
                              </div> 

                              <div class="form-check mb-3">
                                  <input type="radio" class="form-check-input" name="status" value="active">Active
                              </div>

                              <div class="form-check mb-3">
                                  <input type="radio" class="form-check-input" name="status" value="inactive">Inactive
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