<?php
namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\FrozenTime;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\Users[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function index()
    {
        $this->enableAutoRender();
    }

    /**
     * Get method
     *
     * @return \Cake\Http\Response|void
     */
    public function get()
    {
        $this->disableAutoRender();

        $users = $this->Users->find()->enableHydration(false)->all()->toArray();
        if($users)
            return $this->renderToJson(json_encode($users));
    }

    public function getEnable() {
        $type_isolants = $this->Users->find('enable',['table' => 'Users'])->toArray();

        return $this->renderToJson(json_encode($type_isolants));
    }

    /**
     * View method
     *
     * @param string|null $id Users id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id);

        if($user)
            return $this->renderToJson(json_encode($user));
        else
            return $this->response->withStatus(400);
    }

    /**
     * Add method
     *
     */
    public function create()
    {
        $this->enableAutoRender();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->password = (new DefaultPasswordHasher())->hash($user->password);
            if ($this->Users->saveOrFail($user)) {
                $users = $this->Users->find()->enableHydration(false)->all()->toArray();
                return $this->renderToJson(json_encode($users));
            }
            return $this->response->withStatus(400);
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Users id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->enableAutoRender();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->get($id, [
                'contain' => []
            ]);


            $data = $this->request->getData();
            if(isset($data['password']))
                $data['password'] = (new DefaultPasswordHasher())->hash($data['password']);

            $user = $this->Users->patchEntity($user, $data);

            $user->date_in = FrozenTime::parseDate($user->date_in);
            if ($this->Users->saveOrFail($user)) {
                $users = $this->Users->find()->enableHydration(false)->all()->toArray();
                return $this->renderToJson(json_encode($users));
            }
        }
    }

    /**
     * @param null $id
     * @return TypeFinitionController|\Cake\Http\Response
     * @throws \Exception
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $type_finition = $this->Users->get($id);
        $type_finition->date_out = (new \DateTime())->format('Y-m-d H:m:s');
        if ($this->Users->save($type_finition)) {
            $type_finitions = $this->Users->find('OrderByActivate')->toArray();
            return $this->renderToJson(json_encode($type_finitions));
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
        $type_finition = $this->Users->get($id);
        $type_finition->date_out = null;
        if ($this->Users->save($type_finition)) {
            $type_finitions = $this->Users->find('OrderByActivate')->toArray();
            return $this->renderToJson(json_encode($type_finitions));
        } else {
            return $this->response->withStatus(400);
        }
    }

    public function login()
    {
        $this->viewBuilder()->setLayout('login');

        if ($this->request->is('post')) {

            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Auth->setUser($this->Users->get($this->Auth->user('id'),['contain' => ['Profil' => ['Droit' => ['ApplicationModule']]]]));

                return $this->renderToJson(json_encode($user));
            }
            else {
                return $this->renderToJson(json_encode([]),500);
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

}
