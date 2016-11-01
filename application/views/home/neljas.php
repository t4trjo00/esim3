<h1>Home-modelin data</h1>
<TABLE border=1>
<tr><th>Etunimi</th><th>Sukunimi</th></tr>
<?php
foreach ($sisalto as $rivi) {
	echo '<tr><td>'.$rivi['en'].'</td><td>'.$rivi['sn'].'</td></tr>';
	
}
?>

</TABLE>
