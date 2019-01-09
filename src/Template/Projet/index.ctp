<div ng-controller="TvasController">

    <div class="row title-page">
        <div class="col-11 col-sm-11 col-md-11 col-lg-11 col-xl-11 title">
            <h4>Listes des projets</h4>
        </div>
        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 align-text-right">
            <button class="btn btn-info" id="to-projet-create" type="button"><i class="fa fa-plus"></i></button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <table class="table table-striped">
                <tr>
                    <th data-sortable="true">#</th>
                    <th data-sortable="true">Libelle</th>
                    <th data-sortable="true">Client</th>
                    <th data-sortable="true">Responsable</th>
                    <th data-sortable="true">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="item in projets">
                    <td>{{ $index +1 }}</td>
                    <td>{{ item.nom }}</td>
                    <td>{{ item.client.nom + ' ' + item.client.prenom }}</td>
                    <td>{{ item.responsable.nom + ' ' + item.responsable.prenom }}</td>
                    <td class="align-center">
                        <a href="/projet/edit?id={{item.id}}" ><i class="material-icons">edit</i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal-projet-delete" tabindex="-1" role="dialog" aria-labelledby="modal-projet-delete-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-projet-delete-label">Désactiver une TVA</h5>
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

    <div class="modal fade" id="modal-projet-enable" tabindex="-1" role="dialog" aria-labelledby="modal-projet-enable-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-projet-enable-label">Activer une TVA</h5>
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
    angular.module('projet',[])
        .controller('TvasController', ['$scope','$http', function ($scope,$http) {

            /* Event */
            $('#to-projet-create').click(function () {
                window.location.href = "/projet/create"
            });
            /**/

            $scope.projets = [];
            $scope.id = null;

            $http.get('/projet/get').then(function ($response) {
                $scope.projets = $response.data;
            });

        }]);
    angular.bootstrap(document,['projet']);

</script>