<div ng-controller="ModulesController">

    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=$this->Url->build('/', true)?>">Madera</a></li>
                    <li class="breadcrumb-item" aria-current="page">Configuration</li>
                    <li class="breadcrumb-item" aria-current="page">Module</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-5 offset-md-2">
            <a  class="btn btn-primary btn-lg btn-block" href="/module-projet/create">Créer un module</a>
        </div>
    </div>

    <table class="table" data-pagination="true" data-row-style="striped">
        <thead class="thead-light">
        <tr>
            <th data-sortable="true">#</th>
            <th data-sortable="true">Libelle</th>
            <th data-sortable="true">Projet</th>
            <th data-sortable="true">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="item in modules">
            <td>{{ $index +1 }}</td>
            <td>{{ item.nom }}</td>
            <td>{{ item.gamme.nom }}</td>
            <td class="align-center">
                <a class="btn" href="/module-projet/edit?id={{item.id}}"><i class="material-icons">edit</i></i></a>
                <a class="btn" ng-click="deleteModule(item.id)"><i class="material-icons">clear</i></a>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="modal fade" id="modal-module-delete" tabindex="-1" role="dialog" aria-labelledby="modal-module-delete-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-module-delete-label">Désactiver un module</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Etes-vous sûr de vouloir désactiver ce module ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-user">Annuler</button>
                    <button type="button" class="btn btn-primary" ng-click="confirmModule()">Désactiver</button>
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
    angular.module('module', [])
        .controller('ModulesController', ['$scope','$http', function ($scope,$http) {

            $scope.modules = [];


            $scope.id = null;

            $http.get('/module-projet/get').then(function ($response) {
                $scope.modules = $response.data;
            });


        }]);
    angular.bootstrap(document,['module']);

</script>