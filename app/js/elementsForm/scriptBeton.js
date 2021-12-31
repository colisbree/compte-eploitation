if (formSoumis === 1) {
   for (let n = 1; n <= be; n++) {
      calculBeton(n, 1);
   }
   if (be > 1) {
      document.getElementById('btnBetonMinus').disabled = false;
   }
}

function calculBeton(j, soumis = 0) {
   let quantite = parseFloat(document.getElementById("formulaire").elements["volume" + j].value);
   let prixUnitaireHTBeton = parseFloat(document.getElementById("formulaire").elements["prixUnitaireHTBeton" + j].value);
   let pTotalHTBeton = parseFloat(document.getElementById("formulaire").elements["pTotalHTBeton" + j].value);
   //let pTotauxBetons = document.getElementById("pTotauxBetons");
   if (!isNaN(quantite) && !isNaN(prixUnitaireHTBeton)) {
      pTotalHTBeton = quantite * prixUnitaireHTBeton;
      document.getElementById("formulaire").elements["pTotalHTBeton" + j].value = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotalHTBeton * 100) / 100).toFixed(2));
      //document.getElementById("pTotauxBetons").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotauxBetons * 100) / 100).toFixed(2));
      document.getElementById('btnBetonPlus').disabled = false;
   } else {
      document.getElementById("formulaire").elements["pTotalHTBeton" + j].value = "0.00 €";
      alert("Erreur de saisie. Veuillez recommencer.");

   }
   if (soumis === 0) {
      calculTotalItem(be, "pTotalHTBeton", "pTotalBeton");
   }
}

// function calculTotalBeton() {
//    let cumul = 0;
//    for (let a = 1; a <= be; a++) {
//       let separation = (document.getElementById("formulaire").elements["pTotalHTBeton" + a].value);
//       if (separation) {
//          separation = separation.replace(/\s+/g, ""); // suppression des espaces
//          separation = separation.slice(0, separation.length - 1); // suppression du symbole €
//          separation = separation.replace(",", ".");
//          cumul = cumul + parseFloat(separation);
//       }
//    }
//    document.getElementById("pTotalBeton").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(cumul * 100) / 100).toFixed(2));
// }

// ajout d'une ligne Beton
btnBetonPlus.addEventListener("click", function (event) {
   document.getElementById('btnBetonPlus').disabled = false;
   let pTotalHTBeton = parseFloat(document.getElementById("formulaire").elements["pTotalHTBeton" + be].value);
   if (isNaN(pTotalHTBeton)) {
      document.getElementById('btnBetonPlus').disabled = true;
      return;
   }
   addLineBeton();
})

function addLineBeton() {
   // let text;
   // text = "test du code js";
   // document.getElementById("plus").innerHTML = text;
   be++;
   let newBeton = be + 1;
   let div = document.getElementById('formBeton' + be);
   let addCode = `<tr id="formBeton` + be + `">
            <th scope="row" id="LigneBeton` + be + `" class="align-middle">` + be + `</th>
            <input type="hidden" name="ligneBeton` + be + `" value="ligne">
            <td>
               <input type="text" name="volume` + be + `" class="form-control form-control-sm text-end" value=""
                  onchange="calculBeton(` + be + `)" >
            </td>
            <td>
               <input type="text" name="centrale` + be + `" class="form-control form-control-sm text-end" value="">
            </td>
            <td>
               <input type="text" name="natureBeton` + be + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="posteBeton` + be + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="prixUnitaireHTBeton` + be + `" class="form-control form-control-sm text-end" value="120"
                  onchange="calculBeton(` + be + `)" >
            </td>
            <td>
               <input type="text" name="pTotalHTBeton` + be + `" class="form-control form-control-sm text-end fw-bold" value="" disabled
                  readonly>
            </td>
         </tr>
         <tr id="formBeton`+ newBeton + `"></tr>`;
   //div.innerHTML += addCode;
   document.getElementById('formBeton' + be).outerHTML = addCode;

   if (newBeton >= 3) {
      document.getElementById('btnBetonMinus').disabled = false;
   }
}

// suppression dernière ligne Beton
btnBetonMinus.addEventListener("click", function (event) {
   be = suppLigneForm(be, 'Beton');
   calculTotalItem(be, "pTotalHTBeton", "pTotalBeton");
})

// function suppLineBeton() {
//    var element = document.getElementById("formBeton" + be);
//    while (element.firstChild) {
//       element.removeChild(element.firstChild);
//    }
//    be--;
//    if (be < 2) {
//       document.getElementById('btnBetonMinus').disabled = true;
//       document.getElementById('btnBetonPlus').disabled = false;
//    }
// }

// -----------------------------------
//
// -----------------------------------

