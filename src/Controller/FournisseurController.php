<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

use App\Model\Entity\Fournisseur;
use App\Model\Table\FamilleComposantTable;
use App\Model\Entity\FamilleComposant;
use App\Model\Table\FournisseurTable;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;

/**
 * Class FamilleComposantController
 * @package App\Controller
 *
 * @property FournisseurTable $Fournisseur
 */
class FournisseurController extends AppController
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
        $fournisseurs = $this->Fournisseur->find('all')->toArray();

        return $this->renderToJson(json_encode($fournisseurs));
    }

    public function getEnable() {
        $fournisseurs = $this->Fournisseur->find('enable')->toArray();

        return $this->renderToJson(json_encode($fournisseurs));
    }

    public function view($id)
    {
        $fournisseur = $this->Fournisseur->get($id);

        if($fournisseur)
            return $this->renderToJson(json_encode($fournisseur));
        else
            return $this->response->withStatus(400);
    }

    public function create()
    {
        $this->enableAutoRender();

        /** @var FamilleComposant $famille */
        $fournisseur = $this->Fournisseur->newEntity();
        if ($this->request->is('post')) {
            $fournisseur = $this->Fournisseur->patchEntity($fournisseur, $this->request->getData());
            $fournisseur->email = $this->request->getData('email');
            if ($this->Fournisseur->saveOrFail($fournisseur)) {
                /** @var array $familles */
                $fournisseurs = $this->Fournisseur->find('all')->toArray();
                return $this->renderToJson(json_encode($fournisseurs));
            }
            return $this->response->withStatus(400);
        }
    }

    /**
     * @param null $id
     * @return FournisseurController|\Cake\Http\Response
     * @throws \Exception
     */
    public function edit($id = null)
    {
        $this->enableAutoRender();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $fournisseur = $this->Fournisseur->get($id);

            $fournisseur = $this->Fournisseur->patchEntity($fournisseur, $this->request->getData());
            $fournisseur->email = $this->request->getData('email');
            $fournisseur->user_id = $this->Auth->user('id');
            $fournisseur->derniere_date_modification = (new \DateTime())->format('Y-m-d H:m:s');
            if ($this->Fournisseur->saveOrFail($fournisseur)) {
                $fournisseurs = $this->Fournisseur->find('all')->toArray();
                return $this->renderToJson(json_encode($fournisseurs));
            }
            return $this->response->withStatus(400);
        }
    }
}