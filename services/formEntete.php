<div class="row form-group mb-2 d-flex align-items-center">
   <div class="col-md-1">
      <label for="Client"><strong>Client</strong></label>
   </div>
   <div class="col-md-4">
      <input type="text" class="form-control" name="Client" value="<?= isset($datas) ? $datas['Client'] : "" ?>" placeholder="Nom du Client">
   </div>
   <div class="col-md-2">
   </div>
   <div class="col-md-1">
      <label for="Devis"><strong>Devis</strong></label>
   </div>
   <div class="col-md-4">
      <input type="text" class="form-control" name="Devis" value="<?= isset($datas) ? $datas['Devis'] : "" ?>" placeholder="Numéro du Devis">
   </div>
</div>
<div class="row form-group mb-2 d-flex align-items-center">
   <div class="col-md-1">
      <label for="Projet"><strong>Projet</strong></label>
   </div>
   <div class="col-md-11">
      <input type="text" class="form-control" name="Projet" value="<?= isset($datas) ? $datas['Projet'] : "" ?>" placeholder="Description du Projet">
   </div>
</div>


<div class="bg-secondary bg-gradient border border-dark border-2 text-center pt-1">
   <h3>COMPTE D'EXPLOITATION PREVISIONNEL</h3>
</div>
