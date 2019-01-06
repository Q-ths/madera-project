<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

use App\Model\Entity\Composant;
use App\Model\Entity\ComposantModule;
use App\Model\Table\ComposantModuleTable;
use App\Model\Table\ModuleTable;
use Cake\I18n\FrozenTime;

/**
 * Class FamilleComposantController
 * @package App\Controller
 *
 * @property ComposantModuleTable $ComposantModule
 */
class ComposantModuleController extends AppController
{
    public function initialize()
    {
        $this->disableAutoRender();
        parent::initialize();
    }

    public function create()
    {
        if ($this->request->is('post')) {
            $projet = $this->ComposantModule->newEntity();
            $projet = $this->ComposantModule->patchEntity($projet, $this->request->getData());
            if ($this->ComposantModule->saveOrFail($projet)) {
                return $this->renderToJson(json_encode([]));
            }
            return $this->response->withStatus(400);
        }
    }
    /**
     * @param null $id
     * @return \Cake\Http\Response
     * @throws \Exception
     */
    public function edit($id = null)
    {

        /** @var ComposantModule $module */
        if ($this->request->is('post')) {
            $module = $this->ComposantModule->get($id);

            $module = $this->ComposantModule->patchEntity($module, $this->request->getData());

            if($this->ComposantModule->saveOrFail($module)) {
                return $this->renderToJson(json_encode([]));
            }
            return $this->response->withStatus(400);
        }
    }

    /**
     * @param null $id
     * @return ModuleController|\Cake\Http\Response
     * @throws \Exception
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $module = $this->ComposantModule->get($id);
        if ($this->ComposantModule->delete($module)) {
            return $this->renderToJson(json_encode([]));
        } else {
            return $this->response->withStatus(400);
        }
    }

    /**
     * @param null $id
     * @return ModuleController|\Cake\Http\Response
     * @throws \Exception
     */
    public function enable($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $module = $this->Module->get($id);
        $module->date_out = null;
        if ($this->Module->save($module)) {
            $modules = $this->Module->find('OrderByActivate', ['table' => 'Gamme'])->toArray();
            return $this->renderToJson(json_encode($modules));
        } else {
            return $this->response->withStatus(400);
        }
    }
}