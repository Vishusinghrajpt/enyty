
  <footer class="">
    <div class="top-footer-bg p-4 p-lg-5">
      <div
        class="mx-2 mx-md-3 mx-lg-5 px-lg-5 d-flex gap-5 flex-wrap flex-lg-nowrap justify-content-between align-items-center">
        <div class="col-12 col-md-5 col-lg-4">
          <a class="text-decoration-none" href="/">
            <img class="img-fluid me-3 mb-3" src="./Assets/Eternity-Logo.png" alt="fb icon" width="200" height="" />
          </a>
          <p class="text-capitalize text-black">
            Honoring Memories, Celebrating Lives. Let us help you cherish
            every precious memory with dignity and grace.
          </p>

          <div class="d-flex gap-2">
            <a class="nav-link ps-0 text-white active" aria-current="page" href="#">
              <img class="img-fluid" src="./Assets/ri_facebook-fill.png" alt="fb icon" width="20" height="" />
            </a>
            <a class="nav-link ps-0 text-white" href="#">
              <img class="img-fluid" src="./Assets/mdi_twitter.png" alt="twitter icon" width="20" height="" />
            </a>
            <a class="nav-link ps-0 text-white" href="#">
              <img class="img-fluid" src="./Assets/mdi_instagram.png" alt="insta icon" width="20" height="" />
            </a>
            <a class="nav-link ps-0 text-white" href="#">
              <img class="img-fluid" src="./Assets/ri_linkedin-fill.png" alt="linkedin icon" width="20" height="" />
            </a>
            <a class="nav-link ps-0 text-white" href="#">
              <img class="img-fluid" src="./Assets/mingcute_youtube-fill.png" alt="youtube icon" width="20" height="" />
            </a>
          </div>
        </div>
        <div class="col-12 col-md-5 col-lg-4 d-flex flex-column">
          <h5 class="font-bold mb-3">Contact Info</h5>
          <a class="text-decoration-none text-black mb-3 text-capitalize" href="#">
            <img class="img-fluid me-2" width="20" src="./Assets/fluent_location-12-regular.png" alt="" />
            Rome, Italy
          </a>
          <a class="text-decoration-none text-black mb-3" href="mailto:2lleternity@gmail.com">
            <img class="img-fluid me-2" width="20" src="./Assets/clarity_email-line.png" alt="" />
            2lleternity@gmail.com
          </a>
          <a class="text-decoration-none text-black mb-3" href="tel:+393884462485">
            <img class="img-fluid me-2" width="20" src="./Assets/solar_phone-linear.png" alt="" />
            +39 3884462485
          </a>
        </div>
        <div class="col-12 col-md-5 col-lg-4 d-flex flex-column">
          <h5 class="font-bold mb-3">Quick Links</h5>
          <a class="text-decoration-none text-black mb-3 text-capitalize" href="/commemoration">commemoration</a>
          <a class="text-decoration-none text-black mb-3 text-capitalize" href="/events">Events</a>
          <a class="text-decoration-none text-black mb-3 text-capitalize" href="#">Donations</a>
        </div>
      </div>
    </div>

    <div class="p-3 text-center">
      <small class="text-center">Copyright© 2023 ETRNITY, All Right Reserved.</small>
    </div>
  </footer>


  <!-- slider JS -->
  <script>
    let items = document.querySelectorAll(".carousel .carousel-item");

    items.forEach((el) => {
      const minPerSlide = 4;
      let next = el.nextElementSibling;
      for (var i = 1; i < minPerSlide; i++) {
        if (!next) {
          // wrap carousel by using first child
          next = items[0];
        }
        let cloneChild = next.cloneNode(true);
        el.appendChild(cloneChild.children[0]);
        next = next.nextElementSibling;
      }
    });
  </script>

  <!-- paypal input select script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".btn").click(function () {
        $(".btn").removeClass("selected");
        $(this).toggleClass("selected");
        $('input[type="text"]').val("");
      });

      $('input[type="text"]').on("input", function () {
        // Allow only numbers
        $(this).val(function (_, value) {
          return value.replace(/\D/g, "");
        });
      });

      $('input[type="text"]').focus(function () {
        $(".btn").removeClass("selected");
      });
    });
    
      var myvid = $('#myVid')[0];
  $(window).scroll(function(){
  var scroll = $(this).scrollTop();
  console.log(scroll)
;
  if (scroll > 1761 && scroll < 2375 ) {
    myvid.play()
  }else{
    myvid.pause();
  }
})
  </script>
</body>

</html>