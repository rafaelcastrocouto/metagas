<?php
declare(strict_types=1);

namespace App\Controller;

use Authorization\Exception\ForbiddenException;
use Cake\Event\EventInterface;

/**
 * Relatorios Controller
 *
 * @property \App\Model\Table\RelatoriosTable $Relatorios
 * @method \App\Model\Entity\Relatorio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RelatoriosController extends AppController
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
        $relatorios = $this->paginate($this->Relatorios->find('all', [
            'contain' => ['Users'],
        ]));
        $this->set(compact('relatorios'));
    }

    /**
     * View method
     *
     * @param string|null $id Relatorio id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $relatorio = $this->Relatorios->get($id);

        $this->set(compact('relatorio'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $relatorio = $this->Relatorios->newEmptyEntity();
        if ($this->request->is('post')) {
            $relatorio = $this->Relatorios->patchEntity($relatorio, $this->request->getData());
            
            if (!$relatorio->user_id) { 
                $user = $this->Authentication->getIdentity();
                $relatorio->user_id = $user->get('id'); 
            }
            
            if ($this->Relatorios->save($relatorio)) {
                $this->Flash->success(__('The relatorio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The relatorio could not be saved. Please, try again.'));
        }
        $instituicoes = $this->Relatorios->Instituicoes->find('list');
        $this->set(compact('relatorio', 'instituicoes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Relatorio id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $relatorio = $this->Relatorios->get($id, [
            'contain' => ['Instituicoes'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relatorio = $this->Relatorios->patchEntity($relatorio, $this->request->getData());
            if ($this->Relatorios->save($relatorio)) {
                $this->Flash->success(__('The relatorio has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The relatorio could not be saved. Please, try again.'));
        }
        $instituicoes = $this->Relatorios->Instituicoes->find('list');
        $this->set(compact('relatorio', 'instituicoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Relatorio id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $relatorio = $this->Relatorios->get($id);
        if ($this->Relatorios->delete($relatorio)) {
            $this->Flash->success(__('The relatorio has been deleted.'));
        } else {
            $this->Flash->error(__('The relatorio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
