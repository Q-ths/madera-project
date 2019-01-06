<div ng-controller="ModulesController">

    <div class="row title-page">
        <div class="col-11 col-sm-11 col-md-11 col-lg-11 col-xl-11 title">
            <h4>Listes des modules</h4>
        </div>
        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 align-text-right">
            <button class="btn btn-info" id="to-module-create" type="button"><i class="fa fa-plus"></i></button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <table class="table table-striped">
                <thead >
                <tr class="d-flex">
                    <th class="col-2" data-sortable="true">#</th>
                    <th class="col-2" data-sortable="true">Libelle</th>
                    <th class="col-2" data-sortable="true">Gamme</th>
                    <th class="col-2" data-sortable="true">Date de création</th>
                    <th class="col-2" data-sortable="true">Désactivé</th>
                    <th class="col-2" data-sortable="true">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="d-flex" ng-repeat="item in modules" >
                    <td class="col-2">{{ $index +1 }}</td>
                    <td class="col-2">{{ item.nom }}</td>
                    <td class="col-2">{{ item.gamme.nom }}</td>
                    <td class="col-2" ng-bind="item.date_in | date:'MM/dd/yyyy' " >{{ item.date_in }}</td>

                    <td class="col-2" ng-if="item.date_out == null">
                        <i class="material-icons">close</i>
                    </td>
                    <td class="col-2" ng-if="item.date_out != null">
                        <i class="material-icons">check</i>
                    </td>

                    <td class="col-2">
                        <a href="/module/edit?id={{item.id}}" ><i class="material-icons">edit</i></a>
                        <a ng-if="item.date_out == null" href="" ng-click="confirmDelete(item.id)"><i class="material-icons">clear</i></a>
                        <a ng-if="item.date_out != null" href="" ng-click="confirmEnable(item.id)"><i class="material-icons">check</i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

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
                    Etes-vous sûr de vouloir désactiver ce module?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-user">Annuler</button>
                    <button type="button" class="btn btn-primary" ng-click="deleteTva()">Désactiver</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-module-enable" tabindex="-1" role="dialog" aria-labelledby="modal-module-enable-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-module-enable-label">Activer un module</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Etes-vous sûr de vouloir d'activer ce module ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-user">Annuler</button>
                    <button type="button" class="btn btn-primary" ng-click="enableTva()">Activer</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    angular.module('module',[])
        .controller('ModulesController', ['$scope','$http', function ($scope,$http) {

            /* Event */
            $('#to-module-create').click(function () {
                window.location.href = "/module/create"
            });
            /**/

            $scope.modules = [];

            $scope.id = null;

            $http.get('/module/get').then(function ($response) {
                $scope.modules = $response.data;
            });

            $scope.confirmDelete = function($id) {
                $scope.id = $id;
                $('#modal-module-delete').modal();
            };

            $scope.confirmEnable = function($id) {
                $scope.id = $id;
                $('#modal-module-enable').modal();
            };


            $scope.deleteTva = function () {
                $('#modal-module-delete').modal('hide');
                $('#modal-progress').modal();

                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Origin" : "*",
                    'X-CSRF-Token': csrfToken
                });

                /* Exécution de la requête */
                fetch('/module/delete/' + $scope.id,{headers:header, method:'post'})
                    .then(function ($response) {
                        $('#modal-progress').modal('hide');
                        if($response.status == 200) {
                            $response.json().then(function (data) {
                                $scope.modules  = data;
                                $scope.$apply();
                            });
                        }
                    });
            };

            $scope.enableTva = function () {
                $('#modal-module-enable').modal('hide');
                $('#modal-progress').modal();

                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Origin" : "*",
                    'X-CSRF-Token': csrfToken
                });

                /* Exécution de la requête */
                fetch('/module/enable/' + $scope.id,{headers:header, method:'post'})
                    .then(function ($response) {
                        $('#modal-progress').modal('hide');
                        if($response.status == 200) {
                            $response.json().then(function (data) {
                                $scope.modules = data;
                                $scope.$apply();
                            });
                        }
                    });
            };

        }]);
    angular.bootstrap(document,['module']);

</script>