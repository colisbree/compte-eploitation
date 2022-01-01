<?php
//récupération du nombre lignes si soumission du formulaire
$nbLignesItem = isset($nbLignes) ? $nbLignes[++$numCategorie] : 1;
echo "<script type='text/javascript'>";
echo "let eem= $nbLignesItem;";
echo "</script>";
?>

<table class="table table-hover table-sm caption-top">
   <caption class="bg-olive">EMPLOI ENGINS / MATERIELS WAROT</caption>
   <thead>
      <tr>
         <th scope="col"><input type="hidden" name="Materiel" value="categorie"></th>
         <th scope="col" class="col-md-2 text-center align-middle text-warning bg-dark">Engin/Matériel</th>
         <th scope="col" class="col-md-1 text-center align-middle">Nb heures</th>
         <th scope="col" class="col-md-1 text-center align-middle">Ct horaire</th>
         <th scope="col" class="col-md-4 text-center align-middle">Commentaire</th>
         <th scope="col" class="col-md-2 text-center align-middle">Poste</th>
         <th scope="col" class="col-md-2 text-center align-middle">Coût Total € HT</th>
      </tr>
   </thead>
   <tbody>
      <?php
		for($n=1; $n <= $nbLignesItem; $n++) : 
		?>
      <tr id="formEngin<?= $n ?>">
         <th scope="row" id="LigneEngin<?= $n ?>" class="align-middle"><?= $n ?></th>
         <input type="hidden" name="LigneEngin<?= $n ?>" value="ligne">
         <td>
            <input type="text" list="liste-engins" id="list_input1" name="typeEngin<?= $n ?>"
               class="form-control form-control-sm text-end" value="<?= isset($datas) ? $datas['typeEngin'.$n] : "" ?>" onchange="selectEngin(<?= $n ?>)" >
            <datalist id="liste-engins">
               <option data-value='21' value='Bobcat'>
               <option data-value='28' value='Broyeur'>
               <option data-value='3' value='Debroussailleuse'>
               <option data-value='14' value='Grosse-tondeuse'>
               <option data-value='21' value='Minipelle'>
               <option data-value='3' value='Petite-tondeuse'>
               <option data-value='28' value='Poids-lourds'>
               <option data-value='28' value='Tracteur'>
               <option data-value='28' value='Tractopelle'>
            </datalist>
         </td>
         <td>
            <input type="text" name="nbHeuresEngin<?= $n ?>" value="<?= isset($datas) ? $datas['nbHeuresEngin'.$n] : "" ?>" min="0" onchange="calculEngin(<?= $n ?>)" class="form-control form-control-sm text-end" >
         </td>
         <td>
            <input type="text" name="prixUnitaireHTEngin<?= $n ?>" value="<?= isset($datas) ? $datas['prixUnitaireHTEngin'.$n] : "" ?>" min="0" onchange="calculEngin(<?= $n ?>)" class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="commentaireEngin<?= $n ?>" value="<?= isset($datas) ? $datas['commentaireEngin'.$n] : "" ?>"  class="form-control form-control-sm">
         </td>
         <td>
            <input type="text" name="posteEngin<?= $n ?>" value="<?= isset($datas) ? $datas['posteEngin'.$n] : "" ?>" class="form-control form-control-sm">
         </td>
         <td>
            <input type="text" name="pTotalHTEngin<?= $n ?>" value="" class="form-control form-control-sm text-end fw-bold" disabled readonly>
         </td>
      </tr>
      <?php
		endfor; 
		?>
      <tr id="formEngin<?= $n ?>"></tr>
   </tbody>
</table>


<div class="d-flex justify-content-between mb-2 me-5">
   <div>
      <button class="btn btn-outline-secondary" type="button" id="btnEnginPlus" disabled><i
            class="fas fa-plus"></i></button>
      <button class="btn btn-outline-secondary" type="button" id="btnEnginMinus" disabled><i
            class="fas fa-minus"></i></button>
   </div>
   <div>
      <strong>
         TOTAL EMPLOI ENGINS / MATERIELS HT : <span id="pTotalEngin"></span>
      </strong>
   </div>
</div>
