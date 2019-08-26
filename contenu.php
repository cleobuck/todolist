<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form>
<p> A faire</p>
<!-- vient chercher les taches du fichier json et les affichent -->
<?php 
    if (isset($_POST['submit'])) {
    $todo = file_get_contents("todo.json");
    $todoDeco = json_decode($todo);
   
 

   
    }
    foreach ($todoDeco as $key => $value) {

      
    ?>
    <input type ="checkbox"><?php echo $value->tache;?><br><?php };
?>


 <input type="submit" name="submit" value="Enregistrer">

</form>


    
</body>
</html>



