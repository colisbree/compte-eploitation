<table class="table table-hover table-sm caption-top">
   <caption class="bg-light-blue">MAIN D'OEUVRE</caption>
   <thead>
      <tr>
         <th scope="col"></th>
         <th scope="col" class="col-md-1 text-center align-middle">Nb Pers</th>
         <th scope="col" class="col-md-2 text-center align-middle">Nb Heures</th>
         <th scope="col" class="col-md-4 text-center align-middle">Nature des travaux</th>
         <th scope="col" class="col-md-2 text-center align-middle">Poste</th>
         <th scope="col" class="col-md-1 text-center align-middle">Tarif H/Mo</th>
         <th scope="col" class="col-md-2 text-center align-middle">PTotal MO</th>
      </tr>
   </thead>
   <tbody>
      <tr id="formMo1">
         <th scope="row" id="ligneMo1" class="align-middle">1</th>
         <td>
            <input type="number" name="nbPers1" class="form-control form-control-sm text-end" value="1" min="1" onchange="calculMo(1)">
         </td>
         <td>
            <input type="text" name="nbHeure1" value="" onchange="calculMo(1)" class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="natureMo1" value="" class="form-control form-control-sm">
         </td>
         <td>
            <input type="text" name="posteMo1" value="" class="form-control form-control-sm">
         </td>
         <td>
            <input type="text" name="prixUnitaireHTMo1" value="25" onchange="calculMo(1)" class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="pTotalHTMo1" value="" class="form-control form-control-sm text-end fw-bold" disabled readonly>
         </td>
      </tr>
      <tr id="formMo2"></tr>
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