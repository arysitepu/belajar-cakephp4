<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Text;
use PDO;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function registration()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $param = $this->request->getData();
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->uuid = Text::uuid();
            $user->password = md5($param['password']);

            // dd($user);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registration success.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Not able to registration.'));
        }
        $this->set(compact('user'));
    }

    public function login()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post','get')) {
            $param = $this->request->getData();
            $password = $param['password'];
            $query = $this->Users->find()
            ->where([
                'email' => $param['email'],
                'password' => md5($password)
            ])
            ->first();
            // dd($query);

            if(empty($query)){
                $this->Flash->error(__('Login gagal.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->request->getSession()->write('Auth.User', $query);
            $this->Flash->success(__('Login success.'));

            return $this->redirect(['controller' => 'Products', 'action' => 'index']);
        }
        $this->set(compact('user'));
    }

    public function logout()
    {
        // Destroy the session
        $session = $this->request->getSession();
        $session->destroy();
        $this->Flash->success(__('Anda sudah keluar.'));
        return $this->redirect(['action' => 'login']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}