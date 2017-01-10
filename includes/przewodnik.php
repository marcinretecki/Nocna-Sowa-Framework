<div class="section-trans" style="background-image: url('/i/las_test_7.jpg');">

  <header class="section-content section-8-6 centered">
    <h1 class="size-6 text-shadow"><?php the_title(); ?></h1>
  </header>

</div>

<div class="section-content section-2-2">
  <div class="row">
    <div class="p-10 p-center ">

      <?php the_content(); ?>

      <?php
        //  tu można zrobić funkcję, która sprawdza, czy jest wyzwanie
        //  jeśli nie ma to dajemy link do następnego zagadnienia
        //  jeśli jest, to link do wyzwania

      ?>

      <a href="../wyzwanie/" class="btn btn-green">Przejdź do Wyzwania</a>

    </div>
  </div>
</div>



<script>
  var lasHelper = new LasHelper();

  lasHelper.getBasicElements();
  lasHelper.hideLoader();
</script>