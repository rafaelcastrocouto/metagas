<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Operador $relatorio
 */

declare(strict_types=1);

$user_data = ['administrador_id'=>0,'operador_id'=>0,'supervisor_id'=>0];
$user_session = $this->request->getAttribute('identity');
if ($user_session) { $user_data = $user_session->getOriginalData(); }

?>
<div>
    <div class="column">
        <div class="relatorios add content">
            <aside>
                <div class="nav">
                    <?= $this->Html->link(__('Listar Relatorios'), ['action' => 'index'], ['class' => 'button']) ?>
                </div>
            </aside>
            <?= $this->Form->create($relatorio) ?>
            <fieldset>
                <h3><?= __('Adicionando Relatorio') ?></h3>
                <?php
                    echo $this->Form->control('user_id', ['type' => 'number', 'value' => $user_session->get('id'), 'hidden' => !$user_data['administrador_id'] ]);
                    echo $this->Form->control('instituicao_id', ['options' => $instituicoes, 'class' => 'form-control']);
                    echo $this->Form->control('data');
                    echo $this->Form->control('ch4_media_biogas');
                    echo $this->Form->control('co2_media_biogas');
                    echo $this->Form->control('o2_media_biogas');
                    echo $this->Form->control('ch4_media_metano');
                    echo $this->Form->control('co2_media_metano');
                    echo $this->Form->control('o2_media_metano');
                    echo $this->Form->control('n2_media_metano');
                    echo $this->Form->control('volume_biogas_dia');
                    echo $this->Form->control('volume_biogas_mes');
                    echo $this->Form->control('consumo_clientes');
                    echo $this->Form->control('dispenser');
                    echo $this->Form->control('energia');
                    echo $this->Form->control('densidade');
                    echo $this->Form->control('status');
                    echo $this->Form->control('observacoes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Adicionar Relatorio'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
