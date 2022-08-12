<?php //src/Controller/UsersController.php
namespace App\Controller;


class UsersController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // //autorise à l'acces à login de CE controller sans être connecté
        $this->Authentication->addUnauthenticatedActions(['login','signup']);
    }

    public function view($id = null)
    {
        $user = $this->Users
            ->find()
            ->where(['Users.id'=>$id]);

        $this->set(['user'=>$user]);

        if($user->isEmpty()) :
            $this->Flash->error('Utilisateur introuvable');
            return $this->redirect([
                'controller' => 'Posts',
                'action' => 'index'
            ]);
        endif;

        $this->set(['user' =>$user->first()]);

    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Posts',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Identifiants introuvables'));
        }
    }

    public function logout()
    {
        //on recup la session en cours
        $log = $this->Authentication->getResult();
        //si cette session est valide
        if($log->isValid()){
            //on déconnecte
            $this->Authentication->logout();
            //sucess
            $this->Flash->success('Vous êtes déconnecté');
        }

        //on redirige vers la page d'accueil
        return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
    }

    public function signup()
    {
        //entité vide
        $user = $this->Users->newEmptyEntity();

        //si on récup un formulaire
        if ($this->request->is('post','put')) {
            //on met les données dans l'entité
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $username = $this->request->getData('username');
            $count = 0;


                $image = $this->request->getData('image');

                $ext = pathinfo($image->getClientFilename(), PATHINFO_EXTENSION);

                $name = $username.'-'.time().$count.'.'.$ext ;

                $image->moveTo(WWW_ROOT.'img/'.$name);

                $user->profilphoto = $name;


            //si on peut sauvegarder
            if ($this->Users->save($user)) {
                //success
                $this->Flash->success('Votre compte a été enregistrée');
                //redirection
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            //sinon
            //error
            $this->Flash->error('Création de compte impossible');
            }

            //transmet à la vue
            $this->set(['user'=> $user]);
    }

    public function edit($id=null)
    {
        if(empty($id))
            return $this->redirect(['action'=>'index']);

        $user = $this->Users->find()->where(['id'=>$id]);

        if($user->isEmpty()) :
            $this->Flash->error('Utilisateur introuvable');
            return $this->redirect(['action'=>'index']);
        endif;
            $user = $user->first();

        //si on a reçu le form (similaire à l'ajout, changement pour la redirection et les methodes valides)
        if ($this->request->is(['post','patch','put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $count = 0;

            $image = $this->request->getData('image');

            $ext = pathinfo($image->getClientFilename(), PATHINFO_EXTENSION);

            $name = time().$count.'.'.$ext ;

            $image->moveTo(WWW_ROOT.'img/'.$name);

            $user->profilphoto = $name;



            if ($this->Users->save($user)) {
                $this->Flash->success('Utilisateur modifiée');
                return $this->redirect(['action' => 'view',$id]);
            }
            $this->Flash->error('Erreur lors de la modification du profil');
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        if(empty($id))
            return $this->redirect(['action'=>'index']);
            $user = $this->Users->find()->where(['id'=>$id]);
        if($user->isEmpty()) :
            $this->Flash->error('Utilisateur introuvable');
            return $this->redirect(['action'=>'index']);
        endif;
            $user = $user->first();
        //si on est en method POST (formulaire soumis) ou delete
        if ($this->request->is(['post', 'delete'])) {
            if ($this->Users->delete($user)) {

            $log = $this->Authentication->getResult();

                if($log->isValid()){

                    $this->Authentication->logout();
                }

                $this->Flash->success('Utilisateur supprimée');
                return $this->redirect([
                    'controller' => 'Users',
                    'action' => 'signup'
                ]);
            }

            $this->Flash->error('Erreur lors de la suppression de l\'utilisateur');
        }
    }
}
