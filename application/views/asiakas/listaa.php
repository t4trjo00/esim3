<h1>Asiakkaat</h1>
<table border=1>
<tr><th>Etunimi</th><th>Sukunimi</th><th>Sähköposti</th></tr>
<?php
foreach ($asiakkaat as $rivi) 
{
	echo '<tr><td>'.$rivi['etunimi'].'</td><td>'.$rivi['sukunimi'].'</td><td>'.$rivi['email'].'</td><td>';

}

?>


</table>








