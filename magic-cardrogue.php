<?php>

"magic cardrogue - choose your own adventure";

<h2>LOOP</h2>
<ul>
<li>1 - choose character</li>
<li>2 - calculate stats/skills</li>
<li>3 - generate land (nodes of magic land cards connected to each other)</li>
<li>4 - generate introduction (node:start)</li>
<h3>[gameloop:start]</h3>
<li>5 - choose next cards connected to this node</li>
<li>6 - describe alternatives</li>
<li>7 - player interaction</li>
<li>8 - end condition met ? goto 10</li>
<li>9 - move to next node and goto 5</li>
<h3>[gameloop:end]</h3>
<li>10 - endgame: generate outro </li>

<?>
