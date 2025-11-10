<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div>
    <div class="column">
        <div class="clientes view content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Clientes'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Html->link(__('Editar Cliente'), ['action' => 'edit', $cliente->id], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(__('Deletar Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Tem certeza que deseja deletar o cliente {0}?', $cliente->nome), 'class' => 'button']) ?>
                    <?= $this->Html->link(__('Novo Cliente'), ['action' => 'add'], ['class' => 'button']) ?>
                </div>
            </aside>
            <h3>cliente_<?= h($cliente->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($cliente->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cpf') ?></th>
                    <td><?= h($cliente->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= ($cliente->email) ? $this->Text->autoLinkEmails($cliente->email) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Endereco') ?></th>
                    <td><?= h($cliente->endereco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Celular') ?></th>
                    <td><?= h($cliente->celular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Observações') ?></th>
                    <td><?= h($cliente->observacoes) ?></td>
                </tr>
            </table>
            
            <?php if (!empty($cliente->user)) : ?>
            <div class="related">
                <h4><?= __('User') ?></h4>
                <div class="table_wrap">
                    <table>
                        <tr>
                            <th class="actions"><?= __('Actions') ?></th>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Email') ?></th>
                        </tr>
                        <tr>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['controller' => 'Users', 'action' => 'view', $cliente->user->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['controller' => 'Users', 'action' => 'edit', $cliente->user->id]) ?>
                                <?= $this->Form->postLink(__('Deletar'), ['controller' => 'Users', 'action' => 'delete', $cliente->user->id], ['confirm' => __('Tem certeza que deseja deletar o usuário {0}?', $cliente->user->email)]) ?>
                            </td>
                            <td><?= h($cliente->user->id) ?></td>
                            <td><?= $cliente->user->email ? $this->Text->autoLinkEmails($cliente->user->email) : '' ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php endif; ?>
            
        </div>            
    </div>
</div>
</div>
