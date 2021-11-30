<html>
<head>
    <title>Erreur</title>
</head>
<body>
<h1 align="center">Erreur</h1>
<?php
if(isset($dVueErreur)){
    foreach ($dVueErreur as $value){
        echo $value;
    }
}
?>
</body>
</html>
