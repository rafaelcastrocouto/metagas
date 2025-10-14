<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Instituicao $instituicao
 */
?>
<div>
    <div class="column">
        <div class="instituicoes view content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Instituições'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Html->link(__('Editar Instituição'), ['action' => 'edit', $instituicao->id], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(__('Deletar Instituição'), ['action' => 'delete', $instituicao->id], ['confirm' => __('Are you sure you want to delete {0}?', $instituicao->instituicao), 'class' => 'button']) ?>
                    <?= $this->Html->link(__('Nova Instituição'), ['action' => 'add'], ['class' => 'button']) ?>
                </div>
            </aside>
            <h3>instituicao_<?= h($instituicao->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($instituicao->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= $instituicao->nome ?></td>
                </tr>
                <tr>
                    <th><?= __('CNPJ') ?></th>
                    <td><?= h($instituicao->cnpj) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= $instituicao->email ? $this->Text->autoLinkEmails($instituicao->email) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= $instituicao->url ? $this->Html->link($instituicao->url) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Endereco') ?></th>
                    <td><?= h($instituicao->endereco . ' - ' . $instituicao->bairro . ' - ' .  $instituicao->municipio . ' - ' . $instituicao->cep ) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone') ?></th>
                    <td><?= h($instituicao->telefone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Observacoes') ?></th>
                    <td><?= h($instituicao->observacoes) ?></td>
                </tr>
            </table>
    	</div>
    </div>
</div>
