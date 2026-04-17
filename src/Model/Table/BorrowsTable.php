<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Borrows Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\BooksTable&\Cake\ORM\Association\BelongsTo $Books
 *
 * @method \App\Model\Entity\Borrow newEmptyEntity()
 * @method \App\Model\Entity\Borrow newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Borrow> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Borrow get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Borrow findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Borrow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Borrow> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Borrow|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Borrow saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Borrow>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Borrow>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Borrow>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Borrow> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Borrow>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Borrow>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Borrow>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Borrow> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BorrowsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('borrows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('book_id')
            ->notEmptyString('book_id');

        $validator
            ->date('borrow_date')
            ->requirePresence('borrow_date', 'create')
            ->notEmptyDate('borrow_date');

        $validator
            ->date('return_date')
            ->allowEmptyDate('return_date')
            ->add('return_date', 'custom', [
                'rule' => function ($value, $context) {
                    $borrowDate = $context['data']['borrow_date'] ?? null;

                    if (!$value || !$borrowDate) {
                        return true; 
                    }

                    return strtotime($value) > strtotime($borrowDate);
                },
                'message' => 'Ngày trả phải sau ngày mượn'
            ]);

        $validator
            ->scalar('status')
            ->allowEmptyString('status');

        

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['book_id'], 'Books'), ['errorField' => 'book_id']);

        return $rules;
    }
}
