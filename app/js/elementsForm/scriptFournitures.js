let i = 1;


function calculPrix(j) {
   let quantite = parseFloat(document.getElementById("formulaire").elements["quantite" + j].value);
   let prixUnitaireHT = parseFloat(document.getElementById("formulaire").elements["prixUnitaireHT" + j].value);
   let pTransportHT = parseFloat(document.getElementById("formulaire").elements["pTransportHT" + j].value);
   //let pTotauxFournisseurs = document.getElementById("pTotauxFournisseurs");
   if (!isNaN(quantite) && !isNaN(prixUnitaireHT) && !isNaN(pTransportHT)) {
      let pTotalHT = quantite * prixUnitaireHT
      document.getElementById("formulaire").elements["pTotalHT" + j].value = (Math.round(pTotalHT * 100) / 100).toFixed(2);
      let pRevientHT = pTotalHT + pTransportHT;
      document.getElementById("formulaire").elements["pRevientHT" + j].value = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pRevientHT * 100) / 100).toFixed(2));
      //document.getElementById("pTotauxFournisseurs").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(pTotauxFournisseurs * 100) / 100).toFixed(2));
      document.getElementById('btnFournisseurPlus').disabled = false;
   } else {
      document.getElementById("formulaire").elements["pTotalHT" + j].value = 0.00;
      document.getElementById("formulaire").elements["pRevientHT" + j].value = "0.00 €";
      alert("Erreur de saisie. Veuillez recommencer.");

   }
   calculTotalItem(i, "pRevientHT", "pTotauxFournisseurs");
}

// function calculTotalFournitures() {
//    let cumul = 0;
//    for (let a = 1; a <= i; a++) {
//       let separation = (document.getElementById("formulaire").elements["pRevientHT" + a].value);
//       if (separation) {
//          separation = separation.replace(/\s+/g, ""); // suppression des espaces
//          separation = separation.slice(0, separation.length - 1); // suppression du symbole €
//          separation = separation.replace(",", ".");
//          cumul = cumul + parseFloat(separation);
//       }
//    }
//    document.getElementById("pTotauxFournisseurs").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(cumul * 100) / 100).toFixed(2));
// }

// ajout d'une ligne fournisseur
btnFournisseurPlus.addEventListener("click", function (event) {
   document.getElementById('btnFournisseurPlus').disabled = false;
   let pRevientHT = parseFloat(document.getElementById("formulaire").elements["pRevientHT" + i].value);
   if (isNaN(pRevientHT)) {
      document.getElementById('btnFournisseurPlus').disabled = true;
      return;
   }
   addLineFournisseur();
})

function addLineFournisseur() {
   // let text;
   // text = "test du code js";
   // document.getElementById("plus").innerHTML = text;
   i++;
   let newFournisseur = i + 1;
   let div = document.getElementById('form' + i);
   let addCode = `<tr id="formFournisseur` + i + `">
            <th scope="row" id="ligneFrs`+ i + `" class="align-middle">` + i + `</th>
            <td>
               <input type="text" name="fournisseur`+ i + `" class="form-control form-control-sm text-end" value="">
               </td>
            <td>
               <input type="text" name="quantite`+ i + `" class="form-control form-control-sm text-end" value="" min="0"
                   onchange="calculPrix(`+ i + `)" >
            </td>
            <td>
               <input type="text" list="liste-ref" id="list_ref`+ i + `" name="reference` + i + `"
                  class="form-control form-control-sm text-end" value="" onchange="selectRef(`+ i + `)" >
               <datalist id="liste-ref">

               </datalist>
            </td>
            <td>
               <input type="text" name="poste`+ i + `" class="form-control form-control-sm" value="">
            </td>
            <td>
               <input type="text" name="prixUnitaireHT`+ i + `" class="form-control form-control-sm text-end" value="0"
                   onchange="calculPrix(`+ i + `)" >
            </td>
            <td>
               <input type="text" name="pTotalHT`+ i + `" class="form-control form-control-sm text-end" value="" disabled
                  readonly>
            </td>
            <td>
               <input type="text" name="pTransportHT`+ i + `" class="form-control form-control-sm text-end" value="0"
                   onchange="calculPrix(`+ i + `)" >
            </td>
            <td>
               <input type="text" name="pRevientHT`+ i + `" class="form-control form-control-sm text-end fw-bold"
                  value="" disabled readonly>
            </td>
         </tr>
         <tr id="formFournisseur`+ newFournisseur + `"></tr>`;
   //div.innerHTML += addCode;
   document.getElementById('formFournisseur' + i).outerHTML = addCode;

   if (newFournisseur >= 3) {
      document.getElementById('btnFournisseurMinus').disabled = false;
   }
}

// suppression dernière ligne fournisseur
btnFournisseurMinus.addEventListener("click", function (event) {
   i = suppLigneForm(i, 'Fournisseur');
   calculTotalItem(i, "pRevientHT", "pTotauxFournisseurs");
})

// function suppLineFournisseur() {
//    var element = document.getElementById("form" + i);
//    while (element.firstChild) {
//       element.removeChild(element.firstChild);
//    }
//    i--;
//    if (i < 2) {
//       document.getElementById('btnFournisseurMinus').disabled = true;
//       document.getElementById('btnFournisseurPlus').disabled = false;
//    }
// }

// récupération de la liste des fournisseurs directement dans le fichier formFournitures
// (cette fonction n'est plus utilisé !)
function listeFournisseurs() {
   let liste = "";
   let element = document.getElementById("liste-fournisseurs").childNodes;
   for (let k = 1; k < element.length; k++) {
      liste = liste + "<option value='" + element[k].value + "'></option>";
      console.log(element[k]);
   }
   console.log(liste);
   return liste;
}

// selection de la référence et du fournisseur et tarif associés
function selectRef(j) {
   let input_value = document.getElementById("list_ref" + j).value;
   //console.log(input_value);
   if (input_value !== "") {
      //console.log(input_value);
      let selected_option = document.querySelector("option[value='" + input_value + "']");
      let datas = (selected_option.attributes[0].value).split("\|");
      // console.log(selected_option.attributes[0].value);
      // console.log(datas[0]);
      // console.log(datas[1]);
      document.getElementById("formulaire").elements["fournisseur" + j].value = datas[0];
      document.getElementById("formulaire").elements["prixUnitaireHT" + j].value = parseFloat(datas[1]);
   } else {
      document.getElementById("formulaire").elements["fournisseur" + j].value = "";
      document.getElementById("formulaire").elements["quantite" + j].value = "";
      document.getElementById("formulaire").elements["prixUnitaireHT" + j].value = 0;
      document.getElementById("formulaire").elements["pTotalHT" + j].value = 0;
      document.getElementById("formulaire").elements["pRevientHT" + j].value = "0.00 €";
      document.getElementById('btnFournisseurPlus').disabled = true;
      calculTotalItem(i, "pRevientHT", "pTotauxFournisseurs");
   }
}
// -----------------------------------
//
// -----------------------------------

