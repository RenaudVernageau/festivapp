<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;


class PostsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        //pour created et modified
        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator) : Validator {
        $validator
            ->notEmptyString('varchar')
            ->maxLength('varchar',200)
            ;

        return $validator;
    }
}
