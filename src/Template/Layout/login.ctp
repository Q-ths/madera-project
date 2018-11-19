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

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Connexion </title>
    <?= $this->Html->script('https://code.jquery.com/jquery-3.3.1.min.js') ?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/angularjs/1.7.4/angular.min.js') ?>
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap-table@1.12.1/dist/bootstrap-table.min.js') ?>
    <?= $this->Html->script('https://cdn.bootcss.com/bootstrap-table/1.12.1/locale/bootstrap-table-fr-FR.min.js') ?>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css') ?>
    <?= $this->Html->css('https://cdn.bootcss.com/bootstrap-table/1.12.1/bootstrap-table.min.css') ?>
    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.5.0/css/all.css') ?>
    <?= $this->Html->css('login/index.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    <div class="container">
        <?= $this->fetch('content') ?>
    </div>

<footer>
</footer>
</body>
</html>
