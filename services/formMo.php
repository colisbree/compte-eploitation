<?php
//récupération du nombre lignes si soumission du formulaire
$nbLignesItem = isset($nbLignes) ? $nbLignes[++$numCategorie] : 1;
echo "<script type='text/javascript'>";
echo "let mo= $nbLignesItem;";
echo "</script>";
?>

<table class="table table-hover table-sm caption-top">
   <caption class="bg-light-blue">MAIN D'OEUVRE</caption>
   <thead>
      <tr>
         <th scope="col"><input type="hidden" name="Main-Oeuvre" value="categorie"></th>
         <th scope="col" class="col-md-1 text-center align-middle">Nb Pers</th>
         <th scope="col" class="col-md-2 text-center align-middle">Nb Heures</th>
         <th scope="col" class="col-md-4 text-center align-middle">Nature des travaux</th>
         <th scope="col" class="col-md-2 text-center align-middle">Poste</th>
         <th scope="col" class="col-md-1 text-center align-middle">Tarif H/Mo</th>
         <th scope="col" class="col-md-2 text-center align-middle">PTotal MO</th>
      </tr>
   </thead>
   <tbody>
      <?php
		for($n=1; $n <= $nbLignesItem; $n++) : 
		?>
      <tr id="formMo<?= $n ?>">
         <th scope="row" id="ligneMo<?= $n ?>" class="align-middle"><?= $n ?></th>
         <input type="hidden" name="ligneMo<?= $n ?>" value="ligne">
         <td>
            <input type="number" name="nbPers<?= $n ?>" value="<?= isset($datas) ? $datas['nbPers'.$n] : 1 ?>" min="1" onchange="calculMo(<?= $n ?>)" class="form-control form-control-sm text-end" >
         </td>
         <td>
            <input type="text" name="nbHeure<?= $n ?>" value="<?= isset($datas) ? $datas['nbHeure'.$n] : "" ?>" onchange="calculMo(<?= $n ?>)" class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="natureMo<?= $n ?>" value="<?= isset($datas) ? $datas['natureMo'.$n] : "" ?>" class="form-control form-control-sm">
         </td>
         <td>
            <input type="text" name="posteMo<?= $n ?>" value="<?= isset($datas) ? $datas['posteMo'.$n] : "" ?>" class="form-control form-control-sm">
         </td>
         <td>
            <input type="text" name="prixUnitaireHTMo<?= $n ?>" value="<?= isset($datas) ? $datas['prixUnitaireHTMo'.$n] : 25 ?>" onchange="calculMo(<?= $n ?>)" class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="pTotalHTMo<?= $n ?>" value="" class="form-control form-control-sm text-end fw-bold" disabled readonly>
         </td>
      </tr>
      <?php
      endfor ;
      ?>
      <tr id="formMo<?= $n ?>"></tr>
   </tbody>
</table>


<div class="d-flex justify-content-between mb-2 me-5">
   <div>
      <button class="btn btn-outline-secondary" type="button" id="btnMoPlus" disabled><i
            class="fas fa-plus"></i></button>
      <button class="btn btn-outline-secondary" type="button" id="btnMoMinus" disabled><i
            class="fas fa-minus"></i></button>
   </div>
   <div>
      <strong>
         TOTAL MAIN D'OEUVRE : <span id="pTotalMo"></span>
      </strong>
   </div>
</div>