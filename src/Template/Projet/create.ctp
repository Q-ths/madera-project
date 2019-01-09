<div ng-controller="ProjetController">

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
            <h4>Ajout d'un projet</h4>
        </div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 align-text-right">
            <a class="btn btn-page-actions" href="/projet" ><i class="material-icons icons-page-actions">arrow_back</i></a>
            <a class="btn btn-page-actions" ng-click="add()" ><i class="material-icons icons-page-actions">save</i></a>
        </div>
    </div>

    <div class="container-page-content">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group">
                    <label> Libelle</label>
                    <input type="text" class="form-control" ng-model="projet.nom" ng-class="(projet.nom.length > 0) ? 'is-valid' : 'is-invalid' " placeholder="Libelle">
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label >Client</label>
                    <select ng-options="(t.nom + ' ' + t.prenom) for t in clients" ng-class="(client != null) ? 'is-valid' : 'is-invalid' " class="form-control" ng-change="onChangeClient()" ng-model="client"></select>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label >Utilisateur</label>
                    <select ng-options="(t.nom + ' ' + t.prenom) for t in users" class="form-control" ng-class="(user != null) ? 'is-valid' : 'is-invalid' " ng-change="onChangeUser()" ng-model="user"></select>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    angular.module('projet', [])
        .controller('ProjetController', ['$scope','$http', function ($scope,$http) {

            $(".alert").hide();

            $scope.clients = [];
            $scope.users = [];

            $scope.client = null;
            $scope.projet = null;
            $scope.user = null;

            $http.get('/client/get').then(function ($response) {
                $scope.clients = $response.data;
            });

            $http.get('/users/getEnable').then(function ($response) {
                $scope.users = $response.data;
            });

            $scope.onChangeUser = function() {
                $scope.projet.utilisateur_id = $scope.user.id;
            };

            $scope.onChangeClient = function() {
                $scope.projet.client_id = $scope.client.id;
            };

            $scope.add = function () {
                let size = Object.keys($scope.projet).length;
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

                fetch('/projet/create', {headers:header, method:'post', body:JSON.stringify($scope.projet)})
                    .then(function ($response) {
                        $('#alert-info-saving').hide();
                        window.location.href = '/projet';
                    });
            }
        }]);
    angular.bootstrap(document,['projet']);
</script>