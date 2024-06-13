<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProductOuts Controller
 *
 * @property \App\Model\Table\ProductOutsTable $ProductOuts
 * @method \App\Model\Entity\ProductOut[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductOutsController extends AppController
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
        $productOuts = $this->paginate($this->ProductOuts);

        $this->set(compact('productOuts'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Out id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productOut = $this->ProductOuts->get($id, [
            'contain' => ['Products'],
        ]);

        $this->set(compact('productOut'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productOut = $this->ProductOuts->newEmptyEntity();
        if ($this->request->is('post')) {
            $param = $this->request->getData();
            // dd($param);
            $productsTable = $this->getTableLocator()->get('Products');
            $product = $productsTable->get($param['product_id']);
            // dd($product);
            if((int)$product->stock < (int)$param['stock']){
                $this->Flash->error(__('Stock tidak mencukupi.'));

                return $this->redirect(['action' => 'add']);
            }
            $productOut = $this->ProductOuts->patchEntity($productOut, $this->request->getData());
            if ($this->ProductOuts->save($productOut)) {

               
                $product->stock = $product->stock - $param['stock'];
                if($productsTable->save($product)){
                    // $this->Flash->error(__('Update Product gagal.'));
                }

                $this->Flash->success(__('The product out has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product out could not be saved. Please, try again.'));
        }
        $products = $this->ProductOuts->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('productOut', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Out id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productOut = $this->ProductOuts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productOut = $this->ProductOuts->patchEntity($productOut, $this->request->getData());
            if ($this->ProductOuts->save($productOut)) {
                $this->Flash->success(__('The product out has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product out could not be saved. Please, try again.'));
        }
        $products = $this->ProductOuts->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('productOut', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Out id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productOut = $this->ProductOuts->get($id);
        if ($this->ProductOuts->delete($productOut)) {
            $this->Flash->success(__('The product out has been deleted.'));
        } else {
            $this->Flash->error(__('The product out could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
