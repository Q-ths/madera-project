<div ng-controller="DevisController">

    <div class="alert alert-danger alert-dismissible fade show" id="alert-missing-fields" role="alert">
        <h4 class="alert-heading">Erreur lors de la validation des données</h4>
        <p>
            Des champs sont manquants.
        </p>
    </div>

    <div class="alert alert-info alert-dismissible fade show" id="alert-info-saving" role="alert">
        <h4 class="alert-heading">Enregistrement des données</h4>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>
    </div>


    <div class="row title-page">
        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 title">
            <h4>Ajout d'un devis</h4>
        </div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 align-text-right">
            <a class="btn btn-page-actions" href="/devis" ><i class="material-icons icons-page-actions">arrow_back</i></a>
            <a class="btn btn-page-actions" ng-click="add()" ><i class="material-icons icons-page-actions">save</i></a>
        </div>
    </div>

    <div class="container-page-content">
        <div class="row">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label >Projet </label>
                    <select ng-change="onChangeProject()" ng-options="t.nom for t in projets" class="form-control" ng-model="projet"></select>
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label >Client *</label>
                    <input type="text" class="form-control" ng-model="client" disabled="disabled">
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label >État</label>
                    <select ng-options="t.id as t.libelle for t in etats" class="form-control" ng-model="devis.type_statut_id"></select>
                </div>
            </div>

        </div>

        <div class="row title-page">
            <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 title">
                <h5>Listes des modules</h5>
            </div>
            <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 align-text-right">
                <a class="btn btn-page-actions" data-toggle="modal" data-target="#modal-module-add" ><i class="material-icons icons-page-actions">add</i></a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <table class="table" data-pagination="true" data-row-style="striped">
                    <thead class="thead-light">
                    <tr>
                        <th col="1" data-sortable="true">#</th>
                        <th col="2" data-sortable="true">Libelle</th>
                        <th col="2" data-sortable="true">Marge</th>
                        <th col="1" data-sortable="true">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="item in devis.module track by (item.id + $index)">
                        <td col="1">{{ $index +1 }}</td>
                        <td col="2">{{ item.nom }}</td>
                        <td col="2">{{ item.marge }}</td>
                        <td col="1" class="align-center">
                            <a class="btn" ng-click="onClickModuleEdit($index)"><i class="material-icons">edit</i></a>
                            <a class="btn" ng-click="onClickModuleDelete($index)"><i class="material-icons">clear</i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div>
        <div class="modal fade" id="modal-composant-add" tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-composant-create-label">Ajouter un composant</h5>
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
                    <button type="button" class="btn btn-secondary" >Annuler</button>
                    <button type="button" class="btn btn-primary" ng-click="onClickComposantAdd()()">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="modal fade" id="modal-module-add" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="modal-composant-create-label">Ajouter un module</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label >Gamme *</label>
                                    <select ng-options="t.id as t.nom for t in gammes" class="form-control" ng-model="gamme" ng-change="onChangeGamme()"></select>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label >Module *</label>
                                    <select ng-options="t.nom for t in modules" class="form-control" ng-model="module" ng-change="onChangeModule()"></select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label >Nom du module *</label>
                                    <input type="text" class="form-control" ng-model="module.nom" >
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label >Marge du module *</label>
                                    <input type="text" class="form-control" ng-model="module.marge" >
                                </div>
                            </div>
                        </div>

                        <div class="row title-page">
                            <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 title">
                                <h5>Listes des composants</h5>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 align-text-right">
                                <a class="btn btn-page-actions" data-toggle="modal" data-target="#modal-composant-add" ><i class="material-icons icons-page-actions" ng-click="onClickComposant()">add</i></a>
                            </div>
                        </div>
