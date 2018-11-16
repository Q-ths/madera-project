<?php $this->assign('title', 'Devis') ?>

<div class="row">
    <div class="col-md-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=$this->Url->build('/', true)?>">Madera</a></li>
                <li class="breadcrumb-item active" aria-current="page">Devis</li>
            </ol>
        </nav>
    </div>

    <div class="col-md-5 offset-md-2">
        <button type="button" class="btn btn-primary btn-lg btn-block">Créer un devis</button>
    </div>
</div>

<table class="bootstrapTable" data-search="true" data-pagination="true" data-row-style="striped">
    <thead>
    <tr>
        <th data-field="stargazers_count" data-sortable="true">Stars</th>
        <th data-field="name" data-sortable="true" width="200">Name</th>
        <th data-field="forks_count" data-sortable="true">Forks</th>
        <th data-field="description" data-sortable="true">Description</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>abc</td>
            <td>def</td>
            <td>ghi</td>
            <td>jkl</td>
        </tr>
        <tr>
            <td>hello</td>
            <td>def</td>
            <td>ghi</td>
            <td>jkzl</td>
        </tr>
    </tbody>
</table>
