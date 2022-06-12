<?php include "variables.php";?>
<form name="hollad_form" method="POST" action="./process.php?do=rew&type=holladroid">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="fisim">Footer Link Etiketi</label>
            <input type="text" class="form-control" name="fisim" id="fisim" value="<?php echo $holladroid_fisim; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="fadress">Footer Link Adresi</label>
            <input type="text" class="form-control" name="fadress" id="fadress" value="<?php echo $holladroid_fadress; ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="facebooklnk-h">Facebook Link</label>
            <input type="text" class="form-control" name="facebooklnk" id="facebooklnk" value="<?php echo $holladroid_facebooklnk; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="twitterlnk-h">Twitter Link</label>
            <input type="text" class="form-control" name="twitterlnk" id="twitterlnk" value="<?php echo $holladroid_twitterlnk; ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="bgimg-h">Profil Resmi Arkaplanı</label>
            <input type="text" class="form-control" name="bgimg" id="bgimg" value="<?php echo $holladroid_bgimg; ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="bio-h">Bio</label>
            <input type="text" class="form-control" name="bio" id="bio" value="<?php echo $holladroid_bio; ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="pp-h">Profil Resmi </label>
            <input type="text" class="form-control" name="pp" id="pp" value="<?php echo $holladroid_pp; ?>">
        </div>
        <div class="form-group col-md-6">
            <div class="form-group">
                <button type="submit" style="margin-top: 25px;" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
    </div>

</form>