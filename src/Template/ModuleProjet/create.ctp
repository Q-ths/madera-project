<div ng-controller="ComposantController">

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
            <h4>Ajout d'un module de projet</h4>
        </div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 align-text-right">
            <a class="btn btn-page-actions" href="/composant" ><i class="material-icons icons-page-actions">arrow_back</i></a>
            <a class="btn btn-page-actions" ng-click="add()" ><i class="material-icons icons-page-actions">save</i></a>
        </div>
    </div>

    <div class="container-page-content">
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
                    <label >Module éxistant(s)</label>
                    <select class="form-control" ng-model="module.id" ng-change="onChangeModuleExisting()">
                        <option value="{{item.id}}" ng-repeat="item in modules">{{ item.nom }}</option>
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

        <div class="row title-page">
            <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 title">
                <h5>Listes des composant</h5>
            </div>
            <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 align-text-right">
                <a class="btn btn-page-actions" data-toggle="modal" data-target="#modal-composant-add" ><i class="material-icons icons-page-actions">add</i></a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <table class="table" data-pagination="true" data-row-style="striped">
                    <thead class="thead-light">
                    <tr>
                        <th col="1" data-sortable="true">#</th>
                        <th col="2" data-sortable="true">Libelle</th>
                        <th col="2" data-sortable="true">Quantite</th>
                        <th col="2" data-sortable="true">Prix d'achat</th>
                        <th col="2" data-sortable="true">Marge</th>
                        <th col="2" data-sortable="true">Tva</th>
                        <th col="1" data-sortable="true">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr ng-repeat="item in module_composants track by (item.quantite + $index)">
                        <td col="1">{{ $index +1 }}</td>
                        <td col="2">{{ item.nom }}</td>
                        <td col="2">{{ item.quantite }}</td>
                        <td col="2">{{ item.prix_achat }}</td>
                        <td col="2">{{ item.pourcentage_marge }}</td>
                        <td col="2">{{ item.tva.pourcentage_tva }}</td>
                        <td col="1" class="align-center">
                            <a class="btn" ng-click="editComposant(item.id)"><i class="material-icons">edit</i></a>
                            <a class="btn" ng-click="deleteComposant(item.id)"><i class="material-icons">clear</i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
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
                    <div class="alert alert-danger alert-dismissible fade show" id="alert-missing-fields-modal" role="alert">
                        <h4 class="alert-heading">Erreur lors de la validation des données</h4>
                        <p>
                            Des champs sont manquants.
                        </p>
                    </div>
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

</div>
<script>
    angular.module('composant', [])
        .controller('ComposantController', ['$scope','$http', function ($scope,$http) {

            $(".alert").hide();

            $scope.modules = [];
            $scope.projets = [];
            $scope.composants = [];
            $scope.module_composants = [];

            $scope.composant = null;
            $scope.module = null;

            $http.get('/module/getEnable').then(function ($response) {
                $scope.modules = $response.data;
            });
            $http.get('/composant/getEnable').then(function ($response) {
                $scope.composants = $response.data;
            });
            $http.get('/projet/get').then(function ($response) {
                $scope.projets = $response.data;
            });

            /**/
            $scope.onChangeModuleExisting = function() {
                $http.get('/module/view/' + $scope.module.id).then(function ($response) {
                    $id = $scope.module.projet_id;
                    $scope.module = $response.data
                    $scope.module.projet_id = $id;
                    $scope.module_composants = $response.data.composant;

                    $scope.module_composants.forEach(function ($item) {
                        $item.quantite = $item._joinData.quantite;
                    });

                    $scope.module.id = $scope.module.id +""
                });
            }
            /**/

            $scope.addComposant = function () {
                if($scope.composant == null || $scope.composant.quantite == null) {
                    $('#alert-missing-fields-modal').show()

                    setTimeout(function () {
                        $('#alert-missing-fields-modal').hide();
                    },2000);
                    return;
                }
                $('#alert-missing-fields').hide();

                $scope.module_composants.push(Object.assign({},$scope.composant));
                $scope.composant = null;
                $scope.quantite = null;

                $('#modal-composant-add').modal('hide');
            };

            $scope.add = function () {
                let size = Object.keys($scope.module).length + $scope.module_composants.length;
                if(size < 4) {
                    $('#alert-missing-fields').show()

                    setTimeout(function () {
                        $('#alert-missing-fields').hide();
                    },2000);
                    return;
                }
                $('#alert-missing-fields').hide();
                $('#alert-info-saving').show();


                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                });

                let body = {
                    module : $scope.module,
                    module_composants : $scope.module_composants
                }

                fetch('/module-projet/create', {headers:header, method:'post', body:JSON.stringify(body)})
                    .then(function ($response) {
                        $response.json().then(function ($data) {
                            window.location.href= "/module-projet";
                        })
                    })
            }
        }]);
    angular.bootstrap(document,['composant']);
</script>