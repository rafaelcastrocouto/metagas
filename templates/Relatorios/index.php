<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Relatorio[]|\Cake\Collection\CollectionInterface $relatorios
 */
?>
<div class="relatorios index content">
    
    <?= $this->Html->link(__('Novo Relatorio'), ['action' => 'add'], ['class' => 'button']) ?>
    
    <h3><?= __('Lista de Relatorios') ?></h3>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
    </div>
    <div>
        <span id="clientes" class="hidden"><?= h(json_encode($clientes->toArray())) ?></span>
        <table>
            <thead>
                <tr>
                    <th class="actions"><?= __('Ações') ?></th>
                    <!-- <th><?= $this->Paginator->sort('id') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('user_id') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('instituicao_id') ?></th> -->
                    <th><?= $this->Paginator->sort('data') ?></th>
                    <th><?= $this->Paginator->sort('ch4_media_biogas') ?></th>
                    <th><?= $this->Paginator->sort('co2_media_biogas') ?></th>
                    <th><?= $this->Paginator->sort('o2_media_biogas') ?></th>
                    <th><?= $this->Paginator->sort('ch4_media_metano') ?></th>
                    <th><?= $this->Paginator->sort('co2_media_metano') ?></th>
                    <th><?= $this->Paginator->sort('o2_media_metano') ?></th>
                    <th><?= $this->Paginator->sort('n2_media_metano') ?></th>
                    <th><?= $this->Paginator->sort('volume_biogas_dia') ?></th>
                    <th><?= $this->Paginator->sort('volume_biogas_mes') ?></th>
                    <th><?= $this->Paginator->sort('consumo_clientes') ?></th>
                    <th><?= $this->Paginator->sort('dispenser') ?></th>
                    <th><?= $this->Paginator->sort('energia') ?></th>
                    <th><?= $this->Paginator->sort('densidade') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('observacoes') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($relatorios as $relatorio): ?>
                <tr>
                    <td class="actions">
                        <?= $this->Html->link(__('🔍'), ['action' => 'view', $relatorio->id]) ?>
                        <?= $this->Html->link(__('✏️'), ['action' => 'edit', $relatorio->id]) ?>
                        <?= $this->Form->postLink(__('❌'), ['action' => 'delete', $relatorio->id], ['confirm' => __('Tem certeza que deseja deletar o relatorio {0}?', $relatorio->data)]) ?>
                    </td>
                    <!-- <td><?= $this->Html->link((string)$relatorio->id, ['action' => 'view', $relatorio->id]) ?></td> -->
                    <!-- <td><?= $this->Html->link($relatorio->user->nome, ['controller' => 'users', 'action' => 'view', $relatorio->user->id]) ?></td> -->
                    <!-- <td><?= $this->Html->link($relatorio->instituicao->nome, ['controller' => 'instituicoes', 'action' => 'view', $relatorio->instituicao->id]) ?></td> -->
                    <td><?= h($relatorio->data) ?></td>
                    <td><?= h($relatorio->ch4_media_biogas) ?></td>
                    <td><?= h($relatorio->co2_media_biogas) ?></td>
                    <td><?= h($relatorio->o2_media_biogas) ?></td>
                    <td><?= h($relatorio->ch4_media_metano) ?></td>
                    <td><?= h($relatorio->co2_media_metano) ?></td>
                    <td><?= h($relatorio->o2_media_metano) ?></td>
                    <td><?= h($relatorio->n2_media_metano) ?></td>
                    <td><?= h($relatorio->volume_biogas_dia) ?></td>
                    <td><?= h($relatorio->volume_biogas_mes) ?></td>
                    <td>
                        <span class="consumo_parsed"></span>
                        <span class="consumo"><?= h($relatorio->consumo_clientes) ?></span>
                        <script>
                            (function () {
                                const clientes = document.querySelector('#clientes');
                                const clientesData = JSON.parse(clientes.textContent);
                                const parsedClients = {};
                                for (let key in clientesData) {
                                    parsedClients[clientesData[key].id] = clientesData[key];
                                }
                                const consumo = document.currentScript.previousElementSibling;
                                const consumoData = new Function('return {'+consumo.textContent+'}')();
                                let parsedText = [];
                                for (let clienteId in consumoData) {
                                    const link = '<a href="clientes/view/' + clienteId + '">' + parsedClients[clienteId].nome + '</a>';
                                    const text = link + ': ' + consumoData[clienteId];
                                    parsedText.push(text);
                                }
                                consumo.classList.add('hidden');
                                consumo.previousElementSibling.innerHTML = parsedText.join(', ');
                            })()
                        </script>
                    </td>
                    <td><?= h($relatorio->dispenser) ?></td>
                    <td><?= h($relatorio->energia) ?></td>
                    <td><?= h($relatorio->densidade) ?></td>
                    <td><?= h($relatorio->status) ?></td>
                    <td><?= h($relatorio->observacoes) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <?= $this->element('paginator'); ?>
        <?= $this->element('paginator_count'); ?>
    </div>
</div>
