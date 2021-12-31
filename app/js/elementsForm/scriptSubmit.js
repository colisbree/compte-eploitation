const checkbox = document.getElementById('maCheckBoxValidation')

checkbox.addEventListener('change', (event) => {
   if (event.target.checked) {
      document.getElementById('btnValidation').disabled = false;
   } else {
      document.getElementById('btnValidation').disabled = true;
   }
})