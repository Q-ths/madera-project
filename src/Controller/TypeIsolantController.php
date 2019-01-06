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
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;

/**
 * Class TypeIsolant
 * @package App\Controller
 *
 * @property TypeIsolant $TypeIsolant
 */
class TypeIsolantController extends AppController
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
        $type_isolants = $this->TypeIsolant->find('OrderByActivate')->toArray();

        return $this->renderToJson(json_encode($type_isolants));
    }

    public function getEnable() {
        $type_isolants = $this->TypeIsolant->find('enable')->toArray();

        return $this->renderToJson(json_encode($type_isolants));
    }


    public function view($id)
    {
        $type_isolant = $this->TypeIsolant->get($id);

        if($type_isolant)
            return $this->renderToJson(json_encode($type_isolant));
        else
            return $this->response->withStatus(400);
    }

    public function create()
    {
        $this->enableAutoRender();

        /** @var TypeIsolant $type_isolant */
        $type_isolant = $this->TypeIsolant->newEntity();
        if ($this->request->is('post')) {
            $type_isolant = $this->TypeIsolant->patchEntity($type_isolant, $this->request->getData());
            $type_isolant->date_in = (new \DateTime())->format('Y-m-d H:m:s');
            if ($this->TypeIsolant->saveOrFail($type_isolant)) {
                /** @var array $type_isolant */
                $type_isolants = $this->TypeIsolant->find('OrderByActivate')->toArray();
                return $this->renderToJson(json_encode($type_isolants));
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
            $type_isolant = $this->TypeIsolant->get($id, [
                'contain' => []
            ]);
            $type_isolant = $this->TypeIsolant->patchEntity($type_isolant, $this->request->getData());
            $type_isolant->date_in = FrozenTime::parseDate($type_isolant->date_in);
            if ($this->TypeIsolant->saveOrFail($type_isolant)) {
                $type_isolants = $this->TypeIsolant->find('OrderByActivate')->toArray();
                return $this->renderToJson(json_encode($type_isolants));
            }
            return $this->response->withStatus(400);
        }
        $this->set(compact('user'));
    }

    /**
     * @param null $id
     * @return TypeIsolantController|\Cake\Http\Response
     * @throws \Exception
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $type_isolant = $this->TypeIsolant->get($id);
        $type_isolant->date_out = (new \DateTime())->format('Y-m-d H:m:s');
        if ($this->TypeIsolant->save($type_isolant)) {
            $type_isolants = $this->TypeIsolant->find('OrderByActivate')->toArray();
            return $this->renderToJson(json_encode($type_isolants));
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
        $type_isolant = $this->TypeIsolant->get($id);
        $type_isolant->date_out = null;
        if ($this->TypeIsolant->save($type_isolant)) {
            $type_isolants = $this->TypeIsolant->find('OrderByActivate')->toArray();
            return $this->renderToJson(json_encode($type_isolants));
        } else {
            return $this->response->withStatus(400);
        }
    }
}