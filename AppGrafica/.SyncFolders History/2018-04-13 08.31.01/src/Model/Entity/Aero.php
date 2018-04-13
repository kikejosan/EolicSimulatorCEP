<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Aero Entity
 *
 * @property int $id
 * @property int $SystemNumber
 * @property int $fila
 * @property int $columna
 * @property string $idIngeboards
 */
class Aero extends Entity
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
        'SystemNumber' => true,
        'fila' => true,
        'columna' => true,
        'idIngeboards' => true
    ];
}