;
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <table class="table table-sm" data-pagination="true" data-row-style="striped">
                                    <thead class="thead-light">
                                    <tr>
                                        <th col="1" data-sortable="true">#</th>
                                        <th col="2" data-sortable="true">Libelle</th>
                                        <th col="2" data-sortable="true">Prix d'achat</th>
                                        <th col="2" data-sortable="true">Quantite</th>
                                        <th col="2" data-sortable="true">Marge</th>
                                        <th col="2" data-sortable="true">TVA</th>
                                        <th col="1" data-sortable="true">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="item in module_composants track by (item.quantite + $index)">
                                            <td col="1">{{ $index +1 }}</td>
                                            <td col="2">{{ item.nom }}</td>
                                            <td col="2">{{ item.prix_achat }}</td>
                                            <td col="2">{{ item.quantite }}</td>
                                            <td col="2">{{ item.pourcentage_marge }}</td>
                                            <td col="2">{{ item.tva }}</td>
                                            <td col="1" class="align-center">
                                                <a class="btn" ng-click="editComposant($id)"><i class="material-icons">edit</i></a>
                                                <a class="btn" ng-click="deleteComposant($id)"><i class="material-icons">clear</i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" >Annuler</button>
                    <button type="button" class="btn btn-primary" ng-click="onClickModuleAdd()" >Ajouter</button>
                </div>
            </div>
        </div>
    </div>


</div>
<script>
    angular.module('devis', [])
        .controller('DevisController', ['$scope','$http', function ($scope,$http) {

            $(".alert").hide();

            $scope.projets = [];
            $scope.etats = [];
            $scope.modules_devis = [];

            /* Modal */
            $scope.gamme;
            $scope.module;

            $scope.modules;
            $scope.composants;

            $scope.projet;
            $scope.devis = {
                module : [],
            };
            $scope.client = null;
            $scope.index = null;

            $http.get('/projet/get').then(function ($response) {
                $scope.projets = $response.data;
            });
            $http.get('/type-statut/get').then(function ($response) {
                $scope.etats = $response.data;
            });

            /**/
            $http.get('/gamme/getEnable').then(function ($response) {
                $scope.gammes = $response.data;
            });
            $http.get('/composant/getEnable').then(function ($response) {
                $scope.composants = $response.data;
            });

            $scope.onChangeGamme = function() {
                $http.get('/gamme/view/' + $scope.gamme).then(function ($response) {
                    $scope.modules = $response.data.module;
                });
            };
            $scope.onChangeModule = function() {
                $http.get('/module/view/' + $scope.module.id).then(function ($response) {
                    $scope.module_composants = $response.data.composant;

                    $scope.module_composants.forEach(function ($item) {
                        /* Tva */
                        $item.tva = $item.tva.pourcentage_tva;

                        /* Quantite */
                        $item.quantite = $item._joinData.quantite;
                    });
                });
            };

            $scope.onClickComposant = function() {
                $('#modal-module-add').modal('hide');
            };
            
            $scope.onClickComposantAdd = function() {
                $scope.composant.tva = $scope.composant.tva.pourcentage_tva;

                $scope.module_composants.push(Object.assign({},$scope.composant));

                $('#modal-composant-add').modal('hide');
                $('#modal-module-add').modal('show');
            };

            $scope.onClickModuleAdd = function() {

                $scope.module.composants = $scope.module_composants;

                if($scope.index != null)
                    $scope.devis.module[$scope.index] = Object.assign({},$scope.module)
                else
                    $scope.devis.module.push(Object.assign({},$scope.module));

                $scope.module = null;
                $scope.module_composants = null;
            };

            $scope.onClickModuleEdit = function($index) {
                $scope.index = $index;

                $scope.module = $scope.devis.module[$index];
                $scope.module_composants = $scope.module.composants;

                $('#modal-module-add').modal('show');
            };

            $scope.onClickModuleDelete = function($index) {
                $scope.devis.module.splice($index,1);
            }

            /**/
            $scope.onChangeProject = function() {
                $scope.client = $scope.projet.client.nom + ' ' + $scope.projet.client.prenom;
                $scope.devis.projet_id = $scope.projet.id;
            };
            /**/

            $scope.addComposant = function () {

                $scope.modules_devis.push(Object.assign({},$scope.module));
                $scope.module = null;

                $('#modal-composant-add').modal('hide');
            };

            $scope.add = function () {

                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                });

                $scope.devis.client = $scope.projet.client;

                fetch('/devis/create', {headers:header, method:'post', body:JSON.stringify($scope.devis)})
                    .then(function ($response) {
                        $response.json().then(function ($data) {
                            window.location.href= "/devis";
                        })
                    })
            }
        }]);
    angular.bootstrap(document,['devis']);
</script>