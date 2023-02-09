<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navigation'); ?>


<!-- home image banner style start -->
<div class="container-fluid py-2 bg-white">
    <div class="row tw-homeimg px-5 py-2">
        <div class="col-lg-6 col-12 pt-4">
            <div class="card border-md border-0">
            <h1 class="h1 py-3">Find Your Next Event Destination: <br> Book with Confidence.</h1>
            <a href="#" class="eButton d-block py-2 px-3 rounded text-white fw-bold">Book Now</a>
            </div>
        </div>
        <div class="col-lg-6 order-lg-last order-first col-12">
            <div class="card border-0">
                <img src="<?=ASSETS ?>/images/home_page.jpg" class="img-fluid" alt="...">
            </div>
        </div>
    </div>
</div>
<!-- home image banner style end -->


<!-- event search section start -->
<div class="container-fluid py-4 bg-white">
        <form class="container shadow py-3 p-5">
            <div class="row py-4">
                <div class="col fs-6 fw-bold px-0">Where is your event!</div>
            </div>
            <div class="row gap-4">
                <div class="col d-flex flex-column position-relative input-group formGroup border">
                    <label for="sate" class="position-absolute bg-white">Location</label>
                    <select name="state" id="" class="form-control w-100 bg-transparent shadow-none border-0">
                        <option value="up">Uttar Pradesh</option>
                        <option value="up">Uttar Pradesh</option>
                        <option value="up">Uttar Pradesh</option>
                        <option value="up">Uttar Pradesh</option>
                        <option value="up">Uttar Pradesh</option>
                    </select>

                </div>
                <div class="col d-flex flex-column position-relative input-group formGroup border">
                    <label for="sate" class="position-absolute bg-white">Select-city</label>
                    <select name="state" id="" class="form-control w-100 bg-transparent shadow-none border-0">
                        <option value="up">Uttar Pradesh</option>
                        <option value="up">Uttar Pradesh</option>
                        <option value="up">Uttar Pradesh</option>
                        <option value="up">Uttar Pradesh</option>
                        <option value="up">Uttar Pradesh</option>
                    </select>
                </div>
                <div class="col d-flex flex-column position-relative input-group formGroup border">
                    <label for="sate" class="position-absolute bg-white">Start-date</label>
                    <input type="date" class="form-control w-100 bg-transparent shadow-none border-0" placeholder="Sate">
                </div>
                <div class="col d-flex flex-column position-relative input-group formGroup border">
                    <label for="sate" class="position-absolute bg-white">End-date</label>
                    <input type="date" class="form-control w-100 bg-transparent shadow-none border-0" placeholder="Sate">
                </div>
            </div>
            <div class="row py-3">
                <div class="col px-0 input-group formGroup d-flex justify-content-end">
                     <button class="eButton d-block py-2 px-3 rounded text-white fw-bold">Search</button>
                </div>
            </div>
        </form>
    </div>
<!-- event search section end -->


<!-- services card start -->
<div class="container-fluid py-5 bg-white">
        <div class="container py-3">
            <div class="row">
                <div class="col">
                    <h1 class="text-center fw-bold h3 py-2">Best services for you</h1>
                    <p class="text-center w-50 m-auto pb-4 fs-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error molestias doloribus necessitatibus vitae ex a, nisi cumque deserunt laudantium cum.</p>
                </div>
            </div>
            <?php if($rows): ?>
            <div class="services">

                <?php foreach($rows as $row): ?>
                <div class="service rounded shadow">
                    <div class="imgBox rounded"><img src="<?=ROOT ?>/uploads/<?=$row->image?>" class="rounded-top" alt=""></div>
                     <div class="p-3">
                        <div class="title d-flex align-items-center justify-content-between">
                            <h1 class="h6 fw-bold"><?=$row->category?></h1>
                            <span>4.5</span>
                         </div>
                         <p class="description text-muted"><?=$row->description ?></p>
                         <div class="bookBtn d-flex justify-content-center">
                            <a href="<?=ROOT ?>/book_event/<?=$row->categorys_id ?>" class="p-1 rounded px-4 eButton text-white text-decoration-none">Explore More</a>
                         </div>
                     </div>
                </div>
                <?php endforeach; ?>

            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- service card end -->


    <!-- client review start -->
    <div class="container-fluid bg-white py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                <h1 class="text-center fw-bold h3 py-2">Our clients reviews</h1>
                    <p class="text-center w-50 m-auto pb-4 fs-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error molestias doloribus necessitatibus vitae ex a, nisi cumque deserunt laudantium cum.</p>
                </div>
            </div>
            <div class="owl-carousel owl-theme">
                <div class="item profile border m-2">
                    <div class="profileBox">
                        <img src="<?=ASSETS ?>/images/man8.jpg" alt="">
                    </div>
                    <span class="text-center d-block fw-bold">Santosh Kumar</span>
                    <p class="review text-center p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <ul class="stars d-flex justify-content-center pe-4">
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                    </ul>
                </div>
                <div class="item profile border m-2">
                    <div class="profileBox">
                        <img src="<?=ASSETS ?>/images/man8.jpg" alt="">
                    </div>
                    <span class="text-center d-block fw-bold">Santosh Kumar</span>
                    <p class="review text-center p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <ul class="stars d-flex justify-content-center pe-4">
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                    </ul>
                </div>
                <div class="item profile border m-2">
                    <div class="profileBox">
                        <img src="<?=ASSETS ?>/images/man8.jpg" alt="">
                    </div>
                    <span class="text-center d-block fw-bold">Santosh Kumar</span>
                    <p class="review text-center p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <ul class="stars d-flex justify-content-center pe-4">
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                    </ul>
                </div>
                <div class="item profile border m-2">
                    <div class="profileBox">
                        <img src="<?=ASSETS ?>/images/man8.jpg" alt="">
                    </div>
                    <span class="text-center d-block fw-bold">Santosh Kumar</span>
                    <p class="review text-center p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <ul class="stars d-flex justify-content-center pe-4">
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                    </ul>
                </div>
                <div class="item profile border m-2">
                    <div class="profileBox">
                        <img src="<?=ASSETS ?>/images/man8.jpg" alt="">
                    </div>
                    <span class="text-center d-block fw-bold">Santosh Kumar</span>
                    <p class="review text-center p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <ul class="stars d-flex justify-content-center pe-4">
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                    </ul>
                </div>
                <div class="item profile border m-2">
                    <div class="profileBox">
                        <img src="<?=ASSETS ?>/images/man8.jpg" alt="">
                    </div>
                    <span class="text-center d-block fw-bold">Santosh Kumar</span>
                    <p class="review text-center p-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <ul class="stars d-flex justify-content-center pe-4">
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                        <li><span class="material-symbols-sharp">star</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- client review end -->

<?php $this->view('includes/footer'); ?>


<script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                    },
                    600:{
                        items:3,
                    },
                    1000:{
                        items:4,
                    }
                }
            })
        });

    </script>