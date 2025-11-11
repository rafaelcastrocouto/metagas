<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Abastecimento $abastecimento
 */

declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'supervisor_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }
?>
<div>
    <div class="column">
        <div class="abastecimentos form content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Abastecimentos'), ['action' => 'index'], ['class' => 'button']) ?>
                    <?= $this->Form->postLink(
                        __('Deletar'),
                        ['action' => 'delete', $abastecimento->id],
                        ['confirm' => __('Tem certeza que deseja deletar o abastecimento {0}?', $abastecimento->nome), 'class' => 'button']
                    ) ?>
                </div>
            </aside>
            <?= $this->Form->create($abastecimento) ?>
            <fieldset>
                <h3><?= __('Editando abastecimento_') . $abastecimento->id ?></h3>
                <?php
                    echo $this->Form->control('nome');
                    echo $this->Form->control('cpf');
                    echo $this->Form->control('email');
                    echo $this->Form->control('endereco');
                    echo $this->Form->control('celular');
                    echo $this->Form->control('observacoes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Editar'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
