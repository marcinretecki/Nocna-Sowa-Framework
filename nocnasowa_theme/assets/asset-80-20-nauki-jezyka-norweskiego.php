<script>
(function paretoAddCss() {
  var style;
  var head;

  style = document.createElement('style');
  style.type = 'text/css';
  style.appendChild(document.createTextNode('.pareto-ccc{color:#ccc}'));
  style.appendChild(document.createTextNode('.pareto, .pareto span{-webkit-transition:color 0.4s ease;-moz-transition:color 0.4s ease;-o-transition:color 0.4s ease;transition:color 0.4s ease;}'));
  style.appendChild(document.createTextNode('.pareto-p-det .pareto-det, .pareto-p-pron .pareto-pron, .pareto-p-adv .pareto-adv, .pareto-p-prep .pareto-prep, .pareto-p-verb .pareto-verb, .pareto-p-konj .pareto-konj, .pareto-p-sub .pareto-sub, .pareto-p-adj .pareto-adj{color:#dd4b39}'));

  head = document.getElementsByTagName('head')[0];
  head.appendChild(style);
})()


function paretoShowWords(type, el) {

  element = document.getElementById(el);

  newClassName = 'pareto pareto-ccc pareto-p-' + type;

  //  if it has such class, remove it
  if ( element.className === newClassName ) {
    element.className = 'pareto';
  }
  //  if not, reset className and add new one
  else {
    element.className = newClassName;
  }

  try { ga('send', 'event', 'Anchors', el + ' ' + type, document.title.split(' | Nocna Sowa')[0]); }
  catch(err) {};

}
</script>