<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Validation\Validation;


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
            ->uploadedFile('img', [
                'types' => ['image/png'], // only PNG image files
                'minSize' => 1024, // Min 1 KB
                'maxSize' => 1024 * 1024 // Max 1 MB
            ])
            ->add('img', 'minSize', [
                'rule' => ['imageSize', [
                     // Min 10x10 pixel
                    'width' => [Validation::COMPARE_GREATER_OR_EQUAL, 100],
                    'height' => [Validation::COMPARE_GREATER_OR_EQUAL, 100],
                ]]
            ])
            ->add('img', 'maxSize', [
                'rule' => ['imageSize', [
                    // Max 100x100 pixel
                    'width' => [Validation::COMPARE_LESS_OR_EQUAL, 800],
                    'height' => [Validation::COMPARE_LESS_OR_EQUAL, 800],
                ]]
            ])
            ->add('img', 'extension', [
                'rule' => ['extension', ['png','jpg','jpeg']]
            ]);
        $validator
            ->maxLength('description',40);
            ;
        $validator
            ->maxLength('location',40);
            ;
        return $validator;
    }
}
