<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int|null $user_id
 * @property string $title
 * @property string $author
 * @property string|null $description
 * @property int|null $quantity
 * @property string|null $status
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Borrow[] $borrows
 */
class Book extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'category_id' => true,
        'user_id' => true,
        'title' => true,
        'author' => true,
        'description' => true,
        'quantity' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
        'user' => true,
        'borrows' => true,
    ];
}
