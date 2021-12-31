let loc = 1;


function calculLocation(j) {
   let prixUnitaireHTLocation = parseFloat(document.getElementById("formulaire").elements["prixUnitaireHTLocation" + j].value);
   let pTotalHTLocation = parseFloat(document.getElementById("formulaire").elements["pTotalHTLocation" + j].value);
   //let pTotauxLocations = document.getElementById("pTotauxLocations");
   if (!isNaN(prixUnitaireHTLocation)) {
      pTotalHTLocation = prixUnitaireHTLocation;
      document.getElementById("formulaire").elements["pTotalHTLocation" + j].value = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotalHTLocation * 100) / 100).toFixed(2));
      //document.getElementById("pTotauxLocations").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotauxLocations * 100) / 100).toFixed(2));
      document.getElementById('btnLocationPlus').disabled = false;
   } else {
      document.getElementById("formulaire").elements["pTotalHTLocation" + j].value = "0.00 €";
      alert("Erreur de saisie. Veuillez recommencer.");

   }
   calculTotalItem(loc, "pTotalHTLocation", "pTotalLocation");
}

// function calculTotalLocation() {
//    let cumul = 0;
//    for (let a = 1; a <= loc; a++) {
//       let separation = (document.getElementById("formulaire").elements["pTotalHTLocation" + a].value);
//       if (separation) {
//          separation = separation.replace(/\s+/g, ""); // suppression des espaces
//          separation = separation.slice(0, separation.length - 1); // suppression du symbole €
//          separation = separation.replace(",", ".");
//          cumul = cumul + parseFloat(separation);
//       }
//    }
//    document.getElementById("pTotalLocation").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(cumul * 100) / 100).toFixed(2));
// }

// ajout d'une ligne Location
btnLocationPlus.addEventListener("click", function (event) {
   document.getElementById('btnLocationPlus').disabled = false;
   let pTotalHTLocation = parseFloat(document.getElementById("formulaire").elements["pTotalHTLocation" + loc].value);
   if (isNaN(pTotalHTLocation)) {
      document.getElementById('btnLocationPlus').disabled = true;
      return;
   }
   addLineLocation();
})

function addLineLocation() {
   // let text;
   // text = "test du code js";
   // document.getElementById("plus").innerHTML = text;
   loc++;
   let newLocation = loc + 1;
   let div = document.getElementById('formLocation' + loc);
   let addCode = `<tr id="formLocation` + loc + `">
            <th scope="row" id="LigneLocation` + loc + `" class="align-middle">` + loc + `</th>
            <input type="hidden" name="LigneLocation` + loc + `" value="ligne">
            <td>
               <input type="text" name="loueurLocation` + loc + `" class="form-control form-control-sm text-end" value="">
            </td>
            <td>
               <input type="text" name="typeLocation` + loc + `" class="form-control form-control-sm text-end" value="">
            </td>
            <td>
               <input type="text" name="prixUnitaireHTLocation` + loc + `" class="form-control form-control-sm text-end"
                  value="" min="0" onchange="calculLocation(` + loc + `)" >
            </td>
            <td>
               <input type="text" name="commentaireLocation` + loc + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="posteLocation` + loc + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="pTotalHTLocation` + loc + `" class="form-control form-control-sm text-end fw-bold"
                  value="" disabled readonly>
            </td>
         </tr>
         <tr id="formLocation`+ newLocation + `"></tr>`;
   //div.innerHTML += addCode;
   document.getElementById('formLocation' + loc).outerHTML = addCode;

   if (newLocation >= 3) {
      document.getElementById('btnLocationMinus').disabled = false;
   }
}

// suppression dernière ligne Location
btnLocationMinus.addEventListener("click", function (event) {
   loc = suppLigneForm(loc, 'Location');
   calculTotalItem(loc, "pTotalHTLocation", "pTotalLocation");
})

// function suppLineLocation() {
//    var element = document.getElementById("formLocation" + loc);
//    while (element.firstChild) {
//       element.removeChild(element.firstChild);
//    }
//    loc--;
//    if (loc < 2) {
//       document.getElementById('btnLocationMinus').disabled = true;
//       document.getElementById('btnLocationPlus').disabled = false;
//    }
// }


// -----------------------------------
//
// -----------------------------------

