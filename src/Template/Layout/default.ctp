<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Madera - ';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->script('https://code.jquery.com/jquery-3.3.1.min.js') ?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/angularjs/1.7.4/angular.min.js') ?>
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap-table@1.12.1/dist/bootstrap-table.min.js') ?>
    <?= $this->Html->script('https://cdn.bootcss.com/bootstrap-table/1.12.1/locale/bootstrap-table-fr-FR.min.js') ?>
    <?= $this->Html->script('madera.js') ?>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css') ?>
    <?= $this->Html->css('https://cdn.bootcss.com/bootstrap-table/1.12.1/bootstrap-table.min.css') ?>
    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.5.0/css/all.css') ?>
    <?= $this->Html->css('madera.css') ?>
    <!--<?= $this->Html->css('base.css') ?>-->
    <!--<?= $this->Html->css('style.css') ?>-->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #DDDDDD">
            <a class="navbar-brand" href="#">
                <?= $this->Html->image('madera-logo.png', ['alt' => 'CakePHP', 'style' => 'width: 50px;']) ?>
            </a>

            <a class="navbar-brand" href="#">MADERA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <?= $this->Html->link(
                            'Accueil',
                            ['controller' => 'Main', 'action' => 'home'],
                            ['class' => 'nav-link']
                        )?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link(
                            'Devis',
                            ['controller' => 'Devis', 'action' => 'index'],
                            ['class' => 'nav-link']
                        )?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link(
                            'Suivi',
                            ['controller' => 'Suivis', 'action' => 'index'],
                            ['class' => 'nav-link']
                        )?>
                    </li>
                </ul>

                <form class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Rechercher" aria-label="Rechercher" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary bg-light" type="button" id="button-search">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </nav>
    </header>
    <br>
    <?= $this->Flash->render() ?>
    <div class="container">
        <?= $this->fetch('content') ?>
    </div>

    <footer>
    </footer>
</body>
</html>
