<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * IncomingProducts Controller
 *
 * @property \App\Model\Table\IncomingProductsTable $IncomingProducts
 * @method \App\Model\Entity\IncomingProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IncomingProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products'],
        ];
        $incomingProducts = $this->paginate($this->IncomingProducts);

        $this->set(compact('incomingProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Incoming Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $incomingProduct = $this->IncomingProducts->get($id, [
            'contain' => ['Products'],
        ]);

        $this->set(compact('incomingProduct'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $incomingProduct = $this->IncomingProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $param = $this->request->getData();
            $incomingProduct = $this->IncomingProducts->patchEntity($incomingProduct, $this->request->getData());
            if ($this->IncomingProducts->save($incomingProduct)) {

                // update product stock
                $productsTable = $this->getTableLocator()->get('Products');
                $product = $productsTable->get($param['product_id']);
                $product->stock = $product->stock + $param['stock'];
                if($productsTable->save($product)){
                    // $this->Flash->error(__('Update Product gagal.'));
                }
                $this->Flash->success(__('The incoming product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The incoming product could not be saved. Please, try again.'));
        }
        $products = $this->IncomingProducts->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('incomingProduct', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Incoming Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $incomingProduct = $this->IncomingProducts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $incomingProduct = $this->IncomingProducts->patchEntity($incomingProduct, $this->request->getData());
            if ($this->IncomingProducts->save($incomingProduct)) {
                $this->Flash->success(__('The incoming product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The incoming product could not be saved. Please, try again.'));
        }
        $products = $this->IncomingProducts->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('incomingProduct', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Incoming Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $incomingProduct = $this->IncomingProducts->get($id);
        if ($this->IncomingProducts->delete($incomingProduct)) {
            $this->Flash->success(__('The incoming product has been deleted.'));
        } else {
            $this->Flash->error(__('The incoming product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
