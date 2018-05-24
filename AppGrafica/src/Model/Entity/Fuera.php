<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fuera Entity
 *
 * @property int $id
 * @property int $systemNumber
 * @property int $vecesFuera
 * @property float $viento
 * @property float $media
 * @property float $desviacion
 * @property \Cake\I18n\FrozenDate $fecha
 */
class Fuera extends Entity
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
        'vecesFuera' => true,
        'viento' => true,
        'media' => true,
        'desviacion' => true,
        'fecha' => true
    ];
}
