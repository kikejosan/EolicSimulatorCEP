<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transicion Entity
 *
 * @property int $id
 * @property int $systemNumber
 * @property int $posicionInicio
 * @property int $posicionFin
 * @property int $variacion
 * @property \Cake\I18n\FrozenDate $inicio
 * @property \Cake\I18n\FrozenDate $fin
 */
class Transicion extends Entity
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
        'posicionInicio' => true,
        'posicionFin' => true,
        'variacion' => true,
        'inicio' => true,
        'fin' => true,
        'variacionR' => true,
        'variacionPR' =>true
    ];
}
