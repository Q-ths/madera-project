<?php $this->assign('title', 'Devis') ?>

<div class="row">
    <div class="col-md-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?=$this->Url->build('/', true)?>">Madera</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="<?=$this->Url->build('/devis', true)?>">Devis</a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="col-md-5 offset-md-2">
        <a href="<?=$this->Url->build('/devis/add', true)?>" type="button" class="btn btn-primary btn-lg btn-block">Créer un devis</a>
    </div>
</div>
<table class="bootstrapTable" data-search="true" data-pagination="true" data-row-style="striped">
    <thead>
    <tr>
        <th data-field="stargazers_count" data-sortable="true">Client</th>
        <th data-field="name" data-sortable="true" width="200">Projet</th>
        <th data-field="forks_count" data-sortable="true">Statut</th>
        <th data-field="description" data-sortable="true">Prix TTC</th>
        <th data-field="description" data-sortable="true">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($liste_devis as $devis){
            echo '<tr>';
            echo '    <td>' . $devis['client_prenom'] . ' ' . $devis['client_nom'] . '</td>';
            echo '    <td>' . $devis['projet_id'] . '</td>';
            echo '    <td>' . $devis['type_statut_id'] . '</td>';
            echo '    <td>' . $devis['prix_ttc'] . '</td>';
            echo '    <td>' . '</td>';
            echo '</tr>';
        }
    ?>
    </tbody>
</table>
