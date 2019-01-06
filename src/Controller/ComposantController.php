<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

use App\Model\Entity\Composant;
use App\Model\Table\ComposantTable;
use App\Model\Entity\FamilleComposant;
use Cake\I18n\FrozenTime;

/**
 * Class FamilleComposantController
 * @package App\Controller
 *
 * @property ComposantTable $Composant
 */
class ComposantController extends AppController
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
        $composants = $this->Composant->find('OrderByActivate', ['table' => 'Composant'])->toArray();

        return $this->renderToJson(json_encode($composants));
    }

    public function getEnable() {
        $composants = $this->Composant->find('enable',['table' => 'Composant'])->contain(['Tva','FamilleComposant'])->toArray();

        return $this->renderToJson(json_encode($composants));
    }

    public function view($id)
    {
        $composant = $this->Composant->get($id);

        if($composant)
            return $this->renderToJson(json_encode($composant));
        else
            return $this->response->withStatus(400);
    }

    public function create()
    {
        $this->enableAutoRender();

        /** @var Composant $composant */
        $composant = $this->Composant->newEntity();
        if ($this->request->is('post')) {
            $composant = $this->Composant->patchEntity($composant, $this->request->getData());
            $composant->prix_achat = (float)$composant->prix_achat;
            $composant->date_in = (new \DateTime())->format('Y-m-d H:m:s');
            if ($this->Composant->saveOrFail($composant)) {
                /** @var array $familles */
                $composants = $this->Composant->find('OrderByActivate')->toArray();
                return $this->renderToJson(json_encode($composants));
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
            $composant = $this->Composant->get($id, [
                'contain' => []
            ]);
            $composant = $this->Composant->patchEntity($composant, $this->request->getData());
            $composant->prix_achat = floatval($composant->prix_achat);
            $composant->date_in = FrozenTime::parseDate($composant->date_in);
            if ($this->Composant->saveOrFail($composant)) {
                $composants = $this->Composant->find('OrderByActivate')->toArray();
                return $this->renderToJson(json_encode($composants));
            }
            return $this->response->withStatus(400);
        }
        $this->set(compact('user'));
    }

    /**
     * @param null $id
     * @return ComposantController|\Cake\Http\Response
     * @throws \Exception
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $composant = $this->Composant->get($id);
        $composant->date_out = (new \DateTime())->format('Y-m-d H:m:s');
        if ($this->Composant->save($composant)) {
            $composants = $this->Composant->find('OrderByActivate')->toArray();
            return $this->renderToJson(json_encode($composants));
        } else {
            return $this->response->withStatus(400);
        }
    }
    /**
     * @param null $id
     * @return ComposantController|\Cake\Http\Response
     * @throws \Exception
     */
    public function enable($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $composant = $this->Composant->get($id);
        $composant->date_out = null;
        if ($this->Composant->save($composant)) {
            $composants = $this->Composant->find('OrderByActivate')->toArray();
            return $this->renderToJson(json_encode($composants));
        } else {
            return $this->response->withStatus(400);
        }
    }
}