// suppression d'une ligne dans le formulaire (i = numéro de la ligne) 
// et retourne le nouveau numéro de la ligne
function suppLigneForm(i, nomBtn) {
   var element = document.getElementById("form" + nomBtn + i);
   while (element.firstChild) {
      element.removeChild(element.firstChild);
   }
   i--;
   if (i < 2) {
      document.getElementById('btn' + nomBtn + 'Minus').disabled = true;
      document.getElementById('btn' + nomBtn + 'Plus').disabled = false;
   }
   return i;
}