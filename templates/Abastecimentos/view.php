<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Abastecimento $abastecimento
 */
?>
<div>
    <div class="column">
        <div class="abastecimentos view content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Abastecimentos'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Html->link(__('Editar Abastecimento'), ['action' => 'edit', $abastecimento->id], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(__('Deletar Abastecimento'), ['action' => 'delete', $abastecimento->id], ['confirm' => __('Tem certeza que deseja deletar o abastecimento {0}?', $abastecimento->nome), 'class' => 'button']) ?>
                    <?= $this->Html->link(__('Novo Abastecimento'), ['action' => 'add'], ['class' => 'button']) ?>
                </div>
            </aside>
            <h3>abastecimento_<?= h($abastecimento->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Usuário') ?></th>
                    <td><?= $this->Html->link($abastecimento->user->nome, ['controller' => 'users', 'action' => 'view', $abastecimento->user->id]) ?></td>
                </tr>
                <tr>
                    <th><?= __('Controle') /* todo */ ?></th>
                    <td><?= h($abastecimento->controle) ?></td> 
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= ($abastecimento->email) ? $this->Text->autoLinkEmails($abastecimento->email) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Endereco') ?></th>
                    <td><?= h($abastecimento->endereco) ?></td>
                </tr>
                <tr>
                    <th><?= __('Celular') ?></th>
                    <td><?= h($abastecimento->celular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Observações') ?></th>
                    <td><?= h($abastecimento->observacoes) ?></td>
                </tr>
            </table>
        </div>            
    </div>
</div>
</div>
