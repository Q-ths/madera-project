<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

use App\Model\Entity\Projet;
use App\Model\Table\ProjetTable;
use Cake\I18n\FrozenTime;

/**
 * Class FamilleComposantController
 * @package App\Controller
 *
 * @property ProjetTable $Projet
 */
class ProjetController extends AppController
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
        $projets = $this->Projet->find('all')->contain(['Client'])->toArray();

        return $this->renderToJson(json_encode($projets));
    }

    public function view($id)
    {
        $projet = $this->Projet->get($id);

        if($projet)
            return $this->renderToJson(json_encode($projet));
        else
            return $this->response->withStatus(400);
    }

    public function create()
    {
        $this->enableAutoRender();

        /** @var Projet $projet */
        $projet = $this->Projet->newEntity();
        if ($this->request->is('post')) {
            $projet = $this->Projet->patchEntity($projet, $this->request->getData());
            $projet->date_creation = (new \DateTime())->format('Y-m-d H:m:s');
            if ($this->Projet->saveOrFail($projet)) {
                /** @var array $projet */
                $projets = $this->Projet->find('all')->contain(['Client'])->toArray();
                return $this->renderToJson(json_encode($projets));
            }
            return $this->response->withStatus(400);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id FamilleComposant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->enableAutoRender();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $projet = $this->Projet->get($id);
            $projet = $this->Projet->patchEntity($projet, $this->request->getData());
            $projet->date_creation = FrozenTime::parseDate($projet->date_creation);
            if ($this->Projet->saveOrFail($projet)) {
                $projets = $this->Projet->find('all')->contain(['Client'])->toArray();
                return $this->renderToJson(json_encode($projets));
            }
            return $this->response->withStatus(400);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id FamilleComposant id.Don,c
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projet = $this->Projet->get($id);
        if ($this->Projet->delete($projet)) {
            $projets = $this->Projet->find('all')->contain(['Client'])->toArray();
            return $this->renderToJson(json_encode($projets));
        } else {
            return $this->response->withStatus(400);
        }
    }
}