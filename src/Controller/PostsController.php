<?php

namespace App\Controller;

class PostsController extends AppController
{
    public function index()
    {
        $posts = $this->Posts->find('all')
            ->contain(['Users']);
        $this->set(compact('posts'));
    }

    public function view($id = null)
    {

        if(empty($id))
            return $this->redirect([
                'controller' => 'Posts',
                'action' => 'index'
            ]);

        $post = $this->Posts->find()
            ->where(['Post.id' => $id]);

        $this->set(['post' => $post]);


        if( $post->isEmpty() ) :
            $this->Flash->error('Publication introuvable');
            return $this->redirect(['action' => 'index']);
        endif;

        $this->set(['post' =>$post->first()]);
    }

    public function add()
    {
        // on crée une entité vide
        $add = $this->Posts->newEmptyEntity();

        //si on est en method POST (formulaire soumis)
        if ($this->request->is('post','put')) {
            //on récupère les données du formulaire
            $add = $this->Posts->patchEntity($add, $this->request->getData());
            $username = $this->request->getAttribute('identity')->username;
            $count = 0;

            $image = $this->request->getData('image');

            $ext = pathinfo($image->getClientFilename(), PATHINFO_EXTENSION);

            $name = $username.'-'.time().$count.'.'.$ext ;

            $image->moveTo(WWW_ROOT.'img/'.$name);

            $add->img = $name;

            $add->user_id = $this->request->getAttribute('identity')->id;

            //on sauvegarde en base
            if ($this->Posts->save($add)) {
                //on redirige vers la page d'accueil
                $this->Flash->success('Publication ajoutée');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Erreur lors de l\'ajout du post');
        }
        // on lui attribue les données reçues
        $this->set(compact('add'));

    }
}
