<h1>Poista asiakas</h1>
<table border=1>
<tr><th>Etunimi</th><th>Sukunimi</th><th>Valitse</th></tr>
<?php
foreach ($asiakkaat as $rivi) {
	echo '<tr><td>'.$rivi['etunimi'].'</td><td>'.$rivi['sukunimi'].'</td><td>';
	echo '<a href="poista/';
	echo $rivi['id_asiakas'].'">Poista</a>';
	echo '</td></tr>';



}

?>


</table>






