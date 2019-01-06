<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

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
     * Delete method
     *
     * @param string|null $id FamilleComposant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $module_projet = $this->ModuleComposantProjet->get($id);
        if ($this->ModuleComposantProjet->delete($module_projet)) {
            $module_projets = $this->ModuleComposantProjet->find('all')->toArray();
            return $this->renderToJson(json_encode($module_projets));
        } else {
            return $this->response->withStatus(400);
        }
    }
}