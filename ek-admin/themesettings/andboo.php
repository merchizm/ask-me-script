<?php include "variables.php";?>
<form name="andbo_form" method="POST" action="./process.php?do=rew&type=andboo">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fisim">Footer Link Etiketi</label>
      <input type="text" class="form-control" name="fisim" id="fisim" value="<?php echo $andboo_fisim; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="fadress">Footer Link Adresi</label>
      <input type="text" class="form-control" name="fadress" id="fadress" value="<?php echo $andboo_fadress; ?>">
    </div>
  </div>
  <div class="form-row">
      <div class="form-group col-md-6">
          <label for="pp-h">Profil Resmi </label>
          <input type="text" class="form-control" name="pp" id="pp" value="<?php echo $andboo_pp; ?>">
      </div>
    <div class="form-group col-md-6">
      <div class="form-group">
        <button type="submit" style="margin-top: 25px;" class="btn btn-primary">Kaydet</button>
</form>