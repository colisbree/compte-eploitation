<?php
//récupération du nombre lignes si soumission du formulaire
$nbLignesItem = isset($nbLignes) ? $nbLignes[++$numCategorie] : 1;
echo "<script type='text/javascript'>";
echo "let edd= $nbLignesItem;";
echo "</script>";
?>

<table class="table table-hover table-sm caption-top">
   <caption class="bg-grey">EVACUATION DECHARGES / DECHETTERIES</caption>
   <thead>
      <tr>
         <th scope="col"><input type="hidden" name="Dechetterie" value="categorie"></th>
         <th scope="col" class="col-md-1 text-center align-middle">Volume m3</th>
         <th scope="col" class="col-md-1 text-center align-middle">PU €HT/m3</th>
         <th scope="col" class="col-md-5 text-center align-middle">Nature des travaux</th>
         <th scope="col" class="col-md-2 text-center align-middle">Poste</th>
         <th scope="col" class="col-md-1 text-center align-middle">Benne € HT</th>
         <th scope="col" class="col-md-2 text-center align-middle">PTotal €HT</th>
      </tr>
   </thead>
   <tbody>
      <?php
		for($n=1; $n <= $nbLignesItem; $n++) : 
		?>
      <tr id="formEvac<?= $n ?>">
         <th scope="row" id="LigneEvac<?= $n ?>" class="align-middle">1</th>
         <input type="hidden" name="LigneEvac<?= $n ?>" value="ligne">
         <td>
            <input type="text" name="volumeEvac<?= $n ?>" value="<?= isset($datas) ? $datas['volumeEvac'.$n] : "" ?>" min="0" onchange="calculEvac(<?= $n ?>)" class="form-control form-control-sm text-end" >
         </td>
         <td>
            <input type="text" name="prixUnitaireHTEvac<?= $n ?>" value="<?= isset($datas) ? $datas['prixUnitaireHTEvac'.$n] : 3.5 ?>" min="0" onchange="calculEvac(<?= $n ?>)" class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="natureEvac<?= $n ?>" value="<?= isset($datas) ? $datas['natureEvac'.$n] : "" ?>" class="form-control form-control-sm">
         </td>
         <td>
            <input type="text" name="posteEvac<?= $n ?>" value="<?= isset($datas) ? $datas['posteEvac'.$n] : "" ?>" class="form-control form-control-sm">
         </td>
         <td>
            <input type="text" name="locationEvac<?= $n ?>" value="<?= isset($datas) ? $datas['locationEvac'.$n] : "" ?>" onchange="calculEvac(<?= $n ?>)" class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="pTotalHTEvac<?= $n ?>" value="" class="form-control form-control-sm text-end fw-bold" disabled readonly>
         </td>
      </tr>
      <?php
      endfor;
      ?>
      <tr id="formEvac<?= $n ?>"></tr>
   </tbody>
</table>


<div class="d-flex justify-content-between mb-2 me-5">
   <div>
      <button class="btn btn-outline-secondary" type="button" id="btnEvacPlus" disabled><i
            class="fas fa-plus"></i></button>
      <button class="btn btn-outline-secondary" type="button" id="btnEvacMinus" disabled><i
            class="fas fa-minus"></i></button>
   </div>
   <div>
      <strong>
         TOTAL EVACUATION DECHARGES / DECHETTERIES HT : <span id="pTotalEvac"></span>
      </strong>
   </div>
</div>
