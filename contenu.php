<!-- il lit le contenu du fichier json, et affiche chaque entrée 
dans la bonne zone ("A Faire" ou "Archive") avec le contenu html nécessaire 
pour avoir une checkbox.


+++écran 2 : la liste des tâches à faire, avec pour chaque tâche, une checkbox. 
Lorsqu'une tâche est effectuée, on coche la tâche puis on appuye 
sur un bouton "Enregistrer" qui rafraichit la liste en barrant la tâche terminée et 
en la mettant dans la zone "archivée".


-->


<p> A faire</p>

<?php 


if (isset($_POST['submit'])) {

    $todo = file_get_contents("todo.json");
    $todoDeco = json_decode($todo);

?>


<input type="checkbox" value="tache1"> tâche 1<br>
  <input type="checkbox" value="tache2"> tâche 2<br>
 <button>Enregistrer</button>

 <p> archive </p>
<input type="checkbox" value="tache1" checked> tâche 1<br>
  <input type="checkbox" value="tache2" checked> tâche 2<br>
 <button>Enregistrer</button>


