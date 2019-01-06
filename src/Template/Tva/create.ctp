<div ng-controller="TvasController">

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
            <h4>Ajout d'une TVA</h4>
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
                    <input type="text" class="form-control" ng-class="(tva.nom != null) ? 'is-valid' : 'is-invalid' " id="tva-name" ng-model="tva.nom" placeholder="Libelle *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label >Valeur *</label>
                    <input type="text" class="form-control" ng-class="(tva.pourcentage_tva != null) ? 'is-valid' : 'is-invalid' " id="tva-value" ng-model="tva.pourcentage_tva" placeholder="Valeur *">
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    angular.module('tva', [])
        .controller('TvasController', ['$scope','$http', function ($scope,$http) {

            $(".alert").hide();

            $scope.tva = {};


            $scope.add = function () {
                let size = Object.keys($scope.tva).length;
                if(size < 2) {
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
                fetch('/tva/create', {headers:header, method:'post', body:JSON.stringify($scope.tva)})
                    .then(function ($response) {
                        $('#alert-info-saving').hide();
                        window.location.href = '/tva';
                    });
            }
        }]);
    angular.bootstrap(document,['tva']);
</script>