<?php

namespace App\Controller;

class PostsController extends AppController
{
    public function index()
    {
        $posts = $this->Posts->find('all')
            ->contain(['Users'])
            ->order(['Posts.created' => 'DESC']);
        $this->set(compact('posts'));
    }

    public function view($id = null)
    {
        $post = $this->Posts
            ->find()
            ->where(['Posts.id' => $id])
            ->contain(['Users']);

        $this->set(['post' => $post]);

        if( $post->isEmpty() ) :
            $this->Flash->error('La publication est vide');
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

    public function edit($id = null)
    {
    if(empty($id))
        return $this->redirect(['action'=>'index']);

    $post = $this->Posts->find()->where(['id'=>$id]);

    if($post->isEmpty()) :
        $this->Flash->error('Publication introuvable');
        return $this->redirect(['action'=>'index']);
    endif;
        $post = $post->first();

    //si on a reçu le form (similaire à l'ajout, changement pour la redirection et les methodes valides)
    if ($this->request->is(['post','patch','put'])) {
        $post = $this->Posts->patchEntity($post, $this->request->getData());

        if ($this->Posts->save($post)) {
            $this->Flash->success('Information(s) de la publication modifiée(s)');
            return $this->redirect(['action' => 'view',$id]);
        }
        $this->Flash->error('Erreur lors de la modification de la publication');
    }
    $this->set(compact('post'));
    }

    public function delete($id = null)
    {
        if(empty($id))
            return $this->redirect(['action'=>'index']);
            $post = $this->Posts->find()->where(['id'=>$id]);
        if($post->isEmpty()) :
            $this->Flash->error('Publication introuvable');
            return $this->redirect(['action'=>'index']);
        endif;
            $post = $post->first();
        //si on est en method POST (formulaire soumis) ou delete
        if ($this->request->is(['post', 'delete'])) {
            if ($this->Posts->delete($post)) {
                //si chanson supprimée
                $this->Flash->success('Publication supprimée');
                return $this->redirect(['action' => 'index']);
            }
            //si chanson non supprimée
            $this->Flash->error('Erreur lors de la suppression de la publication');

    }
    }
}
