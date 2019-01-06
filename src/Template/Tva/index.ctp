<div ng-controller="TvasController">

    <div class="row title-page">
        <div class="col-11 col-sm-11 col-md-11 col-lg-11 col-xl-11 title">
            <h4>Listes des TVAS</h4>
        </div>
        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 align-text-right">
            <button class="btn btn-info" id="to-tva-create" type="button"><i class="fa fa-plus"></i></button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <table class="table table-striped">
                <thead >
                <tr class="d-flex">
                    <th class="col-2" data-sortable="true">#</th>
                    <th class="col-2" data-sortable="true">Libelle</th>
                    <th class="col-2" data-sortable="true">Pourcentage</th>
                    <th class="col-2" data-sortable="true">Date de création</th>
                    <th class="col-2" data-sortable="true">Désactivé</th>
                    <th class="col-2" data-sortable="true">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="d-flex" ng-repeat="item in tvas" >
                    <td class="col-2">{{ $index +1 }}</td>
                    <td class="col-2">{{ item.nom }}</td>
                    <td class="col-2">{{ item.pourcentage_tva }}</td>
                    <td class="col-2" ng-bind="item.date_in | date:'MM/dd/yyyy' " >{{ item.date_in }}</td>
                    <td class="col-2" ng-if="item.date_out == null">
                        <i class="material-icons">close</i>
                    </td>
                    <td class="col-2" ng-if="item.date_out != null">
                        <i class="material-icons">check</i>
                    </td>
                    <td class="col-2">
                        <a href="/tva/edit?id={{item.id}}" ><i class="material-icons">edit</i></a>
                        <a ng-if="item.date_out == null" href="" ng-click="confirmDelete(item.id)"><i class="material-icons">clear</i></a>
                        <a ng-if="item.date_out != null" href="" ng-click="confirmEnable(item.id)"><i class="material-icons">check</i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal-tva-delete" tabindex="-1" role="dialog" aria-labelledby="modal-tva-delete-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-tva-delete-label">Désactiver une TVA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Etes-vous sûr de vouloir désactiver cet TVA ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-user">Annuler</button>
                    <button type="button" class="btn btn-primary" ng-click="deleteTva()">Désactiver</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-tva-enable" tabindex="-1" role="dialog" aria-labelledby="modal-tva-enable-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-tva-enable-label">Activer une TVA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Etes-vous sûr de vouloir d'activer cet TVA ?
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
    angular.module('tva',[])
        .controller('TvasController', ['$scope','$http', function ($scope,$http) {

            /* Event */
            $('#to-tva-create').click(function () {
                window.location.href = "/tva/create"
            });
            /**/

            $scope.tvas = [];
            $scope.tva = null;

            $scope.id = null;

            $http.get('/tva/get').then(function ($response) {
                $scope.tvas = $response.data;
            });

            $scope.confirmDelete = function($id) {
                $scope.id = $id;
                $('#modal-tva-delete').modal();
            };

            $scope.confirmEnable = function($id) {
                $scope.id = $id;
                $('#modal-tva-enable').modal();
            };


            $scope.deleteTva = function () {
                $('#modal-tva-delete').modal('hide');
                $('#modal-progress').modal();

                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Origin" : "*",
                    'X-CSRF-Token': csrfToken
                });

                /* Exécution de la requête */
                fetch('/tva/delete/' + $scope.id,{headers:header, method:'post'})
                    .then(function ($response) {
                        $('#modal-progress').modal('hide');
                        if($response.status == 200) {
                            $response.json().then(function (data) {
                                $scope.tvas  = data;
                                $scope.$apply();
                            });
                        }
                    });
            };

            $scope.enableTva = function () {
                $('#modal-tva-enable').modal('hide');
                $('#modal-progress').modal();

                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Origin" : "*",
                    'X-CSRF-Token': csrfToken
                });

                /* Exécution de la requête */
                fetch('/tva/enable/' + $scope.id,{headers:header, method:'post'})
                    .then(function ($response) {
                        $('#modal-progress').modal('hide');
                        if($response.status == 200) {
                            $response.json().then(function (data) {
                                $scope.tvas  = data;
                                $scope.$apply();
                            });
                        }
                    });
            };

        }]);
    angular.bootstrap(document,['tva']);

</script>