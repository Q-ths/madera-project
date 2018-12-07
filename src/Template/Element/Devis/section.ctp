<?php
/**
 * Created by PhpStorm.
 * User: Benoît
 * Date: 04/12/2018
 * Time: 11:52
 */
?>
<div class="row">
    <label class="col-md-1" for="client-id">Longeur</label>
    <div class="input-group col-md-3">
        <input type="number" step="0.01" class="form-control" placeholder="Longeur" aria-label="Longeur">
        <div class="input-group-append">
            <span class="input-group-text">m</span>
        </div>
    </div>

    <label class="col-md-1" for="projet-id">Angle</label>
    <select class="custom-select col-md-3" id="projet-id"></select>

    <?php
    if($delete){
        echo '<div class="col-md-1 text-center">';
        echo '    <button class="delete-section btn btn-primary"><i class="far fa-trash"></i></button>';
        echo '</div>';
    }
    ?>
</div>
