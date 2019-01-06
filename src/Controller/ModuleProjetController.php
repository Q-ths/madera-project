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
 * @property ModuleProjetTable $ModuleProjet
 * @property ModuleComposantProjetTable $ModuleComposantProjet
 */
class ModuleProjetController extends AppController
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
        $module_projets = $this->ModuleProjet->find('all')->contain(['Projet'])->toArray();

        return $this->renderToJson(json_encode($module_projets));
    }

    public function getEnable() {
        $module_projets = $this->ModuleProjet->find('enable')->toArray();

        return $this->renderToJson(json_encode($module_projets));
    }

    public function view($id)
    {
        $module_projet = $this->ModuleProjet->get($id,['contain' => ['ModuleComposantProjet','Projet','Module']]);

        if($module_projet)
            return $this->renderToJson(json_encode($module_projet));
        else
            return $this->response->withStatus(400);
    }

    public function create()
    {
        $this->enableAutoRender();
        if ($this->request->is('post')) {
            $module_projet = $this->ModuleProjet->newEntity();

            $data = $this->request->getData('module');

            $data['module_id'] = $data['id'];
            unset($data['id']);

            $module_projet = $this->ModuleProjet->patchEntity($module_projet, $data);
            $module_projet->date_in = (new \DateTime())->format('Y-m-d H:m:s');
            if($this->ModuleProjet->saveOrFail($module_projet)) {

                $composants = $this->request->getData('module_composants');

                foreach($composants as $key => $item) {
                    unset($composants[$key]['id']);
                    $composants[$key]['tva'] = $item['tva']['pourcentage_tva'];
                }

                $this->loadModel('ModuleComposantProjet');

                $composantsModule = $this->ModuleComposantProjet->newEntities($composants);

                foreach($composantsModule as $key => $composant) {
                    $composant->module_projet_id = $module_projet->id;
                    $composant->date_in = (new \DateTime())->format('Y-m-d H:m:s');
                }

                try {
                    $this->ModuleComposantProjet->saveMany($composantsModule);
                    return $this->response->withStatus(200);

                } catch (\Exception $e) {
                }

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
            $module_projet = $this->ModuleProjet->get($id, [
                'contain' => []
            ]);

            $module_projet = $this->ModuleProjet->patchEntity($module_projet, $this->request->getData());
            $module_projet->date_in = FrozenTime::parseDate($module_projet->date_in);
            if ($this->ModuleProjet->saveOrFail($module_projet)) {
                $module_projets = $this->ModuleProjet->find('all')->toArray();
                return $this->renderToJson(json_encode($module_projets));
            }
            return $this->response->withStatus(400);
        }
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
        $module_projet = $this->ModuleProjet->get($id);
        if ($this->ModuleProjet->delete($module_projet)) {
            $module_projets = $this->ModuleProjet->find('all')->toArray();
            return $this->renderToJson(json_encode($module_projets));
        } else {
            return $this->response->withStatus(400);
        }
    }
}