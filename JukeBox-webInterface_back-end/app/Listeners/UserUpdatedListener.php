<?php

namespace App\Listeners;

use App\Events\UserUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class UserUpdatedListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Gère l'événement UserUpdated.
     *
     * @param  UserUpdated  $event
     * @return void
     */
    public function handle(UserUpdated $event)
    {
        $user = $event->user;

        // Vérifiez le type d'action (ajout, mise à jour ou suppression)
        if ($event->action === 'created') {
            // Action lorsqu'un utilisateur est ajouté
            $this->addUser($user);
        } elseif ($event->action === 'updated') {
            // Action lorsqu'un utilisateur est mis à jour
            $this->updateUser($user);
        } elseif ($event->action === 'deleted') {
            // Action lorsqu'un utilisateur est supprimé
            $this->deleteUser($user);
        }
    }

    protected function addUser(User $user)
    {
        // Logique pour ajouter un utilisateur
        User::create([
            'prenom' => $user->prenom,
            'nom' => $user->nom,
            'email' => $user->email,
            'password' => bcrypt($user->password),
        ]);
    }

    protected function updateUser(User $user)
    {
        // Logique pour mettre à jour un utilisateur
        $existingUser = User::find($user->id);

        if ($existingUser) {
            $existingUser->update([
                'prenom' => $user->prenom,
                'nom' => $user->nom,
                'email' => $user->email,
                // Ajoutez d'autres champs si nécessaire
            ]);
        }
    }

    protected function deleteUser(User $user)
    {
        // Logique pour supprimer un utilisateur
        $existingUser = User::find($user->id);

        if ($existingUser) {
            $existingUser->delete();
        }
    }
}
