<script>
function insertWords() {
  var places = ['et fly','et slott','et tog','en skole','et tivoli','en lastebil','en skog','en blomsterbutikk','en gate','et sykehus','ei eng','en sjokoladefabrikk','en konsert','en sjø','en seilbåt','en brannstasjon','en kjeller','ei grotte','ei gruve'];
  var people = ['en fisker','Ironman','en smed','en helt','ei prinsesse','et troll','en vedhogger','et fotballag','en konge','en detektiv','en skorsteinsfeier','en pilot','Rødhette','en ballerina','en gammel viking','en sjømann','et barn','en snømann','en politiker','en forsker'];
  var things = ['en såpe','ei lyspære','en gevinst','en koffert','et strømuttak','en gressklipper','en skuff','ei øks','ei stekepanne','en spade','en bamse','et telt','et speil','(et) jern','ei maske','sandaler','et laurbærblad','en trompet','ei bøtte','en nattdrakt'];
  var activities = ['å løse','å sy','å telle','å hoppe','å gråte','å låse','å legge sammen','å danne','å skrive ut','å bake','å huske','å klatre','å male','å rive','å gange','å lukte','å tenne opp','å kysse','å røre','å misunne'];

  var place = places[Math.floor(Math.random() * places.length)];
  var person = people[Math.floor(Math.random() * people.length)];
  var thing = things[Math.floor(Math.random() * things.length)];
  var activity = activities[Math.floor(Math.random() * activities.length)];

  cloud.innerHTML = place + '<br />' + person + '<br />' + thing + '<br />' + activity;
}

function displayWords() {
  var cloud = document.getElementById('cloud');
  cloud.className = 'con cloud-hide';
  setTimeout(cloudShow, 550);
}

function cloudShow() {
  var cloud = document.getElementById('cloud');
  insertWords();
  cloud.className = 'con cloud-show';
}
</script>