<?php
if(isset($_POST["search_enter"])){
$inputsearch= trim(htmlentities(stripslashes(mysql_real_escape_string($_POST["search"]))) // Crosssitescripting unterbunden

$sql ="
SELECT
    username, price, Idescription
FROM
    produkt
WHERE
    username LIKE '%@inputsearch%'
    OR
    price LIKE '%@inputsearch%'
    OR
    Idescription LIKE '%@inputsearch%'
ORDER BY
    username, price
";
$query = mysql_query($slq);

echo "<ul>";
WHILE($row = mysql_fetch_assoo($query))
{
    $username = $row['username'];
    $price = $row['price'];
    $Idescription = $row['Idescription'];

    echo "<li> $username $price $Idescription </li>";
}
echo "</ul>";
}
?>