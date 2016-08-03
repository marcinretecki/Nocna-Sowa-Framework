function exHandler(event) {
  var eventTarget = event.target,
      parent = document.getElementById("ex"),
      dataTarget = eventTarget.getAttribute('data-target'),
      dataHideTarget = eventTarget.getAttribute('data-hide-target'),
      dataEndTarget = eventTarget.getAttribute('data-end-target');

  if (dataTarget) {
    var selector = "[data-object='" + dataTarget + "']";
    var object = parent.querySelector(selector);
    object.classList.remove("hidden");
    object.classList.add("animate");

    // ANALYTICS
    ga('send', 'event', 'Ćwiczenie', dataTarget, 'Zmien bieg wydarzeń');
  }

  if (dataHideTarget) {
    var hideSelector = "[data-hide-object='" + dataHideTarget + "']";
    var hideObjects = parent.querySelectorAll(hideSelector);
    for (var i=0, len=hideObjects.length; i<len; i++) {
      var hideObject = hideObjects[i];
      hideObject.classList.add("hidden");
    }
  }

  if (dataTarget || dataHideTarget) {
    eventTarget.classList.remove('clickable');
  }

  if (dataEndTarget) {
    var end = document.getElementById('end');
    end.classList.remove("hidden");
    end.classList.add("animate");
  }
}
document.addEventListener("click", exHandler, false);

window.addEventListener('load', function() {
  var ex = document.getElementById("ex");
  ex.style.opacity = 1;


  var css = "@-webkit-keyframes comeInOpacity{"
           +"  0% {"
           +"    opacity:0;"
           +"  }"
           +"  100% {"
           +"    opacity:1;"
           +"  }"
           +"}"
           +"@keyframes comeInOpacity{"
           +"  0% {"
           +"    opacity:0;"
           +"  }"
           +"  100% {"
           +"    opacity:1;"
           +"  }"
           +"}"
           +"@-webkit-keyframes comeIn {"
           +"  0% {"
           +"    transform-origin: right;"
           +"    width:100%;"
           +"    box-shadow:0 0 1px 5px #fff;"
           +"  }"
           +"  50% {"
           +"    transform-origin: right;"
           +"    width:0;"
           +"    box-shadow:0 0 1px 4px #fff;"
           +"  }"
           +"  51% {"
           +"    transform-origin: right;"
           +"    width:0;"
           +"    box-shadow:0 0 0 0 #fff;"
           +"  }"
           +"  100% {"
           +"    transform-origin: right;"
           +"    width:0;"
           +"    box-shadow:0 0 0 0 #fff;"
           +"  }"
           +"}"
           +"@keyframes comeIn {"
           +"  0% {"
           +"    transform-origin: right;"
           +"    width:100%;"
           +"    box-shadow:0 0 1px 5px #fff;"
           +"  }"
           +"  50% {"
           +"    transform-origin: right;"
           +"    width:0;"
           +"    box-shadow:0 0 1px 4px #fff;"
           +"  }"
           +"  51% {"
           +"    transform-origin: right;"
           +"    width:0;"
           +"    box-shadow:0 0 0 0 #fff;"
           +"  }"
           +"  100% {"
           +"    transform-origin: right;"
           +"    width:0;"
           +"    box-shadow:0 0 0 0 #fff;"
           +"  }"
           +"}"
           +".hidden{display:none;}"
           +".ex-h{min-height:500px;}"
           +".ex-h p a,.ex-h p a:hover{color:#000}"
           +".clickable{cursor:pointer;text-decoration:underline;box-shadow:0 0 1px 4px rgba(128, 108, 89, 0.15);background:rgba(128, 108,89, 0.15);border-radius:3px;color:#000}"
           +".animate{position:relative;"
           +"  -webkit-animation-name:comeInOpacity;"
           +"  -webkit-animation-duration:0.5s;"
           +"  -webkit-animation-fill-mode: both;"
           +"  -webkit-animation-timing-function:ease-in-out;"
           +"  animation-name:comeInOpacity;"
           +"  animation-duration:0.5s;"
           +"  animation-fill-mode: both;"
           +"  animation-timing-function:ease-in-out;"
           +"}"
           +".animate:before{"
           +"  display:block;"
           +"  content:\" \";"
           +"  width:0%;height:100%;background:#fff;box-shadow:0 0 1px 4px #fff;"
           +"  position:absolute;right:0;top:0;"
           +"  -webkit-animation-name:comeIn;"
           +"  -webkit-animation-duration:0.5s;"
           +"  -webkit-animation-fill-mode:both;"
           +"  -webkit-animation-timing-function:ease-in-out;"
           +"  animation-name:comeIn;"
           +"  animation-duration:0.5s;"
           +"  animation-fill-mode:both;"
           +"  animation-timing-function:ease-in-out;"
           +"}";
  var style = document.createElement( 'style' );
  style.type = 'text/css';
  try {
    style.appendChild( document.createTextNode(css));
  } catch(ex) {
    style.styleSheet.cssText = css;
  }
  var head = document.getElementsByTagName("head")[0];
  head.appendChild(style);
}, false);
