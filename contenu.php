<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="index.php" method="post">

<!---------"à faire"-------------------------------------------->

<section class="afaire">


<?php 


// on prend le contenu du fichier json et le decode en php
  $index;
  $todo = file_get_contents("todo.json");
  $todoDeco = json_decode($todo);
  $rienAFaire = true;

  // on affiche à faire s'il y a des tâches à faire! 

// pour chaque valeur de l'array php, on change la valeur du checked en true s'ils sont cochés et pour ceux dont
// la valeur est toujours "false", on les affiches à coté d'un checkbox. 

  foreach ($todoDeco as $key => $value) {

    if (!empty($_POST[$value -> tache])) {
      $value -> checked = true;
      
    } else if ($value -> checked === false) {
    $rienAFaire = false;

?>

   <span> <input type ="checkbox" name="<?php echo $value -> tache;?>"><?php echo $value->tache;?></span>
<?php 
      };
    };
// on reencode l'array php en json avec les modifications des "checked" et l'envoie vers le fichier Json
      $newJSON = json_encode($todoDeco);
      file_put_contents("todo.json",$newJSON);
  
?>

  

</form>

<?php 
  if ($rienAFaire === false) {
    ?>

      <input type="submit" name="submitTache" value="Enregistrer"> 

    <?php ;
    echo "<h3> A faire </h3>";
  }


?>

</section>
<!----------ARCHIVE--------------------------------------------------------------------> 

<section class="archive">



<?php 
$Archived = false;
// on reitere l'array php des tâches, si la valeur de checked est "true", on l'affiche dans un checkbox checké et désactivé

foreach ($todoDeco as $key => $value) {

  if ($value -> checked === true) {
    $Archived = true;
  ?>

<p><input type="checkbox" checked disabled name="<?php echo $value -> tache;?>"><?php echo $value->tache;?></p>

<?php
    
  }

};
if ($Archived === true) {
  echo "<h3>archive</h3>";
}

?>


</section>

</body>
</html>



