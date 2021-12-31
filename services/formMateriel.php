
         <table class="table table-hover table-sm caption-top">
            <caption class="bg-olive">EMPLOI ENGINS / MATERIELS WAROT</caption>
            <thead>
               <tr>
                  <th scope="col"></th>
                  <th scope="col" class="col-md-2 text-center align-middle text-warning bg-dark">Engin/Matériel</th>
                  <th scope="col" class="col-md-1 text-center align-middle">Nb heures</th>
                  <th scope="col" class="col-md-1 text-center align-middle">Ct horaire</th>
                  <th scope="col" class="col-md-4 text-center align-middle">Commentaire</th>
                  <th scope="col" class="col-md-2 text-center align-middle">Poste</th>
                  <th scope="col" class="col-md-2 text-center align-middle">Coût Total € HT</th>
               </tr>
            </thead>
            <tbody>
               <tr id="formEngin1">
                  <th scope="row" id="LigneEngin1" class="align-middle">1</th>
                  <td>
                     <input type="text" list="liste-engins" id="list_input1" name="typeEngin1"
                        class="form-control form-control-sm text-end" value="" onchange="selectEngin(1)" >
                     <datalist id="liste-engins">
                        <option data-value='21' value='Bobcat'>
                        <option data-value='28' value='Broyeur'>
                        <option data-value='3' value='Debroussailleuse'>
                        <option data-value='14' value='Grosse-tondeuse'>
                        <option data-value='21' value='Minipelle'>
                        <option data-value='3' value='Petite-tondeuse'>
                        <option data-value='28' value='Poids-lourds'>
                        <option data-value='28' value='Tracteur'>
                        <option data-value='28' value='Tractopelle'>
                     </datalist>
                  </td>
                  <td>
                     <input type="text" name="nbHeuresEngin1" value="" min="0" onchange="calculEngin(1)" class="form-control form-control-sm text-end" >
                  </td>
                  <td>
                     <input type="text" name="prixUnitaireHTEngin1" value="" min="0" onchange="calculEngin(1)" class="form-control form-control-sm text-end">
                  </td>
                  <td>
                     <input type="text" name="commentaireEngin1" value=""  class="form-control form-control-sm">
                  </td>
                  <td>
                     <input type="text" name="posteEngin1" value="" class="form-control form-control-sm">
                  </td>
                  <td>
                     <input type="text" name="pTotalHTEngin1" value="" class="form-control form-control-sm text-end fw-bold" disabled readonly>
                  </td>
               </tr>
               <tr id="formEngin2"></tr>
            </tbody>
         </table>


         <div class="d-flex justify-content-between mb-2 me-5">
            <div>
               <button class="btn btn-outline-secondary" type="button" id="btnEnginPlus" disabled><i
                     class="fas fa-plus"></i></button>
               <button class="btn btn-outline-secondary" type="button" id="btnEnginMinus" disabled><i
                     class="fas fa-minus"></i></button>
            </div>
            <div>
               <strong>
                  TOTAL EMPLOI ENGINS / MATERIELS HT : <span id="pTotalEngin"></span>
               </strong>
            </div>
         </div>
