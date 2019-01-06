<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

use App\Model\Entity\Composant;
use App\Model\Table\ComposantModuleTable;
use App\Model\Table\ModuleTable;
use Cake\I18n\FrozenTime;

/**
 * Class FamilleComposantController
 * @package App\Controller
 *
 * @property ModuleTable $Module
 * @property ComposantModuleTable $ComposantModule
 */
class ModuleController extends AppController
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
        $modules = $this->Module->find('OrderByActivate', ['table' => 'Gamme'])->contain(['Gamme'])->toArray();

        return $this->renderToJson(json_encode($modules));
    }

    public function getEnable() {
        $modules = $this->Module->find('enable')->toArray();

        return $this->renderToJson(json_encode($modules));
    }

    public function view($id)
    {
        $module = $this->Module->get($id, ['contain' => ['Composant' => ['Tva']]]);

        if($module)
            return $this->renderToJson(json_encode($module));
        else
            return $this->response->withStatus(400);
    }

    public function create()
    {

        /** @var Module $module */
        $this->enableAutoRender();
        if ($this->request->is('post')) {
            $module = $this->Module->newEntity();

            $module = $this->Module->patchEntity($module, $this->request->getData('module'));
            $module->date_in = (new \DateTime())->format('Y-m-d H:m:s');

            if ($this->Module->saveOrFail($module)) {
                $composants = $this->request->getData('module_composants');

                foreach ($composants as $key => $item) {
                    $composants[$key]['composant_id'] = $item['id'];
                }

                $this->loadModel('ComposantModule');

                $composantsModule = $this->ComposantModule->newEntities($composants);

                foreach ($composantsModule as $key => $composant) {
                    $composant->module_id = $module->id;
                }


                if ($this->ComposantModule->saveMany($composantsModule)) {
                    return $this->response->withStatus(200);
                }

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

        /** @var Module $module */
        $this->enableAutoRender();
        if ($this->request->is('post')) {
            $module = $this->Module->get($id);

            $module = $this->Module->patchEntity($module, $this->request->getData());
            $module->date_in = FrozenTime::parseDate($module->date_in);

            if($this->Module->saveOrFail($module)) {
                $modules = $this->Module->find('OrderByActivate', ['table' => 'Module'])->toArray();
                return $this->renderToJson(json_encode($modules));
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
        $module = $this->Module->get($id);
        $module->date_out = (new \DateTime())->format('Y-m-d H:m:s');
        if ($this->Module->save($module)) {
            $modules = $this->Module->find('OrderByActivate', ['table' => 'Module'])->toArray();
            return $this->renderToJson(json_encode($modules));
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
            $modules = $this->Module->find('OrderByActivate', ['table' => 'Module'])->toArray();
            return $this->renderToJson(json_encode($modules));
        } else {
            return $this->response->withStatus(400);
        }
    }
}