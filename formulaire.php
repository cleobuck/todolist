<section class="formulaire">

<form action="index.php" method="post">
<h3> Ajoutez une tâche</h3>
<p> La tâche à effectuer</p>
 <input type="textarea" name="tache"><br>
 <input type="submit" name="submit" value="ajoutez">
</form>

</section>

<?php

// création de l'array total des tâches
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
    
    // je sanitise  le contenu du text area

    if ($_POST['tache'] != ""){
        
        $_POST['tache'] = filter_var($_POST['tache'], FILTER_SANITIZE_STRING);
        $erreur = "La tâche est sanitisée et valide";
        if ($_POST['tache'] == ""){
        $erreur = "cette tâche n'est pas valide";
        }


        // je récupère la nouvelle tâche dans un array et l'ajoute à l'array total des tâches

        $tache=  array(
            'tache' => $_POST['tache'],
            'checked' => false
        );

        array_push($tacheArr, $tache);

            // je reconverti l'array en json et l'envoi vers mon fichier json

        $myJSON = json_encode($tacheArr);

        file_put_contents("todo.json",$myJSON);
        
    }
}
?>