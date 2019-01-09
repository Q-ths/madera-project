<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

use App\Model\Entity\TypeIsolant;
use App\Model\Table\FamilleComposantTable;
use App\Model\Entity\FamilleComposant;
use App\Model\Table\ProfilTable;
use App\Model\Table\TypeStatutTable;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;

/**
 * Class TypeIsolant
 * @package App\Controller
 *
 * @property ProfilTable $Profil
 */
class ProfilController extends AppController
{
    public function initialize()
    {
        $this->disableAutoRender();
        parent::initialize();
    }

    public function index()
    {
        $this->enableAutoRender();
    }

    public function get()
    {
        $profils = $this->Profil->find('all')->toArray();

        return $this->renderToJson(json_encode($profils));
    }
}