<?php
//récupération du nombre lignes si soumission du formulaire
$nbLignesItem = isset($nbLignes) ? $nbLignes[2] : 1;
echo "<script type='text/javascript'>";
echo "let be= $nbLignesItem;";
echo "</script>";
?>

<table class="table table-hover table-sm caption-top">
	<caption class="bg-marron">BETON</caption>
	<thead>
		<tr>
			<th scope="col"><input type="hidden" name="Beton" value="categorie"></th>
			<th scope="col" class="col-md-1 text-center align-middle">Volume m3</th>
			<th scope="col" class="col-md-2 text-center align-middle">Centrale ?</th>
			<th scope="col" class="col-md-4 text-center align-middle">Nature des travaux</th>
			<th scope="col" class="col-md-2 text-center align-middle">Poste</th>
			<th scope="col" class="col-md-1 text-center align-middle">PU €HT/m3</th>
			<th scope="col" class="col-md-2 text-center align-middle">PTotal €HT</th>
		</tr>
	</thead>
	<tbody>
		<?php
		for($n=1; $n <= $nbLignesItem; $n++) : 
		?>
		<tr id="formBeton<?= $n ?>">
			<th scope="row" id="LigneBeton<?= $n ?>" class="align-middle"><?= $n ?></th>
			<input type="hidden" name="ligneBeton<?= $n ?>" value="ligne">
			<td>
				<input type="text" name="volume<?= $n ?>" value="<?= isset($datas) ? $datas['volume'.$n] : "" ?>" onchange="calculBeton(<?= $n ?>)" class="form-control form-control-sm text-end" >
			</td>
			<td>
				<input type="text" name="centrale<?= $n ?>" value="<?= isset($datas) ? $datas['centrale'.$n] : "" ?>" class="form-control form-control-sm text-end">
			</td>
			<td>
				<input type="text" name="natureBeton<?= $n ?>" value="<?= isset($datas) ? $datas['natureBeton'.$n] : "" ?>" class="form-control form-control-sm">
			</td>
			<td>
				<input type="text" name="posteBeton<?= $n ?>" value="<?= isset($datas) ? $datas['posteBeton'.$n] : "" ?>" class="form-control form-control-sm">
			</td>
			<td>
				<input type="text" name="prixUnitaireHTBeton<?= $n ?>" value="<?= isset($datas) ? $datas['prixUnitaireHTBeton'.$n] : 120 ?>" onchange="calculBeton(<?= $n ?>)" class="form-control form-control-sm text-end">
			</td>
			<td>
				<input type="text" name="pTotalHTBeton<?= $n ?>" value="" class="form-control form-control-sm text-end fw-bold" disabled readonly>
			</td>
		</tr>
		<?php
		endfor ;
		?>
		<tr id="formBeton<?= $n ?>"></tr>
	</tbody>
</table>


<div class="d-flex justify-content-between mb-2 me-5">
	<div>
		<button class="btn btn-outline-secondary" type="button" id="btnBetonPlus" disabled><i
				class="fas fa-plus"></i></button>
		<button class="btn btn-outline-secondary" type="button" id="btnBetonMinus" disabled><i
				class="fas fa-minus"></i></button>
	</div>
	<div>
		<strong>
			TOTAL BETON HT : <span id="pTotalBeton"></span>
		</strong>
	</div>
</div>


