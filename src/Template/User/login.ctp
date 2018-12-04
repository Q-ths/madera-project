<div class="row justify-content-center align-items-center" >
    <div class="col-8 col-sm-8 col-md-8 col-lg-5 col-xl-5 align-self-center" id="row-connexion">
        <div class="alert alert-danger margin-alert-connexion d-none" role="alert" id="alert-error-connexion">
            <strong>Votre identifiant ou votre mot de passe est incorrect</strong>
        </div>
        <div class="alert alert-success margin-alert-connexion d-none" role="alert" id="alert-success-connexion">
            <strong>Connexion éffectuée. Redirection en cours</strong>
        </div>
        <form name="connexion" ng-controller="FormConnexion" id="form-connexion">
            <div id="container-logo-connexion">
                <img id="logo-connexion" alt="logo" src="/img/madera-logo.png" />
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-fw fa-envelope"></i></div>
                    </div>
                    <input name="input" ng-model="user.email" required class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fa fa-fw fa-lock"></i></div>
                    </div>
                    <input name="input" ng-model="user.password" required class="form-control" placeholder="Mot de passe" type="password">
                </div>
            </div>
            <div id="container-btn-submit">
                <button class="btn btn-primary full-width" ng-click="validate(user)">Connexion</button>
            </div>
            <div class="container-forgot-password">
                <a href="#" class="forgot-password"> Mot de passe oublié ? </a>
            </div>
        </form>
    </div>
</div>


<script>
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    var app = angular.module('connexion', [])
    .controller('FormConnexion', ['$scope', function ($scope) {
       $scope.validate = function ($user) {
           header = new Headers({
               "Content-Type": "application/json",
               "Access-Control-Allow-Origin" : "*",
               'X-CSRF-Token': csrfToken
           });


            fetch('/user/login',{headers:header, method:'post', body:JSON.stringify($user)})
                .then(function (response) {
                if(response.status == 200) {
                    $('#alert-success-connexion').removeClass('d-none');
                    $('#alert-error-connexion').addClass('d-none');
                    setTimeout(function () {
                        window.location.href ="/";
                    },500)
                }
                else
                    $('#alert-error-connexion').removeClass('d-none');

            });
       };
    }])
    angular.bootstrap(document,['connexion']);
</script>

