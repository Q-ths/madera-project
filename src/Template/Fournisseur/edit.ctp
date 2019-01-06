<div ng-controller="FournisseurController">

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
            <h4>Modification d'un fournisseur</h4>
        </div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 align-text-right">
            <a class="btn btn-page-actions" href="/fournisseur" ><i class="material-icons icons-page-actions">arrow_back</i></a>
            <a class="btn btn-page-actions" ng-click="add()" ><i class="material-icons icons-page-actions">save</i></a>
        </div>
    </div>

    <div class="container-page-content">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label >Nom *</label>
                    <input type="text" class="form-control" ng-class="(fournisseur.nom != null) ? 'is-valid' : 'is-invalid' " ng-model="fournisseur.nom" placeholder="Nom *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label >Prénom *</label>
                    <input type="text" class="form-control" ng-class="(fournisseur.prenom != null) ? 'is-valid' : 'is-invalid' " ng-model="fournisseur.prenom" placeholder="Prénom *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label >N° d'adresse *</label>
                    <input type="text" class="form-control" ng-class="(fournisseur.adresse_numero != null) ? 'is-valid' : 'is-invalid' " ng-model="fournisseur.adresse_numero" placeholder="N° d'adresse *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label >Adresse *</label>
                    <input type="text" class="form-control" ng-class="(fournisseur.adresse != null) ? 'is-valid' : 'is-invalid' " ng-model="fournisseur.adresse" placeholder="Adresse *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label >Ville *</label>
                    <input type="text" class="form-control" ng-class="(fournisseur.ville != null) ? 'is-valid' : 'is-invalid' " ng-model="fournisseur.ville" placeholder="Ville *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label >Code postal *</label>
                    <input type="text" class="form-control" ng-class="(fournisseur.code_postal != null) ? 'is-valid' : 'is-invalid' " ng-model="fournisseur.code_postal" placeholder="Code postal *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label >E-mail *</label>
                    <input type="text" class="form-control" ng-class="(fournisseur.email != null) ? 'is-valid' : 'is-invalid' " ng-model="fournisseur.email" placeholder="E-mail *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label >N° de téléphone *</label>
                    <input type="text" class="form-control" ng-class="(fournisseur.telephone != null) ? 'is-valid' : 'is-invalid' " ng-model="fournisseur.telephone" placeholder="N° de téléphone *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    angular.module('fournisseur', [])
        .controller('FournisseurController', ['$scope','$http', function ($scope,$http) {

            $(".alert").hide();

            $scope.fournisseur = null;

            $http.get('/fournisseur/view/' + window.location.search.split('id=')[1]).then(function ($response) {
                $scope.fournisseur = $response.data;
            });

            $scope.add = function () {
                let size = Object.keys($scope.fournisseur).length;
                if(size < 8) {
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
                fetch('/fournisseur/edit/' + $scope.fournisseur.id, {headers:header, method:'post', body:JSON.stringify($scope.fournisseur)})
                    .then(function ($response) {
                        $('#alert-info-saving').hide();
                        window.location.href = '/fournisseur';
                    });
            }
        }]);
    angular.bootstrap(document,['fournisseur']);
</script>