<div ng-controller="ProjetController">

    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=$this->Url->build('/', true)?>">Madera</a></li>
                    <li class="breadcrumb-item" aria-current="page">Configuration</li>
                    <li class="breadcrumb-item" aria-current="page">Projet</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-5 offset-md-2">
            <a href="/projet/create" class="btn btn-primary btn-lg btn-block" >Créer un projet</a>
        </div>
    </div>

    <table class="table" data-pagination="true" data-row-style="striped">
        <thead class="thead-light">
        <tr>
            <th data-sortable="true">#</th>
            <th data-sortable="true">Libelle</th>
            <th data-sortable="true">Référence</th>
            <th data-sortable="true">Client</th>
            <th data-sortable="true">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="item in projets">
            <td>{{ $index +1 }}</td>
            <td>{{ item.nom }}</td>
            <td>{{ item.reference }}</td>
            <td>{{ item.client.nom + ' ' + item.client.prenom }}</td>
            <td class="align-center">
                <a class="btn" href="/projet/edit?id={{item.id}}" ><i class="fa fa-pencil-alt"></i></a>
                <a class="btn" ng-click="deleteProjet(item.id)"><i class="fa fa-trash-alt"></i></a>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="modal fade" id="modal-projet-delete" tabindex="-1" role="dialog" aria-labelledby="modal-projet-delete-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-projet-delete-label">Désactiver un projet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Etes-vous sûr de vouloir désactiver ce projet ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-user">Annuler</button>
                    <button type="button" class="btn btn-primary" ng-click="confirmDelete()">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-progress" tabindex="-1" role="dialog" aria-labelledby="modal-progress-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    En cours d'enregistrement...
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    angular.module('projet', [])
        .controller('ProjetController', ['$scope','$http', function ($scope,$http) {
            $scope.projets = [];
            $scope.id = null;

            $http.get('/projet/get').then(function ($response) {
                $scope.projets = $response.data;
            });

            $scope.deleteProjet = function($id) {
                $scope.id = $id;
                $('#modal-projet-delete').modal();
            };
            $scope.confirmDelete = function () {
                $('#modal-projet-delete').modal('hide');
                $('#modal-progress').modal();

                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Origin" : "*",
                    'X-CSRF-Token': csrfToken
                });

                /* Exécution de la requête */
                fetch('/projet/delete/' + $scope.id,{headers:header, method:'post'})
                    .then(function ($response) {
                        $('#modal-progress').modal('hide');
                        if($response.status == 200) {
                            $response.json().then(function (data) {
                                $scope.projets  = data;
                                $scope.$apply();
                            });
                            $('#alert-success-delete').removeClass('d-none');
                            $('#alert-error-delete').addClass('d-none');
                        } else {
                            $('#alert-error-delete').removeClass('d-none');
                        }
                    });
            };

        }]);
    angular.bootstrap(document,['projet']);

</script>