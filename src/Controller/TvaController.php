<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

use App\Model\Entity\Tva;
use App\Model\Table\FamilleComposantTable;
use App\Model\Entity\FamilleComposant;
use App\Model\Table\TvaTable;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;

/**
 * Class FamilleComposantController
 * @package App\Controller
 *
 * @property TvaTable $Tva
 */
class TvaController extends AppController
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
        $tvas = $this->Tva->find('OrderByActivate')->toArray();

        return $this->renderToJson(json_encode($tvas));
    }

    public function getEnable() {
        $tvas = $this->Tva->find('enable')->toArray();

        return $this->renderToJson(json_encode($tvas));
    }

    public function view($id)
    {
        $tva = $this->Tva->get($id);

        if($tva)
            return $this->renderToJson(json_encode($tva));
        else
            return $this->response->withStatus(400);
    }

    public function create()
    {
        $this->enableAutoRender();

        /** @var Tva $tva */
        $tva = $this->Tva->newEntity();
        if ($this->request->is('post')) {
            $tva = $this->Tva->patchEntity($tva, $this->request->getData());
            $tva->date_in = (new \DateTime())->format('Y-m-d H:m:s');
            if ($this->Tva->saveOrFail($tva)) {
                /** @var array $tva */
                $tvas = $this->Tva->find('OrderByActivate')->toArray();
                return $this->renderToJson(json_encode($tvas));
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

            $tva = $this->Tva->get($id, [
                'contain' => []
            ]);

            $tva = $this->Tva->patchEntity($tva, $this->request->getData());
            $tva->date_in = FrozenTime::parseDate($tva->date_in);
            if ($this->Tva->saveOrFail($tva)) {
                $tvas = $this->Tva->find('OrderByActivate')->toArray();
                return $this->renderToJson(json_encode($tvas));
            }
            return $this->response->withStatus(400);
        }
        $this->set(compact('user'));
    }

    /**
     * @param null $id
     * @return TvaController|\Cake\Http\Response
     * @throws \Exception
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tva = $this->Tva->get($id);
        $tva->date_out = (new \DateTime())->format('Y-m-d H:m:s');
        if ($this->Tva->save($tva)) {
            $tvas = $this->Tva->find('OrderByActivate')->toArray();
            return $this->renderToJson(json_encode($tvas));
        } else {
            return $this->response->withStatus(400);
        }
    }

    /**
     * @param null $id
     * @return TvaController|\Cake\Http\Response
     * @throws \Exception
     */
    public function enable($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tva = $this->Tva->get($id);
        $tva->date_out = null;
        if ($this->Tva->save($tva)) {
            $tvas = $this->Tva->find('OrderByActivate')->toArray();
            return $this->renderToJson(json_encode($tvas));
        } else {
            return $this->response->withStatus(400);
        }
    }
}