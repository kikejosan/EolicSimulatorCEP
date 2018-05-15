<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rankingprod Entity
 *
 * @property int $id
 * @property int $systemNumber
 * @property \Cake\I18n\FrozenTime $time
 * @property float $suma
 * @property float $productividad
 * @property int $events
 * @property string $tipo
 * @property string $fecha
 */
class Rankingprod extends Entity
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
        'systemNumber' => true,
        'time' => true,
        'suma' => true,
        'productividad' => true,
        'events' => true,
        'tipo' => true,
        'fecha' => true
    ];
}
