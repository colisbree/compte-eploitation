<?php
//récupération du nombre lignes si soumission du formulaire
$nbLignesItem = isset($nbLignes) ? $nbLignes[1] : 1;
$formSoumis = isset($formSoumis) ? $formSoumis : 0;

echo "<script type='text/javascript'>";
echo "let i= $nbLignesItem;";
echo "let formSoumis = $formSoumis;";
echo "</script>";

?>

<table class="table table-hover table-sm caption-top">
	<caption class="bg-purple">FOURNITURES</caption>
	<thead>
		<tr>
			<th scope="col"><input type="hidden" name="Fournisseur" value="categorie"></th>
			<th scope="col" class="col-md-2 text-center align-middle">Fournisseur</th>
			<th scope="col" class="col-md-1 text-center align-middle">Quantité</th>
			<th scope="col" class="col-md-3 text-center align-middle text-warning bg-dark">Référence</th>
			<th scope="col" class="col-md-1 text-center align-middle">Poste</th>
			<th scope="col" class="col-md-1 text-center align-middle">PU € HT</th>
			<th scope="col" class="col-md-1 text-center align-middle">PTot € HT</th>
			<th scope="col" class="col-md-1 text-center align-middle">Transp €HT</th>
			<th scope="col" class="col-md-2 text-center align-middle">Prix Revient € HT</th>
		</tr>
	</thead>
	<tbody>
		<?php
		for($n=1; $n <= $nbLignesItem; $n++) : 
		?>
			<tr id="formFournisseur<?= $n ?>">
				<th scope="row" id="ligneFrs<?= $n ?>" class="align-middle"><?= $n ?></th>
				<input type="hidden" name="ligneFrs<?= $n ?>" value="ligne">
				<td>
					<input type="text" name="fournisseur<?= $n ?>" value="<?= isset($datas) ? $datas['fournisseur'.$n] : "" ?>" class="form-control form-control-sm text-end">
				</td>
				<td>
					<input type="text" name="quantite<?= $n ?>" value="<?= isset($datas) ? $datas['quantite'.$n] : "" ?>" onchange="calculPrix(<?= $n ?>)" class="form-control form-control-sm text-end">
				</td>
				<td>
					<input type="text" list="liste-ref" id="list_ref<?= $n ?>" name="reference<?= $n ?>"
						class="form-control form-control-sm text-end" value="<?= isset($datas) ? $datas['reference'.$n] : "" ?>" onchange="selectRef(<?= $n ?>)">
					<datalist id="liste-ref">
						<option data-value='AEDM|52' value='Copeaux de bois Eco Copeo Naturel'>
						<option data-value='AEDM|25' value='Terre végétale amendée '>
						<option data-value='AEDM|15' value='Tourbe '>
						<option data-value='AGRICOM|800' value='Olivier 100/120'>
						<option data-value='BERTON-PROLIANS|25' value='Bombe à tracer '>
						<option data-value='BERTON-PROLIANS|75' value='Tirefonds 180 mm'>
						<option data-value='BHS|0,79' value='ACTIVIE - Amendement au Kg'>
						<option data-value='BHS|35' value='Gazon semis '>
						<option data-value='BHS|12,36' value='TCHAO 540 EXPERT/L'>
						<option data-value='BHS |2,5' value='Optacote/kg - Engrais'>
						<option data-value='BRUNET |18,96' value='Cloture en planche PIN 41mm'>
						<option data-value='BRUNET |1,4' value='Plots Terrasse 40/60'>
						<option data-value='BRUNET |11,6' value='Rondins Pin Diam 100 - Autoclave 3 ml BRUNET'>
						<option data-value='BRUNET |60' value='Terrasse bois exo KAPUR'>
					</datalist>
				</td>
				<td>
					<input type="text" name="poste<?= $n ?>" value="<?= isset($datas) ? $datas['poste'.$n] : "" ?>" class="form-control form-control-sm">
				</td>
				<td>
					<input type="text" name="prixUnitaireHT<?= $n ?>" value="<?= isset($datas) ? $datas['prixUnitaireHT'.$n] : 0 ?>"  onchange="calculPrix(<?= $n ?>)" class="form-control form-control-sm text-end">
				</td>
				<td>
					<input type="text" name="pTotalHT<?= $n ?>" value="" class="form-control form-control-sm text-end"  disabled readonly>
				</td>
				<td>
					<input type="text" name="pTransportHT<?= $n ?>" value="<?= isset($datas) ? $datas['pTransportHT'.$n] : 0 ?>" onchange="calculPrix(<?= $n ?>)" class="form-control form-control-sm text-end">
				</td>
				<td>
					<input type="text" name="pRevientHT<?= $n ?>" value="" class="form-control form-control-sm text-end fw-bold" disabled readonly>
				</td>
			</tr>
		<?php 
		endfor;
		?>
		<tr id="formFournisseur<?= $n ?>"></tr>
	</tbody>
</table>


<div class="d-flex justify-content-between mb-2 me-5">
	<div>
		<button class="btn btn-outline-secondary" type="button" id="btnFournisseurPlus" disabled><i
				class="fas fa-plus"></i></button>
		<button class="btn btn-outline-secondary" type="button" id="btnFournisseurMinus" disabled><i
				class="fas fa-minus"></i></button>
	</div>
	<div>
		<strong>
			TOTAL FOURNITURES HT : <span id="pTotauxFournisseurs"></span>
		</strong>
	</div>
</div>
