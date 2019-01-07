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
                <input type="text" class="form-control" ng-model="projet.nom" ng-class="(client != null) ? 'is-valid' : 'is-invalid' " placeholder="Libelle">
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label> Référence</label>
                <input type="text" class="form-control" ng-model="projet.reference" ng-class="(client != null) ? 'is-valid' : 'is-invalid' " placeholder="Référence">
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <div class="form-group">
                <label >Client</label>
                <select ng-options="(t.nom + ' ' + t.prenom) for t in clients" class="form-control" ng-class="(client != null) ? 'is-valid' : 'is-invalid' " ng-model="client"></select>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <button type="button" class="btn btn-primary btn-block" ng-click="addProjet()">Valider</button>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <a href="/projet" class="btn btn-danger btn-block">Annuler</a>
            </div>
    </div>

</div>
<script>
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    angular.module('projet', [])
        .controller('ProjetController', ['$scope','$http', function ($scope,$http) {
            $scope.clients = [];

            $scope.client = null;
            $scope.projet = null;

            $http.get('/projet/get').then(function ($response) {
                $scope.projets = $response.data;
            });

            $http.get('/client/get').then(function ($response) {
                $scope.clients = $response.data;
            });

            $scope.addProjet = function () {
                /* En-tête de la requête ASYNC */
                let header = new Headers({
                    "Content-Type": "application/json",
                    "Access-Control-Allow-Origin" : "*",
                    'X-CSRF-Token': csrfToken
                });

                $scope.projet.client_id = $scope.client.id;

                fetch('/projet/create', {headers:header, method:'post', body:JSON.stringify($scope.projet)})
                    .then(function ($response) {
                        $response.json().then(function ($data) {
                            window.location.href= "/projet";
                        })
                    })
            };

        }]);
    angular.bootstrap(document,['projet']);

</script>