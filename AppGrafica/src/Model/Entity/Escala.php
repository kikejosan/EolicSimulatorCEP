<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Escala Entity
 *
 * @property int $id
 * @property int $systemNumber
 * @property int $posicion
 * @property int $fecha
 */
class Escala extends Entity
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
        'posicion' => true,
        'fecha' => true
    ];
}
