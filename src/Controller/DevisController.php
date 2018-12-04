<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 16/11/18
 * Time: 10:46
 */

namespace App\Controller;

use App\Model\Table\DevisTable;

/**
 * Class DevisController
 * @package App\Controller
 *
 * @property DevisTable $Devis
 */
class DevisController extends AppController
{
    public function index()
    {
        $this->set('liste_devis', $this->Devis->getAll());
    }

    public function add(){
//        $this->set('devis', new Devis());
    }

    public function addSection(){
        $this->layout = NULL;
        $this->autoRender = false;
        $this->set('delete', $_GET['delete']);
        $this->render('/Element/Devis/section');
    }
}