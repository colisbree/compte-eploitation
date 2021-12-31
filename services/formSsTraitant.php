<?php
//récupération du nombre lignes si soumission du formulaire
$nbLignesItem = isset($nbLignes) ? $nbLignes[4] : 1;
echo "<script type='text/javascript'>";
echo "let st= $nbLignesItem;";
echo "</script>";
?>

<table class="table table-hover table-sm caption-top">
   <caption class="bg-light-yellow">SOUS-TRAITANCE</caption>
   <thead>
      <tr>
         <th scope="col"><input type="hidden" name="Ss-Traitant" value="categorie"></th>
         <th scope="col" class="col-md-2 text-center align-middle">Sous-Traitant</th>
         <th scope="col" class="col-md-1 text-center align-middle">Nb Pers</th>
         <th scope="col" class="col-md-2 text-center align-middle">Nb Heures</th>
         <th scope="col" class="col-md-2 text-center align-middle">Nature des travaux</th>
         <th scope="col" class="col-md-2 text-center align-middle">Poste</th>
         <th scope="col" class="col-md-1 text-center align-middle">Tarif H/Mo</th>
         <th scope="col" class="col-md-2 text-center align-middle">PTotal Ss-Traitant</th>
      </tr>
   </thead>
   <tbody>
      <?php
		for($n=1; $n <= $nbLignesItem; $n++) : 
		?>
      <tr id="formSt<?= $n ?>">
         <th scope="row" id="ligneSt<?= $n ?>" class="align-middle"><?= $n ?></th>
         <input type="hidden" name="ligneSt<?= $n ?>" value="ligne">
         <td>
            <input type="text" name="sStraitantSt<?= $n ?>" value="<?= isset($datas) ? $datas['sStraitantSt'.$n] : "" ?>" class="form-control form-control-sm" >
         </td>
         <td>
            <input type="number" name="nbPersSt<?= $n ?>" value="<?= isset($datas) ? $datas['nbPersSt'.$n] : 1 ?>" min="1" onchange="calculSt(<?= $n ?>)"class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="nbHeureSt<?= $n ?>" value="<?= isset($datas) ? $datas['nbHeureSt'.$n] : "" ?>" onchange="calculSt(<?= $n ?>)"class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="natureSt<?= $n ?>" value="<?= isset($datas) ? $datas['natureSt'.$n] : "" ?>" class="form-control form-control-sm" >
         </td>
         <td>
            <input type="text" name="posteSt<?= $n ?>" value="<?= isset($datas) ? $datas['posteSt'.$n] : "" ?>" class="form-control form-control-sm" >
         </td>
         <td>
            <input type="text" name="prixUnitaireHTSt<?= $n ?>" value="<?= isset($datas) ? $datas['prixUnitaireHTSt'.$n] : 25 ?>" onchange="calculSt(<?= $n ?>)" class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="pTotalHTSt<?= $n ?>" value="" class="form-control form-control-sm text-end fw-bold" 
               disabled readonly>
         </td>
      </tr>
      <?php
      endfor;
      ?>
      <tr id="formSt<?= $n ?>"></tr>
   </tbody>
</table>


<div class="d-flex justify-content-between mb-2 me-5">
   <div>
      <button class="btn btn-outline-secondary" type="button" id="btnStPlus" disabled><i
            class="fas fa-plus"></i></button>
      <button class="btn btn-outline-secondary" type="button" id="btnStMinus" disabled><i
            class="fas fa-minus"></i></button>
   </div>
   <div>
      <strong>
         TOTAL SOUS-TRAITANCE : <span id="pTotalSt"></span>
      </strong>
   </div>
</div>