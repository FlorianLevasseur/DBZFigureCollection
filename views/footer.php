<footer>
  <div class="container-fluid mb-0 pt-3 pb-1 bg-white" id="myFooter">
    <div class="container">
      <div class="row m-0 p-0 text-center pb-3">
        <div class="col-lg-4 col-5 m-auto">
          <a class="footLink" href="legalNotice" id="foot1">Mentions Légales</a>
        </div>
        <div class="col-lg-4 col-4 m-auto">
          <a class="footLink" href="CGU" id="foot2">Conditions Générales d'Utilisation</a>
        </div>
        <div class="col-lg-4 col-3 m-auto">
          <a class="footLink" href="contact" id="foot3">Contact</a>
        </div>
      </div>
      <p class="text-center">©2021-2022 DBZ Figure Collection | Designed by TiFlo</p>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script src="../assets/js/lightbox-plus-jquery.js"></script>
<script src="../assets/js/script.js"></script>
<script type="text/javascript">
  function getdata() {
    var name = $('#name').val();
    if (name) {
      $.ajax({
        type: 'post',
        url: './getdata.php',
        data: {
          name: name,
        },
        success: function(response) {
          $('#res').html(response);
        }
      });
    } else {
      $('#res').html("");
    }
  }
</script>
<script type="text/javascript" src="../assets/js/quagga.min.js"></script>
<script type="text/javascript">
  var arrayFigure = {
    "3296580262472": "1056",
    "3296580259847": "1000",
    "4983164171013": "1708",
    "3296580336333": "719",
    "4573102601445": "1831"
  }
  document.getElementById("quaggaStart").addEventListener("click", () => {
    Quagga.init({
      inputStream: {
        name: "Live",
        type: "LiveStream",
        constraints: {
          width: 550,
          height: 300
        },
        target: document.querySelector('#camera'),
      },
      decoder: {
        readers: ["ean_reader"],
      }
    }, function(err) {
      if (err) {
        console.log(err);
        return
      }
      console.log("Initialization finished. Ready to start");
      Quagga.start();
    });
    Quagga.onDetected(function(data) {
      for (key in arrayFigure) {
        var value = arrayFigure[key]
        if (data.codeResult.code == key) {
          document.location.href = `figure?id=${value}`
          break;
        }
      }
    })
  })
  document.getElementById("quaggaStop").addEventListener("click", () => {
    Quagga.stop();
  })
</script>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
</body>

</html>