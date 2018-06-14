<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notificacion Entity
 *
 * @property int $id
 * @property string $tipo
 * @property int $systemNumber
 * @property \Cake\I18n\FrozenDate $fecha
 * @property int $campo1
 * @property int $campo2
 * @property float $campo3
 * @property float $campo4
 * @property float $campo5
 */
class Notificacion extends Entity
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
    protected $_accessible = [
        'tipo' => true,
        'estado' => true,
        'systemNumber' => true,
        'fecha' => true,
        'campo1' => true,
        'campo2' => true,
        'campo3' => true,
        'campo4' => true,
        'campo5' => true
    ];
}
