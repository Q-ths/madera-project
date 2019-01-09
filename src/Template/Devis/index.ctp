<div ng-controller="DevisModule">

    <div class="row title-page">
        <div class="col-11 col-sm-11 col-md-11 col-lg-11 col-xl-11 title">
            <h4>Listes des devis</h4>
        </div>
        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1 align-text-right">
            <button class="btn btn-info" id="to-devis-create" type="button"><i class="fa fa-plus"></i></button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <table class="table table-striped">
                <thead >
                <tr class="d-flex">
                    <th class="col-2" data-sortable="true">#</th>
                    <th class="col-3" data-sortable="true">Reference</th>
                    <th class="col-3" data-sortable="true">Projet</th>
                    <th class="col-2" data-sortable="true">Status</th>
                    <th class="col-2" data-sortable="true">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="d-flex" ng-repeat="item in devis" >
                    <td class="col-2">{{ $index +1 }}</td>
                    <td class="col-3">{{ item.reference }}</td>
                    <td class="col-3">{{ item.projet.nom }}</td>
                    <td class="col-2">{{ item.type_statut.libelle }}</td>
                    <td class="col-2">
                        <a href="/devis/edit?id={{item.id}}" ><i class="material-icons">edit</i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    angular.module('devis',[])
        .controller('DevisModule', ['$scope','$http', function ($scope,$http) {

            /* Event */
            $('#to-devis-create').click(function () {
                window.location.href = "/devis/create"
            });
            /**/

            $http.get('/devis/get').then(function ($response) {
                $scope.devis = $response.data;
            });
        }]);
    angular.bootstrap(document,['devis']);

</script>