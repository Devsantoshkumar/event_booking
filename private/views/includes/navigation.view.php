<!-- Header start -->
<nav class="navbar sticky-top navbar-expand-lg shadow-sm bg-white tw-navigation py-2">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center logoIcon" href="<?=ROOT ?>"><span class="rounded-circle text-center text-white">E</span><span class="px-1">Booking</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-5 mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link px-lg-3 px-0 text-dark" href="<?=ROOT ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-lg-3 px-0 text-dark" href="<?=ROOT ?>/book_event">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-lg-3 px-0 text-dark" href="<?=ROOT ?>/comming">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-lg-3 px-0 text-dark" href="<?=ROOT ?>/comming">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-lg-3 px-0 text-dark" href="<?=ROOT ?>/comming">About</a>
        </li>
        </ul>

        
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
           <?php 
             if(Auth::loggedIn()){
                echo '<a href="'.ROOT.'/logout" id="tw-user" class="fw-bold px-3 text-dark">'.Auth::user('firstname').'</a>';
             }else{
                echo '<a class="nav-link text-center rounded-pill text-white AuthBtn" href="'.ROOT.'/signup">Signup</a>';
             }
           
           ?>
        </li>
        </ul>

    </div>
  </div>
</nav>

<!-- Header end -->