<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

use App\Model\Entity\ModuleComposantProjet;
use App\Model\Table\ModuleComposantProjetTable;
use App\Model\Table\DevisModuleTable;
use App\Model\Table\ModuleProjetTable;
use App\Model\Table\ModuleTable;
use Cake\I18n\FrozenTime;

/**
 * Class FamilleComposantController
 * @package App\Controller
 *
 * @property ModuleComposantProjetTable $ModuleComposantProjet
 */
class ModuleComposantProjetController extends AppController
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

    public function getEnable() {
        $module_projets = $this->ModuleComposantProjet->find('enable')->toArray();

        return $this->renderToJson(json_encode($module_projets));
    }

    /**
     * @param null $id
     * @return \Cake\Http\Response
     * @throws \Exception
     */
    public function edit($id = null)
    {

        /** @var ModuleComposantProjet $module */
        $this->enableAutoRender();
        if ($this->request->is('post')) {
            $module = $this->ModuleComposantProjet->get($id);

            $module = $this->ModuleComposantProjet->patchEntity($module, $this->request->getData());
            $module->date_in = FrozenTime::parseDate($module->date_in);

            if($this->ModuleComposantProjet->saveOrFail($module)) {
                return $this->response->withStatus(200)->withType('application/json')->withStringBody(json_encode([]));
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
        $module = $this->ModuleComposantProjet->get($id);
        $module->date_out = (new \DateTime())->format('Y-m-d H:m:s');
        if ($this->ModuleComposantProjet->save($module)) {
            $modules = $this->ModuleComposantProjet->find('OrderByActivate', ['table' => 'ModuleComposantProjet'])->where(['module_projet_id' => $module->module_projet_id])->toArray();
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
        $module = $this->ModuleComposantProjet->get($id);
        $module->date_out = null;
        if ($this->ModuleComposantProjet->save($module)) {
            $modules = $this->ModuleComposantProjet->find('OrderByActivate', ['table' => 'ModuleComposantProjet'])->where(['module_projet_id' => $module->module_projet_id])->toArray();
            return $this->renderToJson(json_encode($modules));
        } else {
            return $this->response->withStatus(400);
        }
    }
}