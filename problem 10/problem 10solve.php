<?php
$color = array('white', 'green', 'red');
foreach ($color as $m)
{
echo "$m, ";
}
sort($color);
echo "<ul>";
foreach ($color as $n)
{
echo "<li>$n</li>";
}
echo "</ul>";
?>