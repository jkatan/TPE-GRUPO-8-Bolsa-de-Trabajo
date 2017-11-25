<?php

$dbcon = pg_connect("host=localhost port=9999 dbname=u2017b-8 user=u2017b-8 password=passwordING1") or die('connection failed');
$result = pg_query($dbcon, "select * from test;");

?>

<html>
<head>
  <title>La pagina piola</title>
</head>
<body>
  <h1>Tabla test</h1>
  <?php
    echo "<table>\n";
    while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($row as $col_value) {
            echo "\t\t<td>$col_value</td>\n";
        }
        echo "\t</tr>\n";
    }
  ?>
</body>
</html>
<?php
pg_close($dbcon);
?>
