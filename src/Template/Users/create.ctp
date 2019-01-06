<div ng-controller="UtilisateurController">

    <div class="alert alert-danger alert-dismissible fade show" id="alert-missing-fields" role="alert">
        <h6 class="alert-heading">Erreur lors de la validation des données</h6>
        <p>
            Des champs sont manquants.
        </p>
    </div>

    <div class="alert alert-info alert-dismissible fade show" id="alert-info-saving" role="alert">
        <h6 class="alert-heading">Enregistrement des données</h6>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>
    </div>

    <div class="row title-page">
        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-10 title">
            <h6>Modification d'un utilisateur</h6>
        </div>
        <div class="col-2 col-sm-2 col-md-2 col-lg-2 col-xl-2 align-text-right">
            <a class="btn btn-page-actions" href="/users" ><i class="material-icons icons-page-actions">arrow_back</i></a>
            <a class="btn btn-page-actions" ng-click="add()" ><i class="material-icons icons-page-actions">save</i></a>
        </div>
    </div>

    <div class="container-page-content">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label >Nom *</label>
                    <input type="text" class="form-control" ng-class="(user.nom != null) ? 'is-valid' : 'is-invalid' " ng-model="user.nom" placeholder="Nom *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label >Prénom *</label>
                    <input type="text" class="form-control" ng-class="(user.prenom != null) ? 'is-valid' : 'is-invalid' " ng-model="user.prenom" placeholder="Prénom *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label >E-mail *</label>
                    <input type="text" class="form-control" ng-class="(user.email != null) ? 'is-valid' : 'is-invalid' " ng-model="user.email" placeholder="E-mail *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <div class="form-group">
                    <label >Mot de passe *</label>
                    <input type="password" class="form-control" ng-class="(user.password != null) ? 'is-valid' : 'is-invalid' " ng-model="user.password" placeholder="Mot de passe *">
                </div>
                <div class="invalid-feedback">
                    Please provide a valid city.
                </div>
            </div>
            
        </div>
    </div>

</div>
<script>
    angular.module('user', [])
        .controller('UtilisateurController', ['$scope','$http', function ($scope,$http) {

            $(".alert").hide();

            $scope.user = null;

            $scope.add = function () {
                let size = Object.keys($scope.user).length;
                if(size < 4) {
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
                fetch('/users/create/' + $scope.user.id, {headers:header, method:'post', body:JSON.stringify($scope.user)})
                    .then(function ($response) {
                        $('#alert-info-saving').hide();
                        window.location.href = '/users';
                    });
            }
        }]);
    angular.bootstrap(document,['user']);
</script>