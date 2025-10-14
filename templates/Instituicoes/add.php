<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Instituicao $instituicao
 */
?>
<div>
    <div class="column">
        <div class="instituicoes form content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Instituicoes'), ['action' => 'index'], ['class' => 'button']) ?>
                </div>
            </aside>
            <?= $this->Form->create($instituicao) ?>
            <fieldset>
                <h3><?= __('Adicionar Instituicao') ?></h3>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('cnpj');
                    echo $this->Form->control('email');
                    echo $this->Form->control('url');
                    echo $this->Form->control('endereco');
                    echo $this->Form->control('telefone');
                    echo $this->Form->control('observacoes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
