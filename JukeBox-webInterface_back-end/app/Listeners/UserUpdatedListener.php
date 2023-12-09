<?php

namespace App\Listeners;

use App\Events\UserUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UserUpdatedListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(UserUpdated $event)
    {
        // Vérification de l'existence du fichier
        $filePath = storage_path('../../../db/users.txt');

        if (!File::exists($filePath)) {
            // Le fichier n'existe pas, on peut le créer
            File::put($filePath, 'Contenu initial ou vide');
            Log::info("Le fichier utilisateurs.txt a été créé.");
        }

        $user = $event->user;

        // Vérifiez le type d'action (ajout, mise à jour ou suppression)
        if ($event->action === 'created') {
            $this->addUser($user);
        } elseif ($event->action === 'updated') {
            $this->updateUser($user);
        } elseif ($event->action === 'deleted') {
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

        // Écriture dans le fichier après l'ajout d'un utilisateur
        $this->writeToFile("Utilisateur ajouté - ID : {$user->id}, Prénom : {$user->prenom}, Nom : {$user->nom}");
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

        // Écriture dans le fichier après la mise à jour d'un utilisateur
        $this->writeToFile("Utilisateur mis à jour - ID : {$user->id}, Prénom : {$user->prenom}, Nom : {$user->nom}");
    }

    protected function deleteUser(User $user)
    {
        // Logique pour supprimer un utilisateur
        $existingUser = User::find($user->id);

        if ($existingUser) {
            $existingUser->delete();
        }

        // Écriture dans le fichier après la suppression d'un utilisateur
        $this->writeToFile("Utilisateur supprimé - ID : {$user->id}, Prénom : {$user->prenom}, Nom : {$user->nom}");
    }

    protected function writeToFile($content)
    {
        $filePath = storage_path('../../../db/users.txt');
        File::append($filePath, $content . PHP_EOL);
    }
}
