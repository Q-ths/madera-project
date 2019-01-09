<?php
/**
 * Created by PhpStorm.
 * User: quentint
 * Date: 05/12/18
 * Time: 16:19
 */

namespace App\Controller;

use App\Model\Entity\Gamme;
use App\Model\Table\GammeTable;
use Cake\Event\Event;
use Cake\Http\Exception\UnauthorizedException;
use Cake\I18n\FrozenTime;

/**
 * Class FamilleComposantController
 * @package App\Controller
 *
 * @property GammeTable $Gamme
 */
class GammeController extends AppController
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

    public function beforeFilter(Event $event)
    {
        return parent::beforeFilter($event); // TODO: Change the autogenerated stub
    }

    public function get()
    {
        $gammes = $this->Gamme
            ->find('OrderByActivate', ['table' => 'Gamme'])
            ->contain(['TypeFinition', 'TypeIsolant'])
            ->toArray();

        return $this->renderToJson(json_encode($gammes));
    }

    public function getEnable() {
        $gammes = $this->Gamme->find('enable',['table' => 'Gamme'])->contain(['TypeFinition', 'TypeIsolant'])->toArray();

        return $this->renderToJson(json_encode($gammes));
    }

    public function view($id)
    {
        $gamme = $this->Gamme->get($id, ['contain' => ['Module']]);

        if($gamme)
            return $this->renderToJson(json_encode($gamme));
        else
            return $this->response->withStatus(400);
    }

    public function create()
    {
        $this->enableAutoRender();

        /** @var Gamme $gamme */
        $gamme = $this->Gamme->newEntity();
        if ($this->request->is('post')) {
            $gamme = $this->Gamme->patchEntity($gamme, $this->request->getData());
            $gamme->date_in = (new \DateTime())->format('Y-m-d H:m:s');
            if ($this->Gamme->saveOrFail($gamme)) {
                /** @var array $gamme */
                $gammes = $this->Gamme
                    ->find('OrderByActivate', ['table' => 'Gamme'])
                    ->contain(['TypeFinition', 'TypeIsolant'])
                    ->toArray();
                return $this->renderToJson(json_encode($gammes));
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

            $gamme = $this->Gamme->get($id, [
                'contain' => []
            ]);

            $gamme = $this->Gamme->patchEntity($gamme, $this->request->getData());
            $gamme->date_in = FrozenTime::parseDate($gamme->date_in);
            if ($this->Gamme->saveOrFail($gamme)) {
                $gammes = $this->Gamme
                    ->find('OrderByActivate', ['table' => 'Gamme'])
                    ->contain(['TypeFinition', 'TypeIsolant'])
                    ->toArray();
                return $this->renderToJson(json_encode($gammes));
            }
            return $this->response->withStatus(400);
        }
        $this->set(compact('user'));
    }

    /**
     * @param null $id
     * @return GammeController|\Cake\Http\Response
     * @throws \Exception
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gamme = $this->Gamme->get($id);
        $gamme->date_out = (new \DateTime())->format('Y-m-d H:m:s');
        if ($this->Gamme->save($gamme)) {
            $gammes = $this->Gamme
                ->find('OrderByActivate', ['table' => 'Gamme'])
                ->contain(['TypeFinition', 'TypeIsolant'])
                ->toArray();
            return $this->renderToJson(json_encode($gammes));
        } else {
            return $this->response->withStatus(400);
        }
    }

    /**
     * @param null $id
     * @return GammeController|\Cake\Http\Response
     * @throws \Exception
     */
    public function enable($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gamme = $this->Gamme->get($id);
        $gamme->date_out = null;

        if ($this->Gamme->save($gamme)) {
            $gammes = $this->Gamme
                ->find('OrderByActivate', ['table' => 'Gamme'])
                ->contain(['TypeFinition', 'TypeIsolant'])
                ->toArray();
            return $this->renderToJson(json_encode($gammes));
        } else {
            return $this->response->withStatus(400);
        }
    }
}