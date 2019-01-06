<div ng-controller="UsersView" id="user-views">

    <!-- ALERT MODIFICATION -->
    <div class="alert alert-danger margin-alert-edition d-none" role="alert" id="alert-error-edition">
        <strong>Une erreur a été rencontrée. Merci de contacter le service informatique si l'erreur persiste.</strong>
    </div>
    <div class="alert alert-success margin-alert-edition d-none" role="alert" id="alert-success-edition">
        <strong>Les données ont été sauvegardée.</strong>
    </div>

    <!-- ALERT SUPRESSION -->
    <div class="alert alert-danger margin-alert-delete d-none" role="alert" id="alert-error-delete">
        <strong>Une erreur a été rencontrée. Merci de contacter le service informatique si l'erreur persiste.</strong>
    </div>
    <div class="alert alert-success margin-alert-delete d-none" role="alert" id="alert-success-delete">
        <strong>L'utilisateur a été supprimé.</strong>
    </div>

    <!-- ALERT ADD -->
    <div class="alert alert-danger margin-alert-add d-none" role="alert" id="alert-error-add">
        <strong>Une erreur a été rencontrée. Merci de contacter le service informatique si l'erreur persiste.</strong>
    </div>
    <div class="alert alert-success margin-alert-add d-none" role="alert" id="alert-success-add">
        <strong>L'utilisateur à été crée.</strong>
    </div>

    <div class="row">
        <div class="col-md-5">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=$this->Url->build('/', true)?>">Madera</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-5 offset-md-2">
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modal-user-create">Créer un utilisateur</button>
        </div>
    </div>

    <table class="table" data-pagination="true" data-row-style="striped">
        <thead class="thead-light">
        <tr>
            <th data-sortable="true">#</th>
            <th data-sortable="true">Nom</th>
            <th data-sortable="true">Prenom</th>
            <th data-sortable="true">E-mail</th>
            <th data-sortable="true">Poste</th>
            <th data-sortable="true">Actions</th>
        </tr>
        </thead>
        <tbody>
            <tr ng-repeat="item in users">
                <td>{{ $index +1 }}</td>
                <td>{{ item.nom }}</td>
                <td>{{ item.prenom }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.poste }}</td>
                <td class="align-center">
                    <a class="btn" ng-click="editUser(item.id)"><i class="fa fa-pencil-alt"></i></a>
                    <a class="btn" ng-click="deleteUser(item.id)"><i class="fa fa-trash-alt"></i></a>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="modal fade" id="modal-user-delete" tabindex="-1" role="dialog" aria-labelledby="modal-user-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-user-label">Modifier un utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Etes-vous sûr de vouloir supprimer cet utilisateur ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-user">Annuler</button>
                    <button type="button" class="btn btn-primary" ng-click="confirmDelete()">Supprimer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="modal-user-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-user-label">Modifier un utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-fw fa-envelope"></i></div>
                            </div>
                            <input name="input" ng-model="user.email" required class="form-control" placeholder="Email" type="email" value="user.email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-fw fa-lock"></i></div>
                            </div>
                            <input name="input" ng-model="user.password" value="" class="form-control" placeholder="Mot de passe" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-fw fa-user"></i></div>
                            </div>
                            <input name="input" ng-model="user.nom"  value="user.nom" required class="form-control" placeholder="Nom" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-fw fa-user"></i></div>
                            </div>
                            <input name="input" ng-model="user.prenom" value="user.prenom" required class="form-control" placeholder="Prenom" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-fw fa-user"></i></div>
                            </div>
                            <input name="input" ng-model="user.poste" value="user.poste" required class="form-control" placeholder="Rôle" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-user">Annuler</button>
                    <button type="button" class="btn btn-primary" ng-click="saveUser()">Enregistrer</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-user-create" tabindex="-1" role="dialog" aria-labelledby="modal-user-create-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-user-create-label">Créer un utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-fw fa-envelope"></i></div>
                            </div>
                            <input name="input" ng-model="user.email" required class="form-control" placeholder="Email" type="email" value="user.email">
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
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-fw fa-user"></i></div>
                            </div>
                            <input name="input" ng-model="user.nom" required class="form-control" placeholder="Nom" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-fw fa-user"></i></div>
                            </div>
                            <input name="input" ng-model="user.prenom" required class="form-control" placeholder="Prenom" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-fw fa-user"></i></div>
                            </div>
                            <input name="input" ng-model="user.poste" required class="form-control" placeholder="Rôle" type="text">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-user">Annuler</button>
                    <button type="button" class="btn btn-primary" ng-click="createUser()">Créer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-progress" tabindex="-1" role="dialog" aria-labelledby="modal-progress-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                En cours d'enregistrement...
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    var app = angular.module('users', [])
    .controller('UsersView', ['$scope','$http', function ($scope,$http) {
        $scope.users = null;
        $scope.user = null;
        $scope.id = null;

        $http.get('user/get')
            .then(function ($response) {
                $scope.users = $response.data;
            })

        $scope.editUser = function ($id) {

            /* En-tête de la requête ASYNC */
            let header = new Headers({
                "Content-Type": "application/json",
                "Access-Control-Allow-Origin" : "*",
                'X-CSRF-Token': csrfToken
            });

            /* Exécution de la requête */
            fetch('/user/view/' + $id,{headers:header, method:'get'})
                .then((response) => response.json())
                .then(function (data) {
                    /* Injection des données récupérées */
                    $scope.user = data;

                    /* Ouverture de la modal d'édition */
                    $('#modal-user').modal();

                    $scope.$apply();
                });
        };

        $scope.saveUser = function () {
            /* En-tête de la requête ASYNC */
            let header = new Headers({
                "Content-Type": "application/json",
                "Access-Control-Allow-Origin" : "*",
                'X-CSRF-Token': csrfToken
            });

            $('#modal-user').modal('hide');
            $('#modal-progress').modal();

            /* Exécution de la requête */
            fetch('/user/edit/' + $scope.user.id,{headers:header, method:'post', body:JSON.stringify($scope.user)})
                .then(function ($response) {
                    $('#modal-user').modal('hide');
                    $('#modal-progress').modal('hide');
                    if($response.status == 200) {
                        $('#alert-success-edition').removeClass('d-none');
                        $('#alert-error-edition').addClass('d-none');
                        $response.json().then(function (data) {
                            $scope.users  = data
                            $scope.$apply();
                        });
                    } else {
                        $('#alert-error-edition').removeClass('d-none');
                    }
                })
        };

        $scope.deleteUser = function ($id) {
            $scope.id = $id;
            $('#modal-user-delete').modal();
        };

        $scope.confirmDelete = function () {

            $('#modal-user-delete').modal('hide');
            $('#modal-progress').modal();

            /* En-tête de la requête ASYNC */
            let header = new Headers({
                "Content-Type": "application/json",
                "Access-Control-Allow-Origin" : "*",
                'X-CSRF-Token': csrfToken
            });

            /* Exécution de la requête */
            fetch('/user/delete/' + $scope.id,{headers:header, method:'post'})
                .then(function ($response) {
                    $('#modal-progress').modal('hide');
                    if($response.status == 200) {
                        $response.json().then(function (data) {
                            $scope.users  = data;
                            $scope.$apply();
                        });
                        $('#alert-success-delete').removeClass('d-none');
                        $('#alert-error-delete').addClass('d-none');
                    } else {
                        $('#alert-error-delete').removeClass('d-none');
                    }
                });
        }
        
        $scope.createUser = function () {
            /* En-tête de la requête ASYNC */
            let header = new Headers({
                "Content-Type": "application/json",
                "Access-Control-Allow-Origin" : "*",
                'X-CSRF-Token': csrfToken
            });

            $('#modal-user-create').modal('hide');
            $('#modal-progress').modal();

            fetch('/user/add',{headers:header, method:'post', body:JSON.stringify($scope.user)})
                .then(function ($response) {
                    if($response.status == 200) {
                        $response.json().then(function (data) {
                            $scope.users  = data;
                            $scope.$apply();
                        });
                        $('#modal-progress').modal('hide');

                        $('#alert-success-add').removeClass('d-none');
                        $('#alert-error-add').addClass('d-none');

                    } else {
                        $('#alert-error-add').removeClass('d-none');
                    }
                })
        }
    }]);
    angular.bootstrap(document,['users']);
</script>