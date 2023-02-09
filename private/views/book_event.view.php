<?php $this->view('includes/header'); ?>
<?php $this->view('includes/navigation'); ?>

<!-- home project section style start -->
<div class="container-fluid bg-light pb-5 position-relative">

        <div class="row eventBanner">
            <div class="col px-0 bannerBox">
                <img src="<?=ASSETS ?>/images/event1.jpg" alt="">
                <div class="imgWrapper">
                    <h1 class="text-center text-white fw-bold">Wedding Events</h1>
                </div>
            </div>
        </div>

        <div class="row exploreEvents">
            <div class="col">
                
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="h2 fw-bold pt-4">Explore Events</h1>
                    <ul class="list-group list-group-horizontal timeBar py-2">
                        <li class="list-group-item px-2 border-0 bg-transparent"><a href="#" class="text-nowrap rounded-pill text-decoration-none text-capitalize">All</a></li>
                        <li class="list-group-item px-2 border-0 bg-transparent"><a href="#" class="text-nowrap rounded-pill text-decoration-none text-capitalize">Today</a></li>
                        <li class="list-group-item px-2 border-0 bg-transparent"><a href="#" class="text-nowrap rounded-pill text-decoration-none text-capitalize">Tomorrow</a></li>
                        <li class="list-group-item px-2 border-0 bg-transparent"><a href="#" class="text-nowrap rounded-pill text-decoration-none text-capitalize">This Week</a></li>
                        <li class="list-group-item px-2 border-0 bg-transparent"><a href="#" class="text-nowrap rounded-pill text-decoration-none text-capitalize">This Weekend</a></li>
                        <li class="list-group-item px-2 border-0 bg-transparent"><a href="#" class="text-nowrap rounded-pill text-decoration-none text-capitalize">Next Week</a></li>
                        <li class="list-group-item px-2 border-0 bg-transparent"><a href="#" class="text-nowrap rounded-pill text-decoration-none text-capitalize">Next Weekend</a></li>
                        <li class="list-group-item px-2 border-0 bg-transparent"><a href="#" class="text-nowrap rounded-pill text-decoration-none text-capitalize">This Month</a></li>
                        <li class="list-group-item px-2 border-0 bg-transparent"><a href="#" class="text-nowrap rounded-pill text-decoration-none text-capitalize">Next Month</a></li>
                        <li class="list-group-item px-2 border-0 bg-transparent"><a href="#" class="text-nowrap rounded-pill text-decoration-none text-capitalize">This year</a></li>
                        <li class="list-group-item px-2 border-0 bg-transparent"><a href="#" class="text-nowrap rounded-pill text-decoration-none text-capitalize">Next year</a></li>
                    </ul>

                    <?php if($rows): ?>
                    <ul class="list-group list-group-horizontal EventCategory py-3">
                        <li class="list-group-item px-2 border-0 bg-transparent"><a href="<?=ROOT ?>/book_event" class="text-nowrap text-decoration-none shadow-sm p-3 text-capitalize">All</a></li>
                        <?php foreach($rows as $row): ?>
                         <li class="list-group-item px-2 border-0 bg-transparent"><a href="<?=ROOT ?>/book_event/<?=$row->categorys_id; ?>" class="text-nowrap text-decoration-none shadow-sm p-3 text-capitalize"><?= $row->category; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row exploreEevents">
                <div class="col">
                <?php if($events): ?>
                <div class="services">

                <?php foreach($events as $event): ?>
                <div class="service rounded shadow">
                    <div class="imgBox rounded"><img src="<?=ROOT ?>/uploads/<?=$event->image; ?>" class="rounded-top" alt=""></div>
                     <div class="p-3">
                        <div class="title d-flex align-items-center justify-content-between">
                            <h1 class="h6 fw-bold"><?=$event->title; ?></h1>
                            <span>4.5</span>
                         </div>
                         <p class="description text-muted"><?=$event->description; ?></p>
                         <div class="bookBtn d-flex justify-content-center">
                            <a href="#" class="p-1 rounded px-4 eButton text-white text-decoration-none">Book Now</a>
                         </div>
                     </div>
                </div>
                <?php endforeach; ?>

                </div>
                <?php endif; ?>

                </div>
            </div>
        </div>

      
   </div>
<!-- home project section style end -->


<?php $this->view('includes/footer'); ?>