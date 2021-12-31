<?php
// récupération de la soumission du formulaire
if (!empty($_POST)){
   //var_dump($_POST);
   $numCategorie = 0;
   $lignes = 0;
   $nomCategorie1 = $nomCategorie2 = "";
   $nbLignes[]=0;
   $formSoumis=1;
   foreach($_POST as $key => $value)
   {
      $key = htmlentities(stripslashes(trim($key)));
      $value = htmlentities(stripslashes(trim($value)));
      $datas[$key] = $value;

      if($value==="categorie"){
         ++$numCategorie;
         $nomCategorie1 = $key;
         $lignes = 0;
         //echo $key.'<br/>';
      }
      if($value==="ligne" && $nomCategorie1 === $nomCategorie2){
         ++$lignes;
         //echo $lignes.'<br/>';
      }
      $nomCategorie2 = $nomCategorie1;
      $nbLignes[$numCategorie]=$lignes;
   }
   // echo '<pre>';
   // var_dump($nbLignes);
   // echo '</pre>';
}


$formSoumis = isset($formSoumis) ? $formSoumis : 0;
echo "<script type='text/javascript'>";
echo "let formSoumis = $formSoumis;";
echo "</script>";

?>

<div class="col-lg-10 mx-auto">
   <form id="formulaire" method="post" action="">

      <?php
      // ajout En-Tête
      require_once('./services/formEntete.php');
      echo '<br/>';

      // ajout des fournitures
      require_once('./services/formFournitures.php');
      echo '<script src="../app/js/elementsForm/scriptFournitures.js"></script>';
      echo '<hr>';

      // ajout du beton 
      require_once('./services/formBeton.php');
      echo '<script src="../app/js/elementsForm/scriptBeton.js"></script>';
      echo '<hr>';

      // ajout de la Main d'oeuvre
      require_once('./services/formMo.php');
      echo '<script src="../app/js/elementsForm/scriptMo.js"></script>';
      echo '<hr>';

      // ajout de la sous-traitance
      require_once('./services/formSsTraitant.php');
      echo '<script src="../app/js/elementsForm/scriptSsTraitant.js"></script>';
      echo '<hr>';

      // ajout des évacuations / décharges
      require_once('./services/formDechetterie.php');
      echo '<script src="../app/js/elementsForm/scriptDechetterie.js"></script>';
      echo '<hr>';

      // ajout du matériel utilisé
      require_once('./services/formMateriel.php');
      echo '<script src="../app/js/elementsForm/scriptMateriel.js"></script>';
      echo '<hr>';

      // ajout du matériel loué
      require_once('./services/formLocation.php');
      echo '<script src="../app/js/elementsForm/scriptLocation.js"></script>';
      echo '<hr>';

      // ajout du bouton de soumission du formulaire
      require_once('./services/formSubmit.php');
      echo '<script src="../app/js/elementsForm/scriptSubmit.js"></script>';
      ?>
   
      
   </form>
</div>

<?php
// insertion des scripts communs au formulaire
echo '<script src="../app/js/communs/calculprixTotaux.js"></script>';
echo '<script src="../app/js/communs/suppLigneForm.js"></script>';
