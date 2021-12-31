
			<table class="table table-hover table-sm caption-top">
				<caption class="bg-marron">BETON</caption>
				<thead>
					<tr>
						<th scope="col"></th>
						<th scope="col" class="col-md-1 text-center align-middle">Volume m3</th>
						<th scope="col" class="col-md-2 text-center align-middle">Centrale ?</th>
						<th scope="col" class="col-md-4 text-center align-middle">Nature des travaux</th>
						<th scope="col" class="col-md-2 text-center align-middle">Poste</th>
						<th scope="col" class="col-md-1 text-center align-middle">PU €HT/m3</th>
						<th scope="col" class="col-md-2 text-center align-middle">PTotal €HT</th>
					</tr>
				</thead>
				<tbody>
					<tr id="formBeton1">
						<th scope="row" id="LigneBeton1" class="align-middle">1</th>
						<td>
							<input type="text" name="volume1" value="" onchange="calculBeton(1)" class="form-control form-control-sm text-end" >
						</td>
						<td>
							<input type="text" name="centrale1" value="" class="form-control form-control-sm text-end">
						</td>
						<td>
							<input type="text" name="natureBeton1" value="" class="form-control form-control-sm">
						</td>
						<td>
							<input type="text" name="posteBeton1" value="" class="form-control form-control-sm">
						</td>
						<td>
							<input type="text" name="prixUnitaireHTBeton1" value="120" onchange="calculBeton(1)" class="form-control form-control-sm text-end">
						</td>
						<td>
							<input type="text" name="pTotalHTBeton1" value="" class="form-control form-control-sm text-end fw-bold" disabled readonly>
						</td>
					</tr>
					<tr id="formBeton2"></tr>
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


