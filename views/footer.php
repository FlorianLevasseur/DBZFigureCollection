<footer>
  <div class="container-fluid mb-0 pt-3 pb-1 bg-white" id="myFooter">
    <div class="container">
      <div class="row m-0 p-0 text-center pb-3">
        <div class="col-lg-4 col-5 m-auto">
          <a class="footLink" href="#" id="foot1">Mentions Légales</a>
        </div>
        <div class="col-lg-4 col-4 m-auto">
          <a class="footLink" href="#" id="foot2">Plan du Site</a>
        </div>
        <div class="col-lg-4 col-3 m-auto">
          <a class="footLink" href="contact" id="foot3">Contact</a>
        </div>
      </div>
      <p class="text-center">©2021 DBZ Figure Collection | Designed by TiFlo</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script src="../assets/js/lightbox-plus-jquery.js"></script>
<script src="../assets/js/script.js"></script>
<script type="text/javascript">
        function getdata(){
            var name = $('#name').val();
            console.log($('#name').val());
            if(name){
                $.ajax({
                    type: 'post',
                    url: './getdata.php',
                    data: {
                        name:name,
                    },
                    success: function (response) {
                        console.log($('#res').html(response));
                        $('#res').html(response);
                    }
                });
            } else {
                $('#res').html("");
            }
        }
    </script>
</body>

</html>