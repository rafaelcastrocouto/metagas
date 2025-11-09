<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\Exception\ForbiddenException;
use Cake\Event\EventInterface;

/**
 * AbastecimentoGNVs Controller
 *
 * @property \App\Model\Table\AbastecimentoGNVsTable $AbastecimentoGNVs
 * @method \App\Model\Entity\AbastecimentoGNV[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AbastecimentoGNVsController extends AppController
{
    /**
     * beforeFilter method
     */
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $abastecimentoGNVs = $this->paginate($this->AbastecimentoGNVs->find('all', [
            'contain' => ['Users'],
        ]));
        $this->set(compact('abastecimentoGNVs'));
    }

    /**
     * View method
     *
     * @param string|null $id AbastecimentoGNV id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $abastecimentoGNV = $this->AbastecimentoGNVs->get($id);

        $this->set(compact('abastecimentoGNV'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $abastecimentoGNV = $this->AbastecimentoGNVs->newEmptyEntity();
        if ($this->request->is('post')) {
            $abastecimentoGNV = $this->AbastecimentoGNVs->patchEntity($abastecimentoGNV, $this->request->getData());
            
            if (!$abastecimentoGNV->user_id) { 
                $user = $this->Authentication->getIdentity();
                $abastecimentoGNV->user_id = $user->get('id'); 
            }
            
            if ($this->AbastecimentoGNVs->save($abastecimentoGNV)) {
                $this->Flash->success(__('The abastecimentoGNV has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The abastecimentoGNV could not be saved. Please, try again.'));
        }
        $instituicoes = $this->AbastecimentoGNVs->Instituicoes->find('list');
        $this->set(compact('abastecimentoGNV', 'instituicoes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id AbastecimentoGNV id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $abastecimentoGNV = $this->AbastecimentoGNVs->get($id, [
            'contain' => ['Instituicoes'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $abastecimentoGNV = $this->AbastecimentoGNVs->patchEntity($abastecimentoGNV, $this->request->getData());
            if ($this->AbastecimentoGNVs->save($abastecimentoGNV)) {
                $this->Flash->success(__('The abastecimentoGNV has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The abastecimentoGNV could not be saved. Please, try again.'));
        }
        $instituicoes = $this->AbastecimentoGNVs->Instituicoes->find('list');
        $this->set(compact('abastecimentoGNV', 'instituicoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id AbastecimentoGNV id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $abastecimentoGNV = $this->AbastecimentoGNVs->get($id);
        if ($this->AbastecimentoGNVs->delete($abastecimentoGNV)) {
            $this->Flash->success(__('The abastecimentoGNV has been deleted.'));
        } else {
            $this->Flash->error(__('The abastecimentoGNV could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
