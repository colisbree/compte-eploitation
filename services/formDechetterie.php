
         <table class="table table-hover table-sm caption-top">
            <caption class="bg-grey">EVACUATION DECHARGES / DECHETTERIES</caption>
            <thead>
               <tr>
                  <th scope="col"></th>
                  <th scope="col" class="col-md-1 text-center align-middle">Volume m3</th>
                  <th scope="col" class="col-md-1 text-center align-middle">PU €HT/m3</th>
                  <th scope="col" class="col-md-5 text-center align-middle">Nature des travaux</th>
                  <th scope="col" class="col-md-2 text-center align-middle">Poste</th>
                  <th scope="col" class="col-md-1 text-center align-middle">Benne € HT</th>
                  <th scope="col" class="col-md-2 text-center align-middle">PTotal €HT</th>
               </tr>
            </thead>
            <tbody>
               <tr id="formEvac1">
                  <th scope="row" id="LigneEvac1" class="align-middle">1</th>
                  <td>
                     <input type="text" name="volumeEvac1" value="" min="0" onchange="calculEvac(1)" class="form-control form-control-sm text-end" >
                  </td>
                  <td>
                     <input type="text" name="prixUnitaireHTEvac1" value="3.50" min="0" onchange="calculEvac(1)" class="form-control form-control-sm text-end">
                  </td>
                  <td>
                     <input type="text" name="natureEvac1" value="" class="form-control form-control-sm">
                  </td>
                  <td>
                     <input type="text" name="posteEvac1" value="" class="form-control form-control-sm">
                  </td>
                  <td>
                     <input type="text" name="locationEvac1" value="0" onchange="calculEvac(1)" class="form-control form-control-sm text-end">
                  </td>
                  <td>
                     <input type="text" name="pTotalHTEvac1" value="" class="form-control form-control-sm text-end fw-bold" disabled readonly>
                  </td>
               </tr>
               <tr id="formEvac2"></tr>
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
