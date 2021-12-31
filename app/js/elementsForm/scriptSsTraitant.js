if (formSoumis === 1) {
   for (let n = 1; n <= st; n++) {
      calculSt(n, 1);
   }
   if (st > 1) {
      document.getElementById('btnStMinus').disabled = false;
   }
}


function calculSt(j, soumis = 0) {
   let nbPers = parseFloat(document.getElementById("formulaire").elements["nbPersSt" + j].value);
   let nbHeure = parseFloat(document.getElementById("formulaire").elements["nbHeureSt" + j].value);
   let prixUnitaireHTSt = parseFloat(document.getElementById("formulaire").elements["prixUnitaireHTSt" + j].value);
   let pTotalHTSt = parseFloat(document.getElementById("formulaire").elements["pTotalHTSt" + j].value);
   //let pTotauxSts = document.getElementById("pTotauxSts");
   if (!isNaN(nbPers) && !isNaN(nbHeure) && !isNaN(prixUnitaireHTSt)) {
      pTotalHTSt = nbPers * nbHeure * prixUnitaireHTSt;
      document.getElementById("formulaire").elements["pTotalHTSt" + j].value = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotalHTSt * 100) / 100).toFixed(2));
      //document.getElementById("pTotauxSts").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotauxSts * 100) / 100).toFixed(2));
      document.getElementById('btnStPlus').disabled = false;
   } else {
      document.getElementById("formulaire").elements["pTotalHTSt" + j].value = "0.00 €";
      alert("Erreur de saisie. Veuillez recommencer.");

   }
   if (soumis === 0) {
      calculTotalItem(st, "pTotalHTSt", "pTotalSt");
   }
}

// function calculTotalSt() {
//    let cumul = 0;
//    for (let a = 1; a <= st; a++) {
//       let separation = (document.getElementById("formulaire").elements["pTotalHTSt" + a].value);
//       if (separation) {
//          separation = separation.replace(/\s+/g, ""); // suppression des espaces
//          separation = separation.slice(0, separation.length - 1); // suppression du symbole €
//          separation = separation.replace(",", ".");
//          cumul = cumul + parseFloat(separation);
//       }
//    }
//    document.getElementById("pTotalSt").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(cumul * 100) / 100).toFixed(2));
// }

// ajout d'une ligne St
btnStPlus.addEventListener("click", function (event) {
   document.getElementById('btnStPlus').disabled = false;
   let pTotalHTSt = parseFloat(document.getElementById("formulaire").elements["pTotalHTSt" + st].value);
   if (isNaN(pTotalHTSt)) {
      document.getElementById('btnStPlus').disabled = true;
      return;
   }
   addLineSt();
})

function addLineSt() {
   // let text;
   // text = "test du code js";
   // document.getElementById("plus").innerHTML = text;
   st++;
   let newSt = st + 1;
   let div = document.getElementById('formSt' + st);
   let addCode = `<tr id="formSt` + st + `">
            <th scope="row" id="ligneSt` + st + `" class="align-middle">` + st + `</th>
            <input type="hidden" name="ligneSt` + st + `" value="ligne">
            <td>
               <input type="text" name="sStraitantSt` + st + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="number" name="nbPersSt` + st + `" class="form-control form-control-sm text-end" value="1"
                  min="1"  onchange="calculSt(` + st + `)" >
            </td>
            <td>
               <input type="text" name="nbHeureSt` + st + `" class="form-control form-control-sm text-end" value=""
                   onchange="calculSt(` + st + `)" >
            </td>
            <td>
               <input type="text" name="natureSt` + st + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="posteSt` + st + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="prixUnitaireHTSt` + st + `" class="form-control form-control-sm text-end"
                  value="25"  onchange="calculSt(` + st + `)" >
            </td>
            <td>
               <input type="text" name="pTotalHTSt` + st + `" class="form-control form-control-sm text-end fw-bold"
                  value="" disabled readonly>
            </td>
         </tr>
         <tr id="formSt`+ newSt + `"></tr>`;
   //div.innerHTML += addCode;
   document.getElementById('formSt' + st).outerHTML = addCode;

   if (newSt >= 3) {
      document.getElementById('btnStMinus').disabled = false;
   }
}

// suppression dernière ligne St
btnStMinus.addEventListener("click", function (event) {
   st = suppLigneForm(st, 'St');
   calculTotalItem(st, "pTotalHTSt", "pTotalSt");
})

// function suppLineSt() {
//    var element = document.getElementById("formSt" + st);
//    while (element.firstChild) {
//       element.removeChild(element.firstChild);
//    }
//    st--;
//    if (st < 2) {
//       document.getElementById('btnStMinus').disabled = true;
//       document.getElementById('btnStPlus').disabled = false;
//    }
// }

// -----------------------------------
//
// -----------------------------------

