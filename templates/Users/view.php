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
                        <?= $this->Form->postLink(__('Deletar Usuário'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete {0}?', $user->email), 'class' => 'button']) ?>
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
                    <th><?= __('Email') ?></th>
                    <td><?= $user->email ? $this->Text->autoLinkEmails($user->email) : '' ?></td>
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
                <h4><?= __('Related Administrador') ?></h4>
                <div class="table_wrap">
                    <table>
                        <tr>
                            <th class="actions"><?= __('Actions') ?></th>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                        </tr>
                        <tr>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'administradores', 'action' => 'view', $user->administrador->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'administradores', 'action' => 'edit', $user->administrador->id]) ?>
                                <?= $this->Form->postLink(__('Deletar'), ['controller' => 'administradores', 'action' => 'delete', $user->administrador->id], ['confirm' => __('Are you sure you want to delete administrador_{0}?', $user->administrador->id)]) ?>
                            </td>
                            <td><?= $this->Html->link((string)$user->administrador->id, ['controller' => 'administradores', 'action' => 'view', $user->administrador->id]) ?></td>
                            <td><?= h($user->administrador->nome) ?></td>
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
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Celular') ?></th>
                        </tr>
                        <tr>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'operadores', 'action' => 'view', $user->operador->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'operadores', 'action' => 'edit', $user->operador->id]) ?>
                                <?= $this->Form->postLink(__('Deletar'), ['controller' => 'operadores', 'action' => 'delete', $user->operador->id], ['confirm' => __('Are you sure you want to delete operador {0}?', $user->operador->id)]) ?>
                            </td>
                            <td><?= $this->Html->link((string)$user->operador->id, ['controller' => 'operadores', 'action' => 'view', $user->operador->id]) ?></td>
                            <td><?= $this->Html->link(h($user->operador->nome), ['action' => 'view', $user->operador->id]) ?></td>
                            <td><?= $user->operador->celular ? h($user->operador->celular) : '' ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php else: ?>
                <p><?= $this->Html->link('Adicionar operador', ['controller' => 'operadores', 'action' => 'add'], ['class' => 'button btn-info']) ?></p>
            <?php endif; ?>
            

            <?php if (!empty($user->supervisor)) : ?>
            <div class="related">
                <h4><?= __('Supervisor') ?></h4>
                <div class="table_wrap">
                    <table>
                        <tr>
                            <th class="actions"><?= __('Actions') ?></th>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Nome') ?></th>
                            <th><?= __('Cpf') ?></th>
                            <th><?= __('Escola') ?></th>
                            <th><?= __('Ano de formatura') ?></th>
                        </tr>
                        <tr>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'supervisores', 'action' => 'view', $user->supervisor->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'supervisores', 'action' => 'edit', $user->supervisor->id]) ?>
                                <?= $this->Form->postLink(__('Deletar'), ['controller' => 'supervisores', 'action' => 'delete', $user->supervisor->id], ['confirm' => __('Are you sure you want to delete supervisor_{0}?', $user->supervisor->id)]) ?>
                            </td>
                            <td><?= $this->Html->link((string)$user->supervisor->id, ['action' => 'view', $user->supervisor->id]) ?></td>
                            <td><?= $this->Html->link($user->supervisor->nome, ['action' => 'view', $user->supervisor->id]) ?></td>
                            <td><?= h($user->supervisor->cpf) ?></td>
                            <td><?= h($user->supervisor->escola) ?></td>
                            <td><?= h($user->supervisor->ano_formatura) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php else: ?>
                <p><?= $this->Html->link('Adicionar supervisor', ['controller' => 'supervisores', 'action' => 'add'], ['class' => 'button btn-info']) ?></p>
            <?php endif; ?>
            
        </div>
    </div>
</div>
