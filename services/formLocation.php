<?php
//récupération du nombre lignes si soumission du formulaire
$nbLignesItem = isset($nbLignes) ? $nbLignes[++$numCategorie] : 1;
echo "<script type='text/javascript'>";
echo "let loc= $nbLignesItem;";
echo "</script>";
?>

<table class="table table-hover table-sm caption-top">
   <caption class="bg-light-marron">LOCATION ENGINS / MATERIELS</caption>
   <thead>
      <tr>
         <th scope="col"><input type="hidden" name="Location" value="categorie"></th>
         <th scope="col" class="col-md-2 text-center align-middle">Loueur</th>
         <th scope="col" class="col-md-2 text-center align-middle">Location/Matériel</th>
         <th scope="col" class="col-md-1 text-center align-middle">Coût € HT</th>
         <th scope="col" class="col-md-3 text-center align-middle">Commentaire</th>
         <th scope="col" class="col-md-2 text-center align-middle">Poste</th>
         <th scope="col" class="col-md-2 text-center align-middle">Coût Total € HT</th>
      </tr>
   </thead>
   <tbody>
      <?php
		for($n=1; $n <= $nbLignesItem; $n++) : 
		?>
      <tr id="formLocation<?= $n ?>">
         <th scope="row" id="LigneLocation<?= $n ?>" class="align-middle"><?= $n ?></th>
         <input type="hidden" name="LigneLocation<?= $n ?>" value="ligne">
         <td>
            <input type="text" name="loueurLocation<?= $n ?>" value="<?= isset($datas) ? $datas['loueurLocation'.$n] : "" ?>"  class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="typeLocation<?= $n ?>" value="<?= isset($datas) ? $datas['typeLocation'.$n] : "" ?>" class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="prixUnitaireHTLocation<?= $n ?>" value="<?= isset($datas) ? $datas['prixUnitaireHTLocation'.$n] : "" ?>" min="0" onchange="calculLocation(<?= $n ?>)" class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="commentaireLocation<?= $n ?>" value="<?= isset($datas) ? $datas['commentaireLocation'.$n] : "" ?>"  class="form-control form-control-sm">
         </td>
         <td>
            <input type="text" name="posteLocation<?= $n ?>" value="<?= isset($datas) ? $datas['posteLocation'.$n] : "" ?>" class="form-control form-control-sm">
         </td>
         <td>
            <input type="text" name="pTotalHTLocation<?= $n ?>" value="" class="form-control form-control-sm text-end fw-bold" disabled readonly>
         </td>
      </tr>
      <?php
		endfor;
		?>
      <tr id="formLocation<?= $n ?>"></tr>
   </tbody>
</table>


<div class="d-flex justify-content-between mb-2 me-5">
   <div>
      <button class="btn btn-outline-secondary" type="button" id="btnLocationPlus" disabled><i
            class="fas fa-plus"></i></button>
      <button class="btn btn-outline-secondary" type="button" id="btnLocationMinus" disabled><i
            class="fas fa-minus"></i></button>
   </div>
   <div>
      <strong>
         TOTAL LOCATION ENGINS / MATERIELS HT : <span id="pTotalLocation"></span>
      </strong>
   </div>
</div>
