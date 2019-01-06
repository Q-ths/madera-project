<div ng-controller="FamilleComposantController">

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
            <h4>Modification d'un isolant</h4>
        </div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 align-text-right">
            <a class="btn btn-page-actions" href="/tva" ><i class="material-icons icons-page-actions">arrow_back</i></a>
            <a class="btn btn-page-actions" ng-click="add()" ><i class="material-icons icons-page-actions">save</i></a>
        </div>
    </div>

    <div class="container-page-content">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label >Libelle *</label>
                    <input type="text" class="form-control" ng-class="(isolant.nom != null) ? 'is-valid' : 'is-invalid' " id="tva-name" ng-model="isolant.nom" placeholder="Libelle *">
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    angular.module('tva', [])
        .controller('FamilleComposantController', ['$scope','$http', function ($scope,$http) {

            $(".alert").hide();

            $scope.isolant = {};

            $http.get('/type-isolant/view/' + window.location.search.split('id=')[1]).then(function ($response) {
                $scope.isolant = $response.data;
            });

            $scope.add = function () {
                let size = Object.keys($scope.isolant).length;
                if(size < 1) {
                    $('#alert-missing-fields').show()

                    setTimeout(function () {
                        $('#alert-missing-fields').hide();
                    },2000);
                    return;
                }
                $('#alert-missing-fields').hide();
                $('#alert-info-saving').show();

                let header = new Headers({
                    "Content-Type": "application/json",
                });
                fetch('/type-isolant/edit/' + $scope.isolant.id, {headers:header, method:'post', body:JSON.stringify($scope.isolant)})
                    .then(function ($response) {
                        $('#alert-info-saving').hide();
                        window.location.href = '/type-isolant';
                    });
            }
        }]);
    angular.bootstrap(document,['tva']);
</script>