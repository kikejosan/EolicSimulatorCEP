<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Windeventr Entity
 *
 * @property int $id
 * @property float $power
 * @property int $systemNumber
 * @property float $media
 * @property float $desviacion
 * @property float $windSpeed
 * @property float $viento
 * @property int $veces
 */
class Windeventr extends Entity
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
        'power' => true,
        'systemNumber' => true,
        'media' => true,
        'desviacion' => true,
        'windSpeed' => true,
        'viento' => true,
        'veces' => true
    ];
}
