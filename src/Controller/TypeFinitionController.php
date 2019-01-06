<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

use App\Model\Entity\TypeFinition;
use Cake\I18n\FrozenTime;

/**
 * Class TypeFinition
 * @package App\Controller
 *
 * @property TypeFinition $TypeFinition
 */
class TypeFinitionController extends AppController
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
        $type_finitions = $this->TypeFinition->find('OrderByActivate')->toArray();

        return $this->renderToJson(json_encode($type_finitions));
    }

    public function getEnable() {
        $type_finitions = $this->TypeFinition->find('enable')->toArray();

        return $this->renderToJson(json_encode($type_finitions));
    }

    public function view($id)
    {
        $type_finition = $this->TypeFinition->get($id);

        if($type_finition)
            return $this->renderToJson(json_encode($type_finition));
        else
            return $this->response->withStatus(400);
    }

    public function create()
    {
        $this->enableAutoRender();

        /** @var TypeFinition $type_finition */
        $type_finition = $this->TypeFinition->newEntity();
        if ($this->request->is('post')) {
            $type_finition = $this->TypeFinition->patchEntity($type_finition, $this->request->getData());
            $type_finition->date_in = (new \DateTime())->format('Y-m-d H:m:s');
            if ($this->TypeFinition->saveOrFail($type_finition)) {
                /** @var array $familles */
                $type_finitions = $this->TypeFinition->find('OrderByActivate')->toArray();
                return $this->renderToJson(json_encode($type_finitions));
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

            $type_finition = $this->TypeFinition->get($id, [
                'contain' => []
            ]);

            $type_finition = $this->TypeFinition->patchEntity($type_finition, $this->request->getData());
            $type_finition->date_in = FrozenTime::parseDate($type_finition->date_in);
            if ($this->TypeFinition->saveOrFail($type_finition)) {
                $type_finitions = $this->TypeFinition->find('OrderByActivate')->toArray();
                return $this->renderToJson(json_encode($type_finitions));
            }
            return $this->response->withStatus(400);
        }
        $this->set(compact('user'));
    }

    /**
     * @param null $id
     * @return TypeFinitionController|\Cake\Http\Response
     * @throws \Exception
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $type_finition = $this->TypeFinition->get($id);
        $type_finition->date_out = (new \DateTime())->format('Y-m-d H:m:s');
        if ($this->TypeFinition->save($type_finition)) {
            $type_finitions = $this->TypeFinition->find('OrderByActivate')->toArray();
            return $this->renderToJson(json_encode($type_finitions));
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
        $type_finition = $this->TypeFinition->get($id);
        $type_finition->date_out = null;
        if ($this->TypeFinition->save($type_finition)) {
            $type_finitions = $this->TypeFinition->find('OrderByActivate')->toArray();
            return $this->renderToJson(json_encode($type_finitions));
        } else {
            return $this->response->withStatus(400);
        }
    }
}