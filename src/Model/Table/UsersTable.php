<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validation;
use Cake\Validation\Validator;


class UsersTable extends Table {

    public function initialize(array $config) : void {
        parent::initialize($config);

        //pour created et modified
        $this->addBehavior('Timestamp');

        $this->hasMany('Posts', ['foreign_key' => 'user_id']);
    }

    public function validationDefault(Validator $validator) : Validator {
        $validator
            ->notEmptyString('username')
            ->maxLength('username',50);

        $validator
            ->notEmptyString('email')
            ->maxLength('email',80)
            ->requirePresence('email')
            ->add('email', 'validFormat', [
                'rule' => 'email',
                'message' => 'L\'email doit être valide'
            ]);

        $validator
            ->scalar('password')
            ->maxLength('password',200)
            ->notEmptyString('password')
            ->requirePresence('password','create');

        $validator
            ->sameAs('retype_password','password','Les 2 champs ne correspondent pas');

        $validator
            ->uploadedFile('profilphoto', [
                'types' => ['image/png'], // only PNG image files
                'minSize' => 1024, // Min 1 KB
                'maxSize' => 1024 * 1024 // Max 1 MB
            ])
            ->add('profilphoto', 'minSize', [
                'rule' => ['imageSize', [
                     // Min 100x100 pixel
                    'width' => [Validation::COMPARE_GREATER_OR_EQUAL, 100],
                    'height' => [Validation::COMPARE_GREATER_OR_EQUAL, 100],
                ]]
            ])
            ->add('profilphoto', 'maxSize', [
                'rule' => ['imageSize', [
                    // Max 800x800 pixel
                    'width' => [Validation::COMPARE_LESS_OR_EQUAL, 800],
                    'height' => [Validation::COMPARE_LESS_OR_EQUAL, 800],
                ]]
            ])
            ->add('profilphoto', 'extension', [
                'rule' => ['extension', ['png','jpg','jpeg']]
            ]);

        return $validator;
    }
}
