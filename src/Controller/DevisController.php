<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 16/11/18
 * Time: 10:46
 */

namespace App\Controller;

use App\Model\Entity\Devis;
use App\Model\Entity\ModuleComposantProjet;
use App\Model\Entity\ModuleProjet;
use App\Model\Table\DevisTable;
use App\Model\Table\ModuleComposantProjetTable;
use App\Model\Table\ModuleProjetTable;

/**
 * Class DevisController
 * @package App\Controller
 *
 * @property DevisTable $Devis
 * @property ModuleProjetTable $ModuleProjet
 * @property ModuleComposantProjetTable $ModuleComposantProjet
 */
class DevisController extends AppController
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
        $devis = $this->Devis->find('all')->contain(['Projet','TypeStatut'])->order(['TypeStatut.libelle'])->toArray();

        return $this->renderToJson(json_encode($devis));
    }

    public function view($id)
    {
        $devis = $this->Devis->get($id,['contain' => ['Projet','TypeStatut', 'ModuleProjet' => ['ModuleComposantProjet']]])->toArray();

        return $this->renderToJson(json_encode($devis));
    }

    public function create() {
        $this->enableAutoRender();

        if ($this->request->is('post')) {

            /** @var Devis $devis */
            $devis = $this->Devis->newEntity();

            $data = $this->request->getData();
            $devis->client_nom = $data['client']['nom'];
            $devis->client_prenom = $data['client']['prenom'];
            $devis->adresse_numero = $data['client']['adresse_numero'];
            $devis->adresse = $data['client']['adresse'];
            $devis->code_postal = $data['client']['code_postal'];
            $devis->ville = $data['client']['ville'];
            $devis->projet_id = (int)$data['projet_id'];
            $devis->type_statut_id = (int)$data['type_statut_id'];
            $devis->pourcentage_remise = 0;
            $devis->prix_total_ht = $devis->prix_total_ttc = 0;
            $devis->reference = 'PRJ-' . $devis->projet_id . '-DVS-'. $this->Devis->find('all')->count();

            if($this->Devis->saveOrFail($devis)) {

                $modules = $data['module'];

                foreach ($modules as $key => $item) {
                    $this->loadModel('ModuleProjet');

                    $composants = $item['composants'];

                    /** @var ModuleProjet $module */
                    $module = $this->ModuleProjet->newEntity();
                    $module->nom = $item['nom'];
                    $module->marge = $item['marge'];
                    $module->devis_id = $devis->id;

                    if($this->ModuleProjet->saveOrFail($module)) {
                        $this->loadModel('ModuleComposantProjet');

                        foreach ($composants as $key => $item) {
                            $composantProjet = $this->ModuleComposantProjet->newEntity();
                            unset($data['fournisseur_id']);
                            unset($data['famille_composant_id']);
                            unset($data['tva_id']);



                            $composantProjet = $this->ModuleComposantProjet->patchEntity($composantProjet,$item);
                            $composantProjet->date_in = (new \DateTime())->format('Y-m-d H:m:s');
                            $composantProjet->module_projet_id = $module->id;

                            $this->ModuleComposantProjet->saveOrFail($composantProjet);


                        }
                    }
                }
                return $this->renderToJson(json_encode($devis));

            }
            //var_dump($devis);
           // return $this->response->withStatus(400);
        }

    }

    public function edit($id =null) {
        $this->enableAutoRender();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $module_projet = $this->Devis->get($id);

            $module_projet = $this->Devis->patchEntity($module_projet, $this->request->getData());
            if ($this->Devis->saveOrFail($module_projet)) {
                $module_projets = $this->Devis->find('all')->toArray();
                return $this->renderToJson(json_encode($module_projets));
            }
            return $this->response->withStatus(400);
        }
    }
}