<?php
namespace App\Controller;

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
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $users = $this->Users->find()->enableHydration(false)->all()->toArray();
                return $this->renderToJson(json_encode($users));
            }
            return $this->response->withStatus(400);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Users id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $users = $this->Users->findAll()->enableHydration(false)->all()->toArray();
            return $this->renderToJson(json_encode($users));
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
                $this->response->withStatus(201);
            }
            else {
                $this->response->withStatus(404);
            }
        }
    }
}
