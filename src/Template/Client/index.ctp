<div ng-controller="GammeController">

    <div class="row title-page">
        <div class="col-11 col-sm-11 col-md-11 col-lg-11 col-xl-11 title">
            <h4>Listes des clients</h4>
        </div>
        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 align-text-right">
            <button class="btn btn-info" id="to-client-create" type="button"><i class="fa fa-plus"></i></button>
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
                    <th class="col-2" data-sortable="true">Adresse</th>
                    <th class="col-1" data-sortable="true">Ville</th>
                    <th class="col-2" data-sortable="true">E-mail</th>
                    <th class="col-1" data-sortable="true">Téléphone</th>
                    <th class="col-1" data-sortable="true">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="d-flex" ng-repeat="item in clients" >
                    <td class="col-1">{{ $index +1 }}</td>
                    <td class="col-2">{{ item.nom }}</td>
                    <td class="col-2">{{ item.prenom }}</td>
                    <td class="col-2">{{ item.adresse_numero + ' ' + item.adresse }}</td>
                    <td class="col-1">{{ item.ville }}</td>
                    <td class="col-2">{{ item.email }}</td>
                    <td class="col-1">{{ item.telephone }}</td>
                    <td class="col-1">
                        <a href="/client/edit?id={{item.id}}" ><i class="material-icons">edit</i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    angular.module('client',[])
        .controller('GammeController', ['$scope','$http', function ($scope,$http) {

            /* Event */
            $('#to-client-create').click(function () {
                window.location.href = "/client/create"
            });
            /**/

            $scope.clients = [];

            $scope.id = null;

            $http.get('/client/get').then(function ($response) {
                $scope.clients = $response.data;
            });

        }]);
    angular.bootstrap(document,['client']);

</script>