<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'supervisor_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }
?>
<div>
    <div class="column-responsive column-80">
        <div class="users view content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Editar Email'), ['action' => 'edit', $user->id], ['class' => 'button']) ?>
                    <?= $this->Html->link(__('Editar Senha'), ['action' => 'editpassword', $user->id], ['class' => 'button']) ?>
                    
                    <?php if ($user_data['administrador_id']): ?>
                        <?= $this->Html->link(__('Listar Usuários'), ['action' => 'index'], ['class' => 'button']) ?>
                        <?= $this->Form->postLink(__('Deletar Usuário'), ['action' => 'delete', $user->id], ['confirm' => __('Tem certeza que deseja deletar o usuário {0}?', $user->email), 'class' => 'button']) ?>
                        <?= $this->Html->link(__('Novo Usuário'), ['action' => 'add'], ['class' => 'button']) ?>
                    <?php endif; ?>
                    
                </div>
            </aside>
            <h3>user_<?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($user->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= $user->email ? $this->Text->autoLinkEmails($user->email) : 'Erro: É necessário registrar um email' ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>

            <?php if (!empty($user->administrador)) : ?>
            <div class="related">
                <h4><?= __('Administrador') ?></h4>
                <div class="table_wrap">
                    <table>
                        <tr>
                            <th class="actions"><?= __('Actions') ?></th>
                            <th><?= __('Id') ?></th>
                        </tr>
                        <tr>
                            <td class="actions">
                                <?= $this->Html->link(__('🔍'), ['controller' => 'administradores', 'action' => 'view', $user->administrador->id]) ?>
                            </td>
                            <td><?= $this->Html->link((string)$user->administrador->id, ['controller' => 'administradores', 'action' => 'view', $user->administrador->id]) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php endif; ?>

            <?php if (!empty($user->operador)) : ?>
            <div class="related">
                <h4><?= __('Operador') ?></h4>
                <div class="table_wrap">
                    <table>
                        <tr>
                            <th class="actions"><?= __('Actions') ?></th>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Cpf') ?></th>
                            <th><?= __('Endereço') ?></th>
                            <th><?= __('Celular') ?></th>
                            <th><?= __('Observações') ?></th>
                        </tr>
                        <tr>
                            <td class="actions">
                                <?= $this->Html->link(__('🔍'), ['controller' => 'operadores', 'action' => 'view', $user->operador->id]) ?>
                                <?= $this->Html->link(__('✏️'), ['controller' => 'operadores', 'action' => 'edit', $user->operador->id]) ?>
                                <?= $this->Form->postLink(__('❌'), ['controller' => 'operadores', 'action' => 'delete', $user->operador->id], ['confirm' => __('Tem certeza que deseja deletar o operador {0}?', $user->operador->nome)]) ?>
                            </td>
                            <td><?= $this->Html->link((string)$user->operador->id, ['controller' => 'operadores', 'action' => 'view', $user->operador->id]) ?></td>
                            <td><?= h($user->operador->cpf) ?></td>
                            <td><?= h($user->operador->endereco) ?></td>
                            <td><?= h($user->operador->celular) ?></td>
                            <td><?= h($user->operador->observacoes) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php else: ?>
                <p><?= $this->Html->link('Adicionar Operador', ['controller' => 'operadores', 'action' => 'add'], ['class' => 'button btn-info']) ?></p>
            <?php endif; ?>
            

            <?php if (!empty($user->supervisor)) : ?>
            <div class="related">
                <h4><?= __('Supervisor') ?></h4>
                <div class="table_wrap">
                    <table>
                        <tr>
                            <th class="actions"><?= __('Actions') ?></th>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Cpf') ?></th>
                            <th><?= __('Endereço') ?></th>
                            <th><?= __('Celular') ?></th>
                            <th><?= __('Observações') ?></th>
                        </tr>
                        <tr>
                            <td class="actions">
                                <?= $this->Html->link(__('🔍'), ['controller' => 'supervisores', 'action' => 'view', $user->supervisor->id]) ?>
                                <?= $this->Html->link(__('✏️'), ['controller' => 'supervisores', 'action' => 'edit', $user->supervisor->id]) ?>
                                <?= $this->Form->postLink(__('❌'), ['controller' => 'supervisores', 'action' => 'delete', $user->supervisor->id], ['confirm' => __('Tem certeza que deseja deletar o supervisor {0}?', $user->supervisor->nome)]) ?>
                            </td>
                            <td><?= $this->Html->link((string)$user->supervisor->id, ['controller' => 'supervisores', 'action' => 'view', $user->supervisor->id]) ?></td>
                            <td><?= h($user->supervisor->cpf) ?></td>
                            <td><?= h($user->supervisor->endereco) ?></td>
                            <td><?= h($user->supervisor->celular) ?></td>
                            <td><?= h($user->supervisor->observacoes) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php else: ?>
                <p><?= $this->Html->link('Adicionar Supervisor', ['controller' => 'supervisores', 'action' => 'add'], ['class' => 'button btn-info']) ?></p>
            <?php endif; ?>
            
        </div>
    </div>
</div>
