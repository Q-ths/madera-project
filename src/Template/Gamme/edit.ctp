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
            <h4>Modification d'un composant</h4>
        </div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 align-text-right">
            <a class="btn btn-page-actions" href="/composant" ><i class="material-icons icons-page-actions">arrow_back</i></a>
            <a class="btn btn-page-actions" ng-click="add()" ><i class="material-icons icons-page-actions">save</i></a>
        </div>
    </div>

    <div class="container-page-content">
        <div class="row">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label >Libelle *</label>
                    <input type="text" class="form-control" ng-class="(gamme.nom != null) ? 'is-valid' : 'is-invalid' " ng-model="gamme.nom" placeholder="Libelle *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label >Finition</label>
                    <select class="form-control" ng-model="gamme.type_finition_id">
                        <option value="{{item.id}}" ng-repeat="item in finitions">{{ item.nom}}</option>
                    </select>
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label >Isolant</label>
                    <select class="form-control" ng-model="gamme.type_isolant_id">
                        <option value="{{item.id}}" ng-repeat="item in isolants">{{ item.nom }}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    angular.module('composant', [])
        .controller('ComposantController', ['$scope','$http', function ($scope,$http) {

            $(".alert").hide();

            $scope.gamme = null;
            $scope.finitions = [];
            $scope.isolants = [];

            $http.get('/type-finition/getEnable').then(function ($response) {
                $scope.finitions = $response.data;
            });
            $http.get('/type-isolant/getEnable').then(function ($response) {
                $scope.isolants = $response.data;
            });

            $http.get('/gamme/view/' + window.location.search.split('id=')[1]).then(function ($response) {
                $scope.gamme = $response.data;

                $scope.gamme.type_finition_id = $scope.gamme.type_finition_id + ""
                $scope.gamme.type_isolant_id = $scope.gamme.type_isolant_id + ""
            });

            $scope.add = function () {
                let size = Object.keys($scope.gamme).length;
                if(size < 3) {
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
                fetch('/gamme/edit/' + $scope.gamme.id, {headers:header, method:'post', body:JSON.stringify($scope.gamme)})
                    .then(function ($response) {
                        $('#alert-info-saving').hide();
                        window.location.href = '/gamme';
                    });
            }
        }]);
    angular.bootstrap(document,['composant']);
</script>