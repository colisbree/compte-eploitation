<table class="table table-hover table-sm caption-top">
   <caption class="bg-light-yellow">SOUS-TRAITANCE</caption>
   <thead>
      <tr>
         <th scope="col"></th>
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
      <tr id="formSt1">
         <th scope="row" id="ligneSt1" class="align-middle">1</th>
         <td>
            <input type="text" name="sStraitantSt1" class="form-control form-control-sm" value="">
         </td>
         <td>
            <input type="number" name="nbPersSt1" value="1" min="1" onchange="calculSt(1)"class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="nbHeureSt1" value="" onchange="calculSt(1)"class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="natureSt1" value="" class="form-control form-control-sm" >
         </td>
         <td>
            <input type="text" name="posteSt1" value="" class="form-control form-control-sm" >
         </td>
         <td>
            <input type="text" name="prixUnitaireHTSt1" value="25" onchange="calculSt(1)" class="form-control form-control-sm text-end">
         </td>
         <td>
            <input type="text" name="pTotalHTSt1" value="" class="form-control form-control-sm text-end fw-bold" 
               disabled readonly>
         </td>
      </tr>
      <tr id="formSt2"></tr>
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