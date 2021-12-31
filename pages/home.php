<?php

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
