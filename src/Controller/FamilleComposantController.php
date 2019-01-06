<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

use App\Model\Table\FamilleComposantTable;
use App\Model\Entity\FamilleComposant;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;

/**
 * Class FamilleComposantController
 * @package App\Controller
 *
 * @property FamilleComposantTable $FamilleComposant
 */
class FamilleComposantController extends AppController
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
        $famille_composants = $this->FamilleComposant->find('OrderByActivate')->toArray();

        return $this->renderToJson(json_encode($famille_composants));
    }

    public function getEnable() {
        $familles = $this->FamilleComposant->find('enable')->toArray();

        return $this->renderToJson(json_encode($familles));
    }

    public function view($id)
    {
        $famille = $this->FamilleComposant->get($id);

        if($famille)
            return $this->renderToJson(json_encode($famille));
        else
            return $this->response->withStatus(400);
    }

    public function create()
    {
        $this->enableAutoRender();

        /** @var FamilleComposant $famille */
        $famille = $this->FamilleComposant->newEntity();
        if ($this->request->is('post')) {
            $famille = $this->FamilleComposant->patchEntity($famille, $this->request->getData());
            $famille->date_in = (new \DateTime())->format('Y-m-d H:m:s');
            if ($this->FamilleComposant->saveOrFail($famille)) {
                /** @var array $familles */
                $familles = $this->FamilleComposant->find('OrderByActivate')->toArray();
                return $this->renderToJson(json_encode($familles));
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
            $user = $this->FamilleComposant->get($id, [
                'contain' => []
            ]);
            $famille = $this->FamilleComposant->patchEntity($user, $this->request->getData());
            $famille->date_in = FrozenTime::parseDate($famille->date_in);
            if ($this->FamilleComposant->saveOrFail($famille)) {
                $familles = $this->FamilleComposant->find('OrderByActivate')->toArray();
                return $this->renderToJson(json_encode($familles));
            }
            return $this->response->withStatus(400);
        }
        $this->set(compact('user'));
    }

    /**
     * @param null $id
     * @return FamilleComposantController|\Cake\Http\Response
     * @throws \Exception
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $famille = $this->FamilleComposant->get($id);
        $famille->date_out = (new \DateTime())->format('Y-m-d H:m:s');
        if ($this->FamilleComposant->save($famille)) {
            $familles = $this->FamilleComposant->find('OrderByActivate')->toArray();
            return $this->renderToJson(json_encode($familles));
        } else {
            return $this->response->withStatus(400);
        }
    }

    /**
     * @param null $id
     * @return FamilleComposantController|\Cake\Http\Response
     * @throws \Exception
     */
    public function enable($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $famille = $this->FamilleComposant->get($id);
        $famille->date_out = null;
        if ($this->FamilleComposant->save($famille)) {
            $familles = $this->FamilleComposant->find('OrderByActivate')->toArray();
            return $this->renderToJson(json_encode($familles));
        } else {
            return $this->response->withStatus(400);
        }
    }
}