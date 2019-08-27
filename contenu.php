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
<p> A faire</p>
<!-- vient chercher les taches du fichier json et les affichent -->
<?php 

    $index;
  
    $todo = file_get_contents("todo.json");
    $todoDeco = json_decode($todo);
    
    foreach ($todoDeco as $key => $value) {

      if (!empty($_POST[$value -> tache])) {
        $value -> checked = true;
      } else if ($value -> checked === false) {
  

?>

    <input type ="checkbox" name="<?php echo $value -> tache;?>"><?php echo $value->tache;?><br>
<?php 
      };
    };

      $newJSON = json_encode($todoDeco);
      file_put_contents("todo.json",$newJSON);
  
?>

    <input type="submit" name="submitTache" value="Enregistrer">

</form>


<!----tâches archivées si elle est cochée ---> 
<section class="archive">

<p>archive</p>

<?php 

$JsonArchive= file_get_contents("todo.json");
$archive = json_decode($JsonArchive);

foreach ($archive as $key => $value) {

  if ($value -> checked === true) {

  ?>

<input type ="checkbox" checked disabled name="<?php echo $value -> tache;?>"><strike><?php echo $value->tache;?></strike><br>

<?php
    
  }

};

?>


</section>




    
</body>
</html>



