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
                    <input type="text" class="form-control" ng-class="(composant.nom != null) ? 'is-valid' : 'is-invalid' " ng-model="composant.nom" placeholder="Libelle *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label >Prix d'achat *</label>
                    <input type="text" class="form-control" ng-class="(composant.prix_achat != null) ? 'is-valid' : 'is-invalid' " ng-model="composant.prix_achat" placeholder="Prix d'achat *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label >Marge (%) *</label>
                    <input type="text" class="form-control" ng-class="(composant.pourcentage_marge != null) ? 'is-valid' : 'is-invalid' " ng-model="composant.pourcentage_marge" placeholder="Marge *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label >Famille de composant</label>
                    <select class="form-control" ng-model="composant.famille_composant_id">
                        <option value="{{item.id}}" ng-repeat="item in familleComposants">{{ item.nom }}</option>
                    </select>
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label >Fournisseur</label>
                    <select class="form-control" ng-model="composant.fournisseur_id">
                        <option value="{{item.id}}" ng-repeat="item in fournisseurs">{{ item.nom + ' ' + item.prenom}}</option>
                    </select>
                </div>
            </div>
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label >Tva</label>
                    <select class="form-control" ng-model="composant.tva_id">
                        <option value="{{item.id}}" ng-repeat="item in tvas">{{ item.nom }}</option>
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

            $scope.composant = {};
            $scope.familleComposants = [];
            $scope.fournisseurs = [];
            $scope.tvas = [];

            $http.get('/composant/view/' + window.location.search.split('id=')[1]).then(function ($response) {
                $scope.composant = $response.data;

                $scope.composant.famille_composant_id = $scope.composant.famille_composant_id + ""
                $scope.composant.tva_id = $scope.composant.tva_id + ""
                $scope.composant.fournisseur_id = $scope.composant.fournisseur_id + ""
            });

            $http.get('/famille-composant/getEnable').then(function ($response) {
                $scope.familleComposants = $response.data;
            });
            $http.get('/fournisseur/get').then(function ($response) {
                $scope.fournisseurs = $response.data;
            });
            $http.get('/tva/getEnable').then(function ($response) {
                $scope.tvas = $response.data;
            });

            $scope.add = function () {
                let size = Object.keys($scope.composant).length;
                if(size < 6) {
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
                fetch('/composant/edit/' + $scope.composant.id, {headers:header, method:'post', body:JSON.stringify($scope.composant)})
                    .then(function ($response) {
                        $('#alert-info-saving').hide();
                        window.location.href = '/composant';
                    });
            }
        }]);
    angular.bootstrap(document,['composant']);
</script>