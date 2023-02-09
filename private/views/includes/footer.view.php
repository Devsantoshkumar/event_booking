
<script src="<?=ASSETS ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?=ASSETS ?>/js/jquery.min.js"></script>
<script src="<?=ASSETS ?>/js/owl.carousel.min.js"></script>


<script>
    let user = document.getElementById("tw-user");
    let name = document.getElementById("tw-user").innerHTML;
    user.addEventListener("mouseover",()=>{
        user.innerHTML = "Logout";
        user.classList.add("button");
        user.classList.add("text-white");
    })


    user.addEventListener("mouseleave",()=>{
        user.innerHTML = name;
        user.classList.remove("button");
        user.classList.remove("text-white");
    })



</script>
</body>
</html>