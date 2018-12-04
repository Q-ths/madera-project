<?php

/**
 * @author Quentin THOMAS
 * @version 1.0.0
 *
 * @Copyright 2018 Madera
 */

namespace App\Test;

/**
 * Interface TestDatabaseInterface
 *
 * Interface pour tout les tests de base de données
 * Test minimum obligatoire
 * @package App\Test
 */
interface TestDatabaseInterface
{
    /**
     * TestFind
     *
     * Test de récupération
     *
     * @return void
     */
    public function testFind() : void;

    /**
     * TestInsert
     *
     * Test d'insertion
     *
     * @return void
     */
    public function testInsert() : void;

    /**
     * TestDelete
     *
     * Test de suppression
     *
     * @return void
     */
    public function testDelete() : void;

    /**
     * TestUpdate
     *
     * Test de modification
     *
     * @return void
     */
    public function testUpdate(): void;
}