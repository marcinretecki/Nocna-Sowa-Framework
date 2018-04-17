<script>
function random() {
  var foto = document.getElementById('random'),
      src;

  if (foto) {
    srcArray = foto.src.split('?', 1);
    foto.style.opacity = "0.33";
    foto.src = srcArray[0] + "#" + new Date().getTime();

    foto.onload = function() {
      setTimeout(function() {
        foto.style.opacity = "1";
      }, 50);
    }

    ga('send', 'event', 'Ćwiczenie', 'Wylosuj zdjęcie', 'Co widzisz na zdjęciu?');

  }
}

function attachRandom(){
  var el = document.getElementById('randomButton');
  if (el) {
    el.addEventListener("click", random, false);
  }
}
attachRandom();
</script>