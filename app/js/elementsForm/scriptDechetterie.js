if (formSoumis === 1) {
   for (let n = 1; n <= edd; n++) {
      calculEvac(n, 1);
   }
   if (edd > 1) {
      document.getElementById('btnEvacMinus').disabled = false;
   }
}


function calculEvac(j, soumis = 0) {
   let quantite = parseFloat(document.getElementById("formulaire").elements["volumeEvac" + j].value);
   let location = parseFloat(document.getElementById("formulaire").elements["locationEvac" + j].value);
   let prixUnitaireHTEvac = parseFloat(document.getElementById("formulaire").elements["prixUnitaireHTEvac" + j].value);
   let pTotalHTEvac = parseFloat(document.getElementById("formulaire").elements["pTotalHTEvac" + j].value);
   //let pTotauxEvacs = document.getElementById("pTotauxEvacs");
   if (!isNaN(quantite) && !isNaN(location) && !isNaN(prixUnitaireHTEvac)) {
      pTotalHTEvac = quantite * prixUnitaireHTEvac + location;
      document.getElementById("formulaire").elements["pTotalHTEvac" + j].value = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotalHTEvac * 100) / 100).toFixed(2));
      //document.getElementById("pTotauxEvacs").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotauxEvacs * 100) / 100).toFixed(2));
      document.getElementById('btnEvacPlus').disabled = false;
   } else {
      document.getElementById("formulaire").elements["pTotalHTEvac" + j].value = "0.00 €";
      //alert("Erreur de saisie. Veuillez recommencer.");

   }
   if (soumis === 0) {
      calculTotalItem(edd, "pTotalHTEvac", "pTotalEvac");
   }
}

// function calculTotalEvac() {
//    let cumul = 0;
//    for (let a = 1; a <= edd; a++) {
//       let separation = (document.getElementById("formulaire").elements["pTotalHTEvac" + a].value);
//       if (separation) {
//          separation = separation.replace(/\s+/g, ""); // suppression des espaces
//          separation = separation.slice(0, separation.length - 1); // suppression du symbole €
//          separation = separation.replace(",", ".");
//          cumul = cumul + parseFloat(separation);
//       }
//    }
//    document.getElementById("pTotalEvac").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(cumul * 100) / 100).toFixed(2));
// }

// ajout d'une ligne Evac
btnEvacPlus.addEventListener("click", function (event) {
   document.getElementById('btnEvacPlus').disabled = false;
   let pTotalHTEvac = parseFloat(document.getElementById("formulaire").elements["pTotalHTEvac" + edd].value);
   if (isNaN(pTotalHTEvac)) {
      document.getElementById('btnEvacPlus').disabled = true;
      return;
   }
   addLineEvac();
})

function addLineEvac() {
   // let text;
   // text = "test du code js";
   // document.getElementById("plus").innerHTML = text;
   edd++;
   let newEvac = edd + 1;
   let div = document.getElementById('formEvac' + edd);
   let addCode = `<tr id="formEvac` + edd + `">
            <th scope="row" id="LigneEvac` + edd + `" class="align-middle">` + edd + `</th>
            <input type="hidden" name="LigneEvac` + edd + `" value="ligne">
            <td>
               <input type="text" name="volumeEvac` + edd + `" class="form-control form-control-sm text-end" value=""
                  min="0" onchange="calculEvac(` + edd + `)" >
            </td>
            <td>
               <input type="text" name="prixUnitaireHTEvac` + edd + `" class="form-control form-control-sm text-end"
                  value="3.50" min="0" onchange="calculEvac(` + edd + `)" >
            </td>
            <td>
               <input type="text" name="natureEvac` + edd + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="posteEvac` + edd + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="locationEvac` + edd + `" class="form-control form-control-sm text-end" value="0"
                  onchange="calculEvac(` + edd + `)" >
            </td>
            <td>
               <input type="text" name="pTotalHTEvac` + edd + `" class="form-control form-control-sm text-end fw-bold"
                  value="" disabled readonly>
            </td>
         </tr>
         <tr id="formEvac`+ newEvac + `"></tr>`;
   //div.innerHTML += addCode;
   document.getElementById('formEvac' + edd).outerHTML = addCode;

   if (newEvac >= 3) {
      document.getElementById('btnEvacMinus').disabled = false;
   }
}

// suppression dernière ligne Evac
btnEvacMinus.addEventListener("click", function (event) {
   edd = suppLigneForm(edd, 'Evac');
   calculTotalItem(edd, "pTotalHTEvac", "pTotalEvac");
})

// function suppLineEvac() {
//    var element = document.getElementById("formEvac" + edd);
//    while (element.firstChild) {
//       element.removeChild(element.firstChild);
//    }
//    edd--;
//    if (edd < 2) {
//       document.getElementById('btnEvacMinus').disabled = true;
//       document.getElementById('btnEvacPlus').disabled = false;
//    }
// }

// -----------------------------------
//
// -----------------------------------

