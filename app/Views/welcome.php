<?= $header; ?>

<div class="container text-center" style="margin-top: 100px;">
  <h1 id="typed"></h1>

  <!-- lottiefiles -->
  <div class="d-flex justify-content-center">
    <dotlottie-wc
      src="https://lottie.host/7a5d7c09-d354-4b29-9931-70663c13b4af/Bx9QsfYY5g.lottie"
      style="width: 300px; height: 300px;"
      speed="1"
      autoplay
      loop
    ></dotlottie-wc>
  </div>
</div>

<!-- Librerías -->
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.6.2/dist/dotlottie-wc.js" type="module"></script>

<script>
  var typed = new Typed('#typed', {
    strings: ["Bienvenido al sistema", "Gestiona pacientes fácilmente", "Todo bajo control"],
    typeSpeed: 60,
    backSpeed: 40,
    loop: true
  });
</script>

<?= $footer; ?>


