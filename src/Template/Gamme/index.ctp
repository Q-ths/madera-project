<div ng-controller="GammeController">

    <div class="row title-page">
        <div class="col-11 col-sm-11 col-md-11 col-lg-11 col-xl-11 title">
            <h4>Listes des gammes</h4>
        </div>
        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 align-text-right">
            <button class="btn btn-info" id="to-gamme-create" type="button"><i class="fa fa-plus"></i></button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <table class="table table-striped">
                <thead >
                <tr class="d-flex">
                    <th class="col-1" data-sortable="true">#</th>
                    <th class="col-2" data-sortable="true">Libelle</th>
                    <th class="col-2" data-sortable="true">Finition</th>
                    <th class="col-2" data-sortable="true">Isolant</th>
                    <th class="col-2" data-sortable="true">Date de création</th>
                    <th class="col-1" data-sortable="true">Désactivé</th>
                    <th class="col-2" data-sortable="true">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="d-flex" ng-repeat="item in gammes" >
                    <td class="col-1">{{ $index +1 }}</td>
                    <td class="col-2">{{ item.nom }}</td>
                    <td class="col-2">{{ item.type_finition.nom }}</td>
                    <td class="col-2">{{ item.type_isolant.nom }}</td>
                    <td class="col-2" ng-bind="item.date_in | date:'MM/dd/yyyy' " >{{ item.date_in }}</td>

                    <td class="col-1" ng-if="item.date_out == null">
                        <i class="material-icons">close</i>
                    </td>
                    <td class="col-1" ng-if="item.date_out != null">
                        <i class="material-icons">check</i>
                    </td>

                    <td class="col-2">
                        <a href="/gamme/edit?id={{item.id}}" ><i class="material-icons">edit</i></a>
                        <a ng-if="item.date_out == null" href="" ng-click="confirmDelete(item.id)"><i class="material-icons">clear</i></a>
                        <a ng-if="item.date_out != null" href="" ng-click="confirmEnable(item.id)"><i class="material-icons">check</i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal-gamme-delete" tabindex="-1" role="dialog" aria-labelledby="modal-gamme-delete-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-gamme-delete-label">Désactiver une gamme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Etes-vous sûr de vouloir désactiver cette gamme?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-user">Annuler</button>
                    <button type="button" class="btn btn-primary" ng-click="deleteTva()">Désactiver</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-gamme-enable" tabindex="-1" role="dialog" aria-labelledby="modal-gamme-enable-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-gamme-enable-label">Activer une gamme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Etes-vous sûr de vouloir d'activer cette gamme ?
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
    angular.module('gamme',[])
        .controller('GammeController', ['$scope','$http', function ($scope,$http) {

            /* Event */
            $('#to-gamme-create').click(function () {
                window.location.href = "/gamme/create"
            });
            /**/

            $scope.gammes = [];

            $scope.id = null;

            $http.get('/gamme/get').then(function ($response) {
                $scope.gammes = $response.data;
            });

            $scope.confirmDelete = function($id) {
                $scope.id = $id;
                $('#modal-gamme-delete').modal();
            };

            $scope.confirmEnable = function($id) {
                $scope.id = $id;
                $('#modal-gamme-enable').modal();
            };


            $scope.deleteTva = function () {
                $('#modal-gamme-delete').modal('hide');
                $('#modal-progress').modal();

                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Origin" : "*",
                    'X-CSRF-Token': csrfToken
                });

                /* Exécution de la requête */
                fetch('/gamme/delete/' + $scope.id,{headers:header, method:'post'})
                    .then(function ($response) {
                        $('#modal-progress').modal('hide');
                        if($response.status == 200) {
                            $response.json().then(function (data) {
                                $scope.gammes  = data;
                                $scope.$apply();
                            });
                        }
                    });
            };

            $scope.enableTva = function () {
                $('#modal-gamme-enable').modal('hide');
                $('#modal-progress').modal();

                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Origin" : "*",
                    'X-CSRF-Token': csrfToken
                });

                /* Exécution de la requête */
                fetch('/gamme/enable/' + $scope.id,{headers:header, method:'post'})
                    .then(function ($response) {
                        $('#modal-progress').modal('hide');
                        if($response.status == 200) {
                            $response.json().then(function (data) {
                                $scope.gammes = data;
                                $scope.$apply();
                            });
                        }
                    });
            };

        }]);
    angular.bootstrap(document,['gamme']);

</script>