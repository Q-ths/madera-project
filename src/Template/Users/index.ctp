<div ng-controller="UtilisateurController">

    <div class="row title-page">
        <div class="col-11 col-sm-11 col-md-11 col-lg-11 col-xl-11 title">
            <h4>Listes des utilisateurs</h4>
        </div>
        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 align-text-right">
            <button class="btn btn-info" id="to-utilisateurs-create" type="button"><i class="fa fa-plus"></i></button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <table class="table table-striped">
                <thead >
                <tr class="d-flex">
                    <th class="col-1" data-sortable="true">#</th>
                    <th class="col-2" data-sortable="true">Nom</th>
                    <th class="col-2" data-sortable="true">Prénom</th>
                    <th class="col-2" data-sortable="true">E-mail</th>
                    <th class="col-2" data-sortable="true">Date de création</th>
                    <th class="col-1" data-sortable="true">Désactivé</th>
                    <th class="col-2" data-sortable="true">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="d-flex" ng-repeat="item in users" >
                    <td class="col-1">{{ $index +1 }}</td>
                    <td class="col-2">{{ item.nom }}</td>
                    <td class="col-2">{{ item.prenom }}</td>
                    <td class="col-2">{{ item.email }}</td>
                    <td class="col-2" ng-bind="item.date_in | date:'MM/dd/yyyy' " >{{ item.date_in }}</td>

                    <td class="col-1" ng-if="item.date_out == null">
                        <i class="material-icons">close</i>
                    </td>
                    <td class="col-1" ng-if="item.date_out != null">
                        <i class="material-icons">check</i>
                    </td>

                    <td class="col-2">
                        <a href="/users/edit?id={{item.id}}" ><i class="material-icons">edit</i></a>
                        <a ng-if="item.date_out == null" href="" ng-click="confirmDelete(item.id)"><i class="material-icons">clear</i></a>
                        <a ng-if="item.date_out != null" href="" ng-click="confirmEnable(item.id)"><i class="material-icons">check</i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    angular.module('utilisateurs',[])
        .controller('UtilisateurController', ['$scope','$http', function ($scope,$http) {

            /* Event */
            $('#to-utilisateurs-create').click(function () {
                window.location.href = "/users/create"
            });
            /**/

            $scope.users = [];

            $scope.id = null;

            $http.get('/users/get').then(function ($response) {
                $scope.users = $response.data;
            });

        }]);
    angular.bootstrap(document,['utilisateurs']);

</script>