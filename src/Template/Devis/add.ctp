<?php $this->assign('title', 'Ajouter un devis');
$myTemplates = [
    'inputContainer' => '{{content}}',
];
$this->Form->templates($myTemplates);

echo $this->Form->create();
?>
<div class="row">
    <div class="col-md-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?=$this->Url->build('/', true)?>">Madera</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?=$this->Url->build('/devis', true)?>">Devis</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?=$this->Url->build('/devis/add', true)?>">Création</a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="col-md-4">
        <a href="<?=$this->Url->build('/devis', true)?>" type="button" class="btn btn-secondary btn-lg btn-block">Retour</a>
    </div>

    <div class="col-md-4">
        <a href="<?=$this->Url->build('/devis/add', true)?>" type="button" class="btn btn-primary btn-lg btn-block">Enregistrer</a>
    </div>
</div>

<!-- REFERENCES -->
<div class="row">
    <div class="col-md-12">
        <h5><b>Références</b></h5>
        <hr>
    </div>
</div>

<!-- Client -->
<div class="row">
    <div class="col-md-12">
        <h6><b>Client</b></h6>
    </div>
</div>

<div class="row">
    <?php
    echo $this->Form->label('client_id', 'Client', ['class' => 'col-md-2']);
    echo $this->Form->select('client_id', [1, 2, 3, 4, 5], [
        'empty' => '- Choix -',
        'class' => 'custom-select col-md-4',
    ]);

    echo $this->Form->label('projet_id', 'Projet', ['class' => 'col-md-2']);
    echo $this->Form->select('projet_id', [1, 2, 3, 4, 5], [
        'empty' => '- Choix -',
        'class' => 'custom-select col-md-4',
    ]);
    ?>
</div>

<!-- Montants -->
<div class="row">
    <div class="col-md-12">
        <h6><b>Montants</b></h6>
    </div>
</div>

<div class="row">
    <?php
    echo $this->Form->label('pourcentage_remise', 'Remise', ['class' => 'col-md-2']);
    ?>
    <div class="custom-input-group input-group col-md-4">
        <?php
        echo $this->Form->input('pourcentage_remise', [
            'type' => 'number',
            'step' => 0.01,
            'placeholder' => 'Remise',
            'label' => false,
            'class' => 'form-control',
        ]);
        ?>
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">%</span>
        </div>
    </div>

    <?php
    echo $this->Form->label('prix_total_ht', 'Remise', ['class' => 'col-md-2']);
    ?>
    <div class="custom-input-group input-group col-md-4">
        <?php
        echo $this->Form->input('prix_total_ht', [
            'type' => 'number',
            'step' => 0.01,
            'placeholder' => 'Montant HT',
            'label' => false,
            'class' => 'form-control',
        ]);
        ?>
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">€</span>
        </div>
    </div>
</div>

<div class="row">
   <?php
    echo $this->Form->label('tva', 'TVA', ['class' => 'col-md-2']);
    ?>
    <div class="custom-input-group input-group col-md-4">
        <?php
        echo $this->Form->input('tva', [
            'type' => 'number',
            'step' => 0.01,
            'placeholder' => 'TVA',
            'label' => false,
            'class' => 'form-control',
        ]);
        ?>
        <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">%</span>
        </div>
    </div>
</div>

<br>

<!-- MODULES -->
<div class="row">
    <div class="col-md-12">
        <h5><b>Modules</b></h5>
        <hr>
    </div>
</div>

<!-- Références -->
<div class="row">
    <div class="col-md-12">
        <h6><b>Références</b></h6>
    </div>
</div>

<div class="row">
    <?php
    echo $this->Form->label('projet-id', 'Nom', ['class' => 'col-md-2']);
    echo $this->Form->input('projet-id', [
        'label' => false,
        'class' => 'form-control col-md-4',
    ]);
//    <label class="col-md-2" for="client-id">Nom</label>
//    <select class="custom-select col-md-4" id="client-id"></select>

//    <label class="col-md-2" for="projet-id">Gamme</label>
//    <select class="custom-select col-md-4" id="projet-id"></select>
    ?>
</div>
<div class="row">
    <label class="col-md-2" for="projet-id">Module de gamme</label>
    <select class="custom-select col-md-4" id="projet-id"></select>
</div>

<!-- Module de gamme -->
<div class="row">
    <div class="col-md-12">
        <h6><b>Module de gamme</b></h6>
    </div>
</div>

<div class="row">
    <label class="col-md-2" for="client-id">Finition extérieure</label>
    <select class="custom-select col-md-4" id="client-id"></select>

    <label class="col-md-2" for="projet-id">Finition intérieure</label>
    <select class="custom-select col-md-4" id="projet-id"></select>
</div>
<div class="row">
    <label class="col-md-2" for="projet-id">Type de couverture</label>
    <select class="custom-select col-md-4" id="projet-id"></select>

    <label class="col-md-2" for="client-id">Type d'isolant</label>
    <select class="custom-select col-md-4" id="client-id"></select>
</div>
<div class="row">
    <label class="col-md-2" for="projet-id">Type de remplissage</label>
    <select class="custom-select col-md-4" id="projet-id"></select>

    <label class="col-md-2" for="projet-id">Coupe de principe</label>
    <select class="custom-select col-md-4" id="projet-id"></select>
</div>

<!-- Séction -->
<div class="row">
    <div class="col-md-12">
        <h6><b>Séction</b></h6>
    </div>
</div>

<div id="sections">
    <?=$this->Element('/Devis/section', [
        "delete" => false
    ]);?>
</div>

<button id="add-section" class="btn btn-primary"><i class="far fa-plus"></i></button>

<?= $this->Form->end(); ?>
