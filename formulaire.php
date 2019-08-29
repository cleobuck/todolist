<section class="formulaire">

<form action="index.php" method="post">
<h3> Ajoutez une tâche</h3>

 <input type="textarea" name="tache-back"><br>
 <input type="submit" name="submit" value="ajoutez">
</form>

</section>

<?php

session_start();

// création de l'array total des tâches
$tacheArr = [];
$isSame = false;




// je vérifie si le Json n'est pas vide 

if (filesize('todo.json') != 0) {
        
// je recupère le contenu du JSON et le decode en PHP

    $content = file_get_contents("todo.json");
    $phpContent = json_decode($content);

// j'ajoute ce contenu à un array et lui ajoute 
    foreach ($phpContent as $value) {
      
        if($value->tache == $_POST['tache'] && isset($_POST['checked1'])){
            $value->checked = $_POST['checked1'];
            $isSame = true;
        } else if ($value->tache == $_POST['dragName']) {
            $value->checked=true;
            $isSame = true;
        }
        array_push($tacheArr,$value);
      
    };

};

// je sanitise  le contenu du text area

if ($_POST['tache-back'] != ""){
    
    $_POST['tache-back'] = filter_var($_POST['tache-back'], FILTER_SANITIZE_STRING);
    


    // je récupère la nouvelle tâche dans un array et l'ajoute à l'array total des tâches

    if (!$isSame) {
        $tache=  array(
            'tache' => $_POST['tache-back'],
            'checked' => false
        );
    }

    $doublon = false;

    foreach ($tacheArr as $value) {
        if ($value->tache == $_POST['tache-back'] && $value->checked == false)
            $doublon = true;
    };

    if ($doublon == false && $_POST['tache-back'] != $_SESSION['ancienneTache'])
        array_push($tacheArr, $tache);
        $_SESSION['ancienneTache'] = $_POST['tache-back'];
       
    // je reconverti l'array en json et l'envoi vers mon fichier json
};

$myJSON = json_encode($tacheArr);
file_put_contents("todo.json",$myJSON);

?>


