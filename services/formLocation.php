
         <table class="table table-hover table-sm caption-top">
            <caption class="bg-light-marron">LOCATION ENGINS / MATERIELS</caption>
            <thead>
               <tr>
                  <th scope="col"></th>
                  <th scope="col" class="col-md-2 text-center align-middle">Loueur</th>
                  <th scope="col" class="col-md-2 text-center align-middle">Location/Matériel</th>
                  <th scope="col" class="col-md-1 text-center align-middle">Coût € HT</th>
                  <th scope="col" class="col-md-3 text-center align-middle">Commentaire</th>
                  <th scope="col" class="col-md-2 text-center align-middle">Poste</th>
                  <th scope="col" class="col-md-2 text-center align-middle">Coût Total € HT</th>
               </tr>
            </thead>
            <tbody>
               <tr id="formLocation1">
                  <th scope="row" id="LigneLocation1" class="align-middle">1</th>
                  <td>
                     <input type="text" name="loueurLocation1" class="form-control form-control-sm text-end" value="">
                  </td>
                  <td>
                     <input type="text" name="typeLocation1" class="form-control form-control-sm text-end" value="">
                  </td>
                  <td>
                     <input type="text" name="prixUnitaireHTLocation1" class="form-control form-control-sm text-end"
                        value="" min="0" onchange="calculLocation(1)" >
                  </td>
                  <td>
                     <input type="text" name="commentaireLocation1" class="form-control form-control-sm" value="">
                  </td>
                  <td>
                     <input type="text" name="posteLocation1" class="form-control form-control-sm" value="">
                  </td>
                  <td>
                     <input type="text" name="pTotalHTLocation1" class="form-control form-control-sm text-end fw-bold"
                        value="" disabled readonly>
                  </td>
               </tr>
               <tr id="formLocation2"></tr>
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
