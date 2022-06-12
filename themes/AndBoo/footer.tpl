</div>
        <footer class="demo-footer mdl-mini-footer">
          <div class="mdl-mini-footer--left-section">
            <ul class="mdl-mini-footer--link-list">
              <li><a href="<?=$fadress?>"><?=$fisim?></a></li>
            </ul>
          </div>
        </footer>
      </main>
    </div>
	
<!-- The modal -->
<div class="modal fade" id="SoruSor" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="modalLabel">Soru Sor</h4>
</div>
<div class="modal-body">
Şimdi Aşağıdaki formu doldurursan bana kuşlar aracılığı ile iletilcek ve daktilom sayesinde sitemde yayınlayacağım.<br/>
<form class="form-horizontal" method="post" action="<?=PATH?>/process.php?do=new">
<fieldset>

<div class="form-group">
  <label class="col-md-5 control-label" for="soru"></label>
   
    <textarea class="form-control" id="soru" name="soru"></textarea>
</div>

<div class="form-group">
  <label class="col-md-5 control-label" for="katagori">Tür</label>
 <div class="col-md-5">
    <select id="katagori" name="katagori" class="form-control">
      <option value="1">Soru</option>
      <option value="2">Öneri</option>
      <option value="3">İtiraf</option>
      <option value="4">Eleştiri</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-5 control-label" for="gonder"></label>
  <div class="col-md-5">
    <button id="gonder" name="gonder" class="btn btn-primary">Gönder</button>
  </div>
</div>

</fieldset>
</form>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
</div>
</div>
</div>
</div>

	
      </body>
</html>