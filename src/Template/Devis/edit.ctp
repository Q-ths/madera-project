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
            <h4>Modification d'un devis</h4>
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
                    <select ng-change="onChangeProject()" ng-options="t.id as t.nom for t in projets" class="form-control" ng-model="devis.projet_id"></select>
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
<!--            <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 align-text-right">
                <a class="btn btn-page-actions" data-toggle="modal" data-target="#modal-module-add" ><i class="material-icons icons-page-actions">add</i></a>
            </div>-->
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <table class="table" data-pagination="true" data-row-style="striped">
                    <thead class="thead-light">
                    <tr>
                        <th col="2" data-sortable="true">#</th>
                        <th col="3" data-sortable="true">Libelle</th>
                        <th col="3" data-sortable="true">Marge</th>
                        <th col="2" data-sortable="true">Désactivé</th>
                        <th col="2" data-sortable="true">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="item in devis.module_projet track by (item.id + $index)">
                        <td col="2">{{ $index +1 }}</td>
                        <td col="3">{{ item.nom }}</td>
                        <td col="3">{{ item.marge }}</td>
                        <td col="2" ng-if="item.date_out == null">
                            <i class="material-icons">close</i>
                        </td>
                        <td ccol="2" ng-if="item.date_out != null">
                            <i class="material-icons">check</i>
                        </td>
                        <td ccol="2">
                            <a href="" ng-click="onClickModuleEdit($index)"><i class="material-icons">edit</i></a>
                            <a href="" ng-if="item.date_out == null" ng-click="onClickModuleDelete($index)"><i class="material-icons">clear</i></a>
                            <a href="" ng-if="item.date_out != null" ng-click="onClickModuleEnable($index)"><i class="material-icons">check</i></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div>
        <div class="modal fade" id="modal-composant-edit" tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-composant-edit-label">Modifier un composant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label >Composants</label>
                                    <select ng-options="t.nom for t in composants track by t.id" class="form-control" ng-model="composant">

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
                    <button type="button" class="btn btn-secondary">Annuler</button>
                    <button type="button" class="btn btn-primary" ng-click="onClickConfirmEdit()()">Modifier</button>
                </div>
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
                                    <tr ng-repeat="item in module.module_composant_projet track by (item.quantite + $index)">
                                        <td col="1">{{ $index +1 }}</td>
                                        <td col="2">{{ item.nom }}</td>
                                        <td col="2">{{ item.prix_achat }}</td>
                                        <td col="2">{{ item.quantite }}</td>
                                        <td col="2">{{ item.pourcentage_marge }}</td>
                                        <td col="2">{{ item.tva }}</td>
                                        <td col="1" class="align-center">
                                            <a ng-click="onClickEditComposant($index)"><i class="material-icons">edit</i></a>
                                            <a ng-if="item.date_out == null" ng-click="onClickDeleteComposant($index)"><i class="material-icons">clear</i></a>
                                            <a ng-if="item.date_out != null" ng-click="onClickEnableComposant($index)"><i class="material-icons">check</i></a>
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

    <div>
        <div class="modal fade" id="modal-module-edit" role="dialog" aria-hidden="true">
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
                                        <tr ng-repeat="item in module.module_composant_projet track by (item.quantite + $index)">
                                            <td col="1">{{ $index +1 }}</td>
                                            <td col="2">{{ item.nom }}</td>
                                            <td col="2">{{ item.prix_achat }}</td>
                                            <td col="2">{{ item.quantite }}</td>
                                            <td col="2">{{ item.pourcentage_marge }}</td>
                                            <td col="2">{{ item.tva }}</td>
                                            <td col="1" class="align-center">
                                                <a ng-click="onClickEditComposant($index)"><i class="material-icons">edit</i></a>
                                                <a ng-if="item.date_out == null" ng-click="onClickDeleteComposant($index)"><i class="material-icons">clear</i></a>
                                                <a ng-if="item.date_out != null" ng-click="onClickEnableComposant($index)"><i class="material-icons">check</i></a>
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

            $http.get('/devis/view/' + window.location.search.split('id=')[1]).then(function ($response) {
                $scope.devis = $response.data;

                $scope.client = $scope.devis.client_prenom + $scope.devis.client_nom;
            });

            $scope.client = null;
            $scope.index = null;
            $scope.index_composant = null;

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
                $scope.composants.forEach(function ($item) {
                    /* Tva */
                    $item.tva = $item.tva.pourcentage_tva;

                    /* Quantite */
                    $item.quantite = 0;
                });
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

                $scope.module = $scope.devis.module_projet[$index];

                $('#modal-module-add').modal('show');
            };

            $scope.onClickModuleDelete = function($index) {
                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                });

                fetch('/module-projet/delete/' + $scope.devis.module_projet[$index].id , {headers:header, method:'post', body:JSON.stringify($scope.devis)})
                    .then(function ($response) {
                        $response.json().then(function ($data) {
                            $scope.devis.module_projet = $data;
                            $scope.$apply();
                        })
                    })
            }

            $scope.onClickModuleEnable = function($index) {
                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                });

                fetch('/module-projet/enable/' + $scope.devis.module_projet[$index].id , {headers:header, method:'post', body:JSON.stringify($scope.devis)})
                    .then(function ($response) {
                        $response.json().then(function ($data) {
                            $scope.devis.module_projet = $data;
                            $scope.$apply();
                        })
                    })
            };


            $scope.onClickComposant = function() {
                $('#modal-module-add').modal('hide');
            };

            $scope.onClickComposantAdd = function() {

                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                });

                $scope.composant.module_projet_id = $scope.devis.module_projet[$scope.index].id;

                fetch('/module-composant-projet/create', {headers:header, method:'post', body:JSON.stringify($scope.composant)})
                    .then(function ($response) {
                        $response.json().then(function ($data) {
                            $scope.module.module_composant_projet = $data;
                            $scope.$apply();

                            $('#modal-composant-add').modal('hide');
                            $('#modal-module-add').modal('show');
                        });
                    });
            };

            $scope.onClickEditComposant= function($index) {
                $('#modal-module-add').modal('hide');
                $('#modal-composant-edit').modal('show');
                $scope.index_composant = $index;
                $scope.composant = $scope.module.module_composant_projet[$index];

            };

            $scope.onClickConfirmEdit = function() {

                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                });

                fetch('/module-composant-projet/edit/' + $scope.module.module_composant_projet[$scope.index_composant].id , {headers:header, method:'post', body:JSON.stringify($scope.devis)})
                    .then(function ($response) {
                        $response.json().then(function ($data) {
                            $scope.module.module_composant_projet = $data;
                            $scope.$apply();
                        })
                    })
            }

            $scope.onClickDeleteComposant = function($index) {
                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                });

                fetch('/module-composant-projet/delete/' + $scope.module.module_composant_projet[$index].id , {headers:header, method:'post', body:JSON.stringify($scope.devis)})
                    .then(function ($response) {
                        $response.json().then(function ($data) {
                            $scope.module.module_composant_projet = $data;
                            $scope.$apply();
                        })
                    })
            }
            $scope.onClickEnableComposant = function($index) {
                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                });

                fetch('/module-composant-projet/enable/' + $scope.module.module_composant_projet[$index].id , {headers:header, method:'post', body:JSON.stringify($scope.devis)})
                    .then(function ($response) {
                        $response.json().then(function ($data) {
                            $scope.module.module_composant_projet = $data;
                            $scope.$apply();
                        })
                    })
            }

            /**/
            $scope.onChangeProject = function() {
                $scope.client = $scope.projet.client.nom + ' ' + $scope.projet.client.prenom;
                $scope.devis.projet_id = $scope.projet.id;
            };

            $scope.add = function () {

                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                });

                let devis = {projet_id : $scope.devis.projet_id, type_statut_id: $scope.devis.type_statut_id,};

                fetch('/devis/edit/' + $scope.devis.id, {headers:header, method:'post', body:JSON.stringify(devis)})
                    .then(function ($response) {
                        $response.json().then(function ($data) {
                            window.location.href= "/devis";
                        })
                    })
            }
        }]);
    angular.bootstrap(document,['devis']);
</script>