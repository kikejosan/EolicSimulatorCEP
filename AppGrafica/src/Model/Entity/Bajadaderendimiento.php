<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bajadaderendimiento Entity
 *
 * @property int $id
 * @property int $systemNumber1
 * @property float $media1
 * @property \Cake\I18n\FrozenDate $fecha1
 * @property float $viento1
 * @property int $systemNumber2
 * @property float $media2
 * @property \Cake\I18n\FrozenDate $fecha2
 * @property float $viento2
 */
class Bajadaderendimiento extends Entity
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
        'systemNumber1' => true,
        'media1' => true,
        'fecha1' => true,
        'viento1' => true,
        'systemNumber2' => true,
        'media2' => true,
        'fecha2' => true,
        'viento2' => true
    ];
}
