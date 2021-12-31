if (formSoumis === 1) {
   for (let n = 1; n <= mo; n++) {
      calculMo(n, 1);
   }
   if (mo > 1) {
      document.getElementById('btnMoMinus').disabled = false;
   }
}


function calculMo(j, soumis = 0) {
   let nbPers = parseFloat(document.getElementById("formulaire").elements["nbPers" + j].value);
   let nbHeure = parseFloat(document.getElementById("formulaire").elements["nbHeure" + j].value);
   let prixUnitaireHTMo = parseFloat(document.getElementById("formulaire").elements["prixUnitaireHTMo" + j].value);
   let pTotalHTMo = parseFloat(document.getElementById("formulaire").elements["pTotalHTMo" + j].value);
   //let pTotauxMos = document.getElementById("pTotauxMos");
   if (!isNaN(nbPers) && !isNaN(nbHeure) && !isNaN(prixUnitaireHTMo)) {
      pTotalHTMo = nbPers * nbHeure * prixUnitaireHTMo;
      document.getElementById("formulaire").elements["pTotalHTMo" + j].value = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotalHTMo * 100) / 100).toFixed(2));
      //document.getElementById("pTotauxMos").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotauxMos * 100) / 100).toFixed(2));
      document.getElementById('btnMoPlus').disabled = false;
   } else {
      document.getElementById("formulaire").elements["pTotalHTMo" + j].value = "0.00 €";
      alert("Erreur de saisie. Veuillez recommencer.");

   }
   if (soumis === 0) {
      calculTotalItem(mo, "pTotalHTMo", "pTotalMo");
   }
}

// function calculTotalMo() {
//    let cumul = 0;
//    for (let a = 1; a <= mo; a++) {
//       let separation = (document.getElementById("formulaire").elements["pTotalHTMo" + a].value);
//       if (separation) {
//          separation = separation.replace(/\s+/g, ""); // suppression des espaces
//          separation = separation.slice(0, separation.length - 1); // suppression du symbole €
//          separation = separation.replace(",", ".");
//          cumul = cumul + parseFloat(separation);
//       }
//    }
//    document.getElementById("pTotalMo").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(cumul * 100) / 100).toFixed(2));
// }

// ajout d'une ligne Mo
btnMoPlus.addEventListener("click", function (event) {
   document.getElementById('btnMoPlus').disabled = false;
   let pTotalHTMo = parseFloat(document.getElementById("formulaire").elements["pTotalHTMo" + mo].value);
   if (isNaN(pTotalHTMo)) {
      document.getElementById('btnMoPlus').disabled = true;
      return;
   }
   addLineMo();
})

function addLineMo() {
   // let text;
   // text = "test du code js";
   // document.getElementById("plus").innerHTML = text;
   mo++;
   let newMo = mo + 1;
   let div = document.getElementById('formMo' + mo);
   let addCode = `<tr id="formMo` + mo + `">
            <th scope="row" id="ligneMo` + mo + `" class="align-middle">` + mo + `</th>
            <input type="hidden" name="ligneMo` + mo + `" value="ligne">
            <td>
               <input type="number" name="nbPers` + mo + `" class="form-control form-control-sm text-end" value="1" min="1"
                onchange="calculMo(` + mo + `)" >
            </td>
            <td>
               <input type="text" name="nbHeure` + mo + `" class="form-control form-control-sm text-end" value=""
                  onchange="calculMo(` + mo + `)" >
            </td>
            <td>
               <input type="text" name="natureMo` + mo + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="posteMo` + mo + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="prixUnitaireHTMo` + mo + `" class="form-control form-control-sm text-end"
                  value="25" onchange="calculMo(` + mo + `)" >
            </td>
            <td>
               <input type="text" name="pTotalHTMo` + mo + `" class="form-control form-control-sm text-end fw-bold"
                  value="" disabled readonly>
            </td>
         </tr>
         <tr id="formMo`+ newMo + `"></tr>`;
   //div.innerHTML += addCode;
   document.getElementById('formMo' + mo).outerHTML = addCode;

   if (newMo >= 3) {
      document.getElementById('btnMoMinus').disabled = false;
   }
}

// suppression dernière ligne Mo
btnMoMinus.addEventListener("click", function (event) {
   mo = suppLigneForm(mo, 'Mo');
   calculTotalItem(mo, "pTotalHTMo", "pTotalMo");
})

// function suppLineMo() {
//    var element = document.getElementById("formMo" + mo);
//    while (element.firstChild) {
//       element.removeChild(element.firstChild);
//    }
//    mo--;
//    if (mo < 2) {
//       document.getElementById('btnMoMinus').disabled = true;
//       document.getElementById('btnMoPlus').disabled = false;
//    }
// }

// -----------------------------------
//
// -----------------------------------

