<div ng-controller="ModuleController">

    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=$this->Url->build('/', true)?>">Madera</a></li>
                    <li class="breadcrumb-item" aria-current="page">Configuration</li>
                    <li class="breadcrumb-item" aria-current="page">Module</li>
                    <li class="breadcrumb-item" aria-current="page">Création</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-5 offset-md-2">
            <button type="button" class="btn btn-primary btn-lg btn-block" ng-click="createModule()" data-toggle="modal">Valider</button>
        </div>
    </div>

    <div class="row">
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label >Projet </label>
                <select class="form-control" ng-model="module.projet_id">
                    <option value="{{item.id}}" ng-repeat="item in projets">{{ item.nom }}</option>
                </select>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label >Libelle *</label>
                <input type="text" class="form-control" ng-model="module.nom" placeholder="Libelle *">
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label >Marge (%) *</label>
                <input type="text" class="form-control" ng-model="module.marge" placeholder="Marge (%) *">
            </div>
        </div>

    </div>
    <div class="row module-add-composant">
        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 offset-xl-11 text-xl-right">
            <button type="button" class="btn" data-toggle="modal" data-target="#modal-composant-add"><i class="fa fa-plus"></i></button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <table class="table" data-pagination="true" data-row-style="striped">
                <thead class="thead-light">
                <tr>
                    <th data-sortable="true">#</th>
                    <th data-sortable="true">Libelle</th>
                    <th data-sortable="true">Quantite</th>
                    <th data-sortable="true">Prix d'achat</th>
                    <th data-sortable="true">Marge</th>
                    <th data-sortable="true">Tva</th>
                    <th data-sortable="true">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="item in module.module_composant_projet track by (item.quantite + $index)">
                    <td>{{ $index +1 }}</td>
                    <td>{{ item.nom }}</td>
                    <td>{{ item.quantite }}</td>
                    <td>{{ item.prix_achat }}</td>
                    <td>{{ item.pourcentage_marge }}</td>
                    <td>{{ item.tva }}</td>
                    <td class="align-center">
                        <a class="btn" ng-click="editComposant($index)"><i class="fa fa-pencil-alt"></i></a>
                        <a class="btn" ng-click="deleteComposant(item.id,$index)"><i class="fa fa-trash-alt"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal-composant-add" tabindex="-1" role="dialog" aria-labelledby="modal-composant-create-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-composant-create-label">Créer un composant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label >Composants</label>
                                <select ng-options="t.nom for t in composants" class="form-control" ng-model="composant">

                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label>Quantite *</label>
                                <input type="text" class="form-control" placeholder="Quantite *" ng-model="composant.quantite">
                            </div>
                        </div>
                    </div>
                </div
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-user">Annuler</button>
                <button type="button" class="btn btn-primary" ng-click="addComposant()">Ajouter</button>
        </div>
    </div>

    <div class="modal fade" id="modal-composant-edit" aria-labelledby="modal-composant-edit-label" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-composant-edit-label">Créer un composant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label >Composants</label>
                                <select ng-options="t.nom for t in composants" class="form-control" ng-model="composant">

                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label>Quantite *</label>
                                <input type="text" class="form-control" placeholder="Quantite *" ng-model="composant.quantite">
                            </div>
                        </div>
                    </div>
                </div
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-composant-edit">Annuler</button>
                <button type="button" class="btn btn-primary" ng-click="confirmEdition()">Ajouter</button>
        </div>
    </div>
</div>

<script>
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    angular.module('module_add', [])
        .controller('ModuleController', ['$scope','$http', function ($scope,$http) {

            $scope.modules = [];
            $scope.projets = [];
            $scope.composants = [];
            $scope.module_composants = [];

            $scope.composant = null;
            $scope.module = null;

            $scope.current_composant_index = null;

            $http.get('/module-projet/view/' + window.location.search.split('id=')[1]).then(function ($response) {
                $scope.module = $response.data;
                $scope.module_composants = $response.data.composant;

                $scope.module_composants.forEach(function ($item) {
                    $item.quantite = $item._joinData.quantite;
                });


                $scope.module.projet_id = $scope.module.projet_id +""

            });

            $http.get('/module/get').then(function ($response) {
                $scope.modules = $response.data;
            });
            $http.get('/composant/get').then(function ($response) {
                $scope.composants = $response.data;
            });
            $http.get('/projet/get').then(function ($response) {
                $scope.projets = $response.data;
            });

            $scope.addComposant = function () {
                $scope.module_composants.push(Object.assign({},$scope.composant));
                $scope.composant = null;
            };

            $scope.editComposant = function($index) {
                $scope.composant = Object.assign({},$scope.module.module_composant_projet[$index]);
                $scope.current_composant_index = $index;
                $('#modal-composant-edit').modal('show');
            };

            $scope.confirmEdition = function() {
                $scope.composant.tva = $scope.composant.tva.pourcentage_tva;
                $scope.module.module_composant_projet[$scope.current_composant_index] = $scope.composant;
            };

            $scope.deleteComposant = function($id,$index) {
                let header = new Headers({
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Origin" : "*",
                    'X-CSRF-Token': csrfToken
                });

                fetch('/module-composant-projet/delete/' + $id, {headers:header, method:'post'})
                    .then(function ($response) {
                        delete $scope.module_composants[$index];
                    })
            }

            $scope.onChangeModuleExisting = function() {
                $http.get('/module/view/' + $scope.module.module.id).then(function ($response) {
                    $scope.module = $response.data;
                    $scope.module_composants = $response.data.composant;

                    $scope.module_composants.forEach(function ($item) {
                        $item.quantite = $item._joinData.quantite;
                    });

                    $scope.module.id = $scope.module.id +""
                });
            }

            $scope.createModule = function () {
                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Origin" : "*",
                    'X-CSRF-Token': csrfToken
                });

                let body = {
                    module : $scope.module,
                    module_composants : $scope.module_composants
                }

                fetch('/module-projet/create', {headers:header, method:'post', body:JSON.stringify(body)})
                    .then(function ($response) {
                        $response.json().then(function ($data) {
                            window.location.href= "/module";
                        })
                    })
            };


        }]);
    angular.bootstrap(document,['module_add']);

</script>