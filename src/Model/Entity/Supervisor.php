<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Supervisor Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $nome
 * @property string $cpf
 * @property string $endereco
 * @property string $celular
 * @property string $observacoes
 *
 * @property \App\Model\Entity\Estagiario[] $estagiarios
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Instituicao[] $instituicao
 */
class Supervisor extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected array $_accessible = [
        'user_id' => true,
        'nome' => true,
        'cpf' => true,
        'endereco' => true,
        'celular' => true,
        'observacoes' => true
    ];
}
