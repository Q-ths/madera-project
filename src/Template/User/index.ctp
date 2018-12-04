<div ng-controller="UsersView">
    <table class="table" data-pagination="true" data-row-style="striped">
        <thead class="thead-light">
        <tr>
            <th data-sortable="true">#</th>
            <th data-sortable="true">Nom</th>
            <th data-sortable="true">Prenom</th>
            <th data-sortable="true">E-mail</th>
            <th data-sortable="true">Poste</th>
            <th data-sortable="true">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($user as $key => $item): ?>
            <tr>
                <td><?= $key+1 ?></td>
                <td><?= $item['nom'] ?></td>
                <td><?= $item['prenom'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['poste'] ?></td>
                <td class="align-center">
                    <a class="btn" ng-click="delete()"><i class="fa fa-pencil-alt"></i></a>
                    <a class="btn"><i class="fa fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<template>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</template>

<script>
    var delete = function() {
        console.log('test')
    }
</script>