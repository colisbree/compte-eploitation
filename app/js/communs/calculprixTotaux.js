// calcul post soumission du formulaire
calculTotalItem(i, "pRevientHT", "pTotauxFournisseurs");
calculTotalItem(be, "pTotalHTBeton", "pTotalBeton");
calculTotalItem(mo, "pTotalHTMo", "pTotalMo");
calculTotalItem(st, "pTotalHTSt", "pTotalSt");

// calcul avant soumission du formulaire
function calculTotalItem(i, nomItem, nomTotal) {
   let cumul = 0;
   let prixItem = 0;
   for (let a = 1; a <= i; a++) {
      let separation = (document.getElementById("formulaire").elements[nomItem + a].value);
      if (separation) {
         separation = separation.replace(/\s+/g, ""); // suppression des espaces
         separation = separation.slice(0, separation.length - 1); // suppression du symbole €
         separation = separation.replace(",", ".");
         prixItem = parseFloat(separation);
         cumul = cumul + prixItem;
      }
   }
   document.getElementById(nomTotal).innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(cumul * 100) / 100).toFixed(2));

   //affichage du prix total final des achats (item avant total, item après total)
   calculTotalFinalAchats();

}

function calculTotalFinalAchats() {
   let nomsItems = ["pTotauxFournisseurs", "pTotalBeton", "pTotalMo", "pTotalSt", "pTotalEvac", "pTotalEngin", "pTotalLocation"];
   let prixTotalAchat = 0;

   nomsItems.forEach(item => {
      let separation = document.getElementById(item).innerHTML;
      if (separation !== "") {
         separation = separation.replace(/\s+/g, ""); // suppression des espaces
         separation = separation.slice(0, separation.length - 1); // suppression du symbole €
         separation = separation.replace(",", ".");
         prixTotalAchat += parseFloat(separation);
      }
   })

   document.getElementById("pTotalAchat").innerHTML = new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' }).format((Math.round(prixTotalAchat * 100) / 100).toFixed(2));
}