<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do list </title>
</head>
<body>



<?php 

include("formulaire.php");

$tacheArr = [];
$erreur = "";

if (isset($_POST['submit'])) {

// je prends le contenu de mon fichier json et le convertit en PhP
if (filesize('todo.json') != 0) {
    $content = file_get_contents("todo.json");
    $phpContent = json_decode($content);

     // j'ajoute ce contenu à un array
    foreach ($phpContent as $value) {
        array_push($tacheArr,$value);
    };

};
   
    // je sanitise et valide le contenu du text area

if ($_POST['tache'] != ""){
    
    $_POST['tache'] = filter_var($_POST['tache'], FILTER_SANITIZE_STRING);
    $erreur = "La tâche est sanitisée et valide";
    if ($_POST['tache'] == ""){
    $erreur = "cette tâche n'est pas valide";
    }
}

    // je récupère la nouvelle tâche dans un array et l'ajoute à l'array existant

    $tache=  array(
        'tache' => $_POST['tache']
    );

    array_push($tacheArr, $tache);

     // je reconverti l'array en json et l'envoi vers mon fichier json

    $myJSON = json_encode($tacheArr);

    file_put_contents("todo.json",$myJSON);
 
}

?>

<?php
    include("contenu.php");
?>

    
</body>
</html>