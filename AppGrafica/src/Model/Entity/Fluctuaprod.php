<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fluctuaprod Entity
 *
 * @property int $id
 * @property int $aero1
 * @property int $subida1
 * @property int $aero2
 * @property int $subida2
 * @property int $aero3
 * @property int $subida3
 */
class Fluctuaprod extends Entity
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
        'aero1' => true,
        'subida1' => true,
        'aero2' => true,
        'subida2' => true,
        'aero3' => true,
        'subida3' => true
    ];
}
