<div ng-controller="ProjetController">

    <div class="row">
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=$this->Url->build('/', true)?>">Madera</a></li>
                    <li class="breadcrumb-item" aria-current="page">Configuration</li>
                    <li class="breadcrumb-item" aria-current="page">Projet</li>
                    <li class="breadcrumb-item" aria-current="page">Création</li>
                </ol>
            </nav>
        </div>

    </div>

    <div class="row">
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label> Libelle</label>
                <input type="text" class="form-control" ng-model="projet.nom" placeholder="Libelle">
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label> Référence</label>
                <input type="text" class="form-control" ng-model="projet.reference" placeholder="Référence">
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label >Client</label>
                <select class="form-control"  ng-model="projet.client_id">
                    <option ng-repeat="item in clients" value="{{item.id}}"> {{item.nom + ' ' + item.prenom}}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <button type="button" class="btn btn-primary btn-block" ng-click="editProjet()">Valider</button>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <a href="/projet" class="btn btn-danger btn-block">Annuler</a>
            </div>
    </div>

</div>
<script>
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    angular.module('projet', ['ngRoute'])
        .controller('ProjetController', ['$scope','$http','$location', function ($scope,$http,$location) {
            $scope.clients = [];

            $scope.client = null;
            $scope.projet = null;

            $http.get('/projet/view/' + window.location.search.split('id=')[1]).then(function ($response) {
                $scope.projet = $response.data;
                $scope.projet.client_id = $scope.projet.client_id  + "";
            });

            $http.get('/client/get').then(function ($response) {
                $scope.clients = $response.data;
            });

            $scope.editProjet = function () {
                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Origin" : "*",
                    'X-CSRF-Token': csrfToken
                });

                fetch('/projet/edit/' + window.location.search.split('id=')[1], {headers:header, method:'post', body:JSON.stringify($scope.projet)})
                    .then(function ($response) {
                        $response.json().then(function ($data) {
                            window.location.href= "/projet";
                        })
                    })
            };

        }]);
    angular.bootstrap(document,['projet']);

</script>