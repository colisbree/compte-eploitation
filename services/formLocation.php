
         <table class="table table-hover table-sm caption-top">
            <caption class="bg-light-marron">LOCATION ENGINS / MATERIELS</caption>
            <thead>
               <tr>
                  <th scope="col"><input type="hidden" name="Location" value="categorie"></th>
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
                  <input type="hidden" name="LigneLocation1" value="ligne">
                  <td>
                     <input type="text" name="loueurLocation1" value=""  class="form-control form-control-sm text-end">
                  </td>
                  <td>
                     <input type="text" name="typeLocation1" value="" class="form-control form-control-sm text-end">
                  </td>
                  <td>
                     <input type="text" name="prixUnitaireHTLocation1" value="" min="0" onchange="calculLocation(1)" class="form-control form-control-sm text-end">
                  </td>
                  <td>
                     <input type="text" name="commentaireLocation1" value=""  class="form-control form-control-sm">
                  </td>
                  <td>
                     <input type="text" name="posteLocation1" value="" class="form-control form-control-sm">
                  </td>
                  <td>
                     <input type="text" name="pTotalHTLocation1" value="" class="form-control form-control-sm text-end fw-bold" disabled readonly>
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
