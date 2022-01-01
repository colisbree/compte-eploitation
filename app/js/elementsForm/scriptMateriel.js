if (formSoumis === 1) {
   for (let n = 1; n <= eem; n++) {
      calculEngin(n, 1);
   }
   if (eem > 1) {
      document.getElementById('btnEnginMinus').disabled = false;
   }
}


function calculEngin(j, soumis = 0) {
   let nbHeures = parseFloat(document.getElementById("formulaire").elements["nbHeuresEngin" + j].value);
   let prixUnitaireHTEngin = parseFloat(document.getElementById("formulaire").elements["prixUnitaireHTEngin" + j].value);
   let pTotalHTEngin = parseFloat(document.getElementById("formulaire").elements["pTotalHTEngin" + j].value);
   //let pTotauxEngins = document.getElementById("pTotauxEngins");
   if (!isNaN(nbHeures) && !isNaN(prixUnitaireHTEngin)) {
      pTotalHTEngin = nbHeures * prixUnitaireHTEngin;
      document.getElementById("formulaire").elements["pTotalHTEngin" + j].value = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotalHTEngin * 100) / 100).toFixed(2));
      //document.getElementById("pTotauxEngins").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotauxEngins * 100) / 100).toFixed(2));
      document.getElementById('btnEnginPlus').disabled = false;
   } else {
      document.getElementById("formulaire").elements["pTotalHTEngin" + j].value = "0.00 €";
      //alert("Erreur de saisie. Veuillez recommencer.");

   }
   if (soumis === 0) {
      calculTotalItem(eem, "pTotalHTEngin", "pTotalEngin");
   }
}

// function calculTotalEngin() {
//    let cumul = 0;
//    for (let a = 1; a <= eem; a++) {
//       let separation = (document.getElementById("formulaire").elements["pTotalHTEngin" + a].value);
//       if (separation) {
//          separation = separation.replace(/\s+/g, ""); // suppression des espaces
//          separation = separation.slice(0, separation.length - 1); // suppression du symbole €
//          separation = separation.replace(",", ".");
//          cumul = cumul + parseFloat(separation);
//       }
//    }
//    document.getElementById("pTotalEngin").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(cumul * 100) / 100).toFixed(2));
// }

// ajout d'une ligne Engin
btnEnginPlus.addEventListener("click", function (event) {
   document.getElementById('btnEnginPlus').disabled = false;
   let pTotalHTEngin = parseFloat(document.getElementById("formulaire").elements["pTotalHTEngin" + eem].value);
   if (isNaN(pTotalHTEngin)) {
      document.getElementById('btnEnginPlus').disabled = true;
      return;
   }
   addLineEngin();
})

function addLineEngin() {
   // let text;
   // text = "test du code js";
   // document.getElementById("plus").innerHTML = text;
   eem++;
   let newEngin = eem + 1;
   let div = document.getElementById('formEngin' + eem);
   let addCode = `<tr id="formEngin` + eem + `">
            <th scope="row" id="LigneEngin` + eem + `" class="align-middle">` + eem + `</th>
            <input type="hidden" name="LigneEngin` + eem + `" value="ligne">
            <td>
               <input type="text" list="liste-engins" id="list_input` + eem + `" name="typeEngin` + eem + `"
                  class="form-control form-control-sm text-end" value="" onchange="selectEngin(` + eem + `)" >
               <datalist id="liste-engins">
                  
               </datalist>
            </td>
            <td>
               <input type="text" name="nbHeuresEngin` + eem + `" class="form-control form-control-sm text-end" value=""
                  min="0" onchange="calculEngin(` + eem + `)" >
            </td>
            <td>
               <input type="text" name="prixUnitaireHTEngin` + eem + `" class="form-control form-control-sm text-end"
                  value="" min="0" onchange="calculEngin(` + eem + `)" >
            </td>
            <td>
               <input type="text" name="commentaireEngin` + eem + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="posteEngin` + eem + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="pTotalHTEngin` + eem + `" class="form-control form-control-sm text-end fw-bold"
                  value="" disabled readonly>
            </td>
         </tr>
         <tr id="formEngin`+ newEngin + `"></tr>`;
   //div.innerHTML += addCode;
   document.getElementById('formEngin' + eem).outerHTML = addCode;

   if (newEngin >= 3) {
      document.getElementById('btnEnginMinus').disabled = false;
   }
}

// suppression dernière ligne Engin
btnEnginMinus.addEventListener("click", function (event) {
   eem = suppLigneForm(eem, 'Engin');
   calculTotalItem(eem, "pTotalHTEngin", "pTotalEngin");
})

// function suppLineEngin() {
//    var element = document.getElementById("formEngin" + eem);
//    while (element.firstChild) {
//       element.removeChild(element.firstChild);
//    }
//    eem--;
//    if (eem < 2) {
//       document.getElementById('btnEnginMinus').disabled = true;
//       document.getElementById('btnEnginPlus').disabled = false;
//    }
// }

// selection de l'engin et du tarif associé
function selectEngin(j) {
   let input_value = document.getElementById("list_input" + j).value;
   //console.log(input_value);
   if (input_value !== "") {
      let selected_option = document.querySelector("option[value='" + input_value + "']");
      let coutHoraire = selected_option.attributes[0].value;
      //console.log(selected_option.attributes[0].value);
      document.getElementById("formulaire").elements["prixUnitaireHTEngin" + j].value = coutHoraire;
   } else {
      document.getElementById("formulaire").elements["nbHeuresEngin" + j].value = "";
      document.getElementById("formulaire").elements["prixUnitaireHTEngin" + j].value = 0;
      document.getElementById("formulaire").elements["pTotalHTEngin" + j].value = "0.00 €";
      document.getElementById('btnEnginPlus').disabled = true;
      calculTotalItem(eem, "pTotalHTEngin", "pTotalEngin");
   }

}

// -----------------------------------
//
// -----------------------------------

