<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

use App\Model\Entity\Fournisseur;
use App\Model\Table\ClientTable;
use App\Model\Table\FamilleComposantTable;
use App\Model\Entity\FamilleComposant;
use App\Model\Table\FournisseurTable;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;

/**
 * Class FamilleComposantController
 * @package App\Controller
 *
 * @property ClientTable $Client
 */
class ClientController extends AppController
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
        $clients = $this->Client->find('all')->toArray();

        return $this->renderToJson(json_encode($clients));
    }

    public function getEnable() {
        $clients = $this->Client->find('enable')->toArray();

        return $this->renderToJson(json_encode($clients));
    }

    public function view($id)
    {
        $client = $this->Client->get($id);

        if($client)
            return $this->renderToJson(json_encode($client));
        else
            return $this->response->withStatus(400);
    }

    public function create()
    {
        $this->enableAutoRender();

        /** @var FamilleComposant $famille */
        $client = $this->Client->newEntity();
        if ($this->request->is('post')) {
            $client = $this->Client->patchEntity($client, $this->request->getData());
            $client->email = $this->request->getData('email');
            if ($this->Client->saveOrFail($client)) {
                /** @var array $familles */
                $clients = $this->Client->find('all')->toArray();
                return $this->renderToJson(json_encode($clients));
            }
            return $this->response->withStatus(400);
        }
    }

    /**
     * @param null $id
     * @return FournisseurController|\Cake\Http\Response
     * @throws \Exception
     */
    public function edit($id = null)
    {
        $this->enableAutoRender();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $client = $this->Client->get($id);

            $client = $this->Client->patchEntity($client, $this->request->getData());
            $client->email = $this->request->getData('email');
            $client->user_id = $this->Auth->user('id');
            $client->derniere_date_modification = (new \DateTime())->format('Y-m-d H:m:s');
            if ($this->Client->saveOrFail($client)) {
                $clients = $this->Client->find('all')->toArray();
                return $this->renderToJson(json_encode($clients));
            }
            return $this->response->withStatus(400);
        }
    }
}