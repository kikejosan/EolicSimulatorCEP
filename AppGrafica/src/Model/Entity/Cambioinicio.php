<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cambioinicio Entity
 *
 * @property int $id
 * @property int $a1.systemNumber
 * @property int $a2.systemNumber
 * @property int $a3.systemNumber
 * @property int $a4.systemNumber
 * @property int $a5.systemNumber
 * @property int $a6.systemNumber
 */
class Cambioinicio extends Entity
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
        'a1.systemNumber' => true,
        'a2.systemNumber' => true,
        'a3.systemNumber' => true,
        'a4.systemNumber' => true,
        'a5.systemNumber' => true,
        'a6.systemNumber' => true
    ];
}
