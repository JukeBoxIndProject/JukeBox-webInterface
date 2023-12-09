<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Events\UserUpdated;
    use App\Models\User;

    class UserController extends Controller
    {
        public function store(Request $request)
        {
            // Code pour ajouter un utilisateur

            $user = // Obtenir l'utilisateur créé

            event(new UserUpdated($user, 'created'));

            // Autres traitements si nécessaires

            return response()->json($user);
        }

        public function update(Request $request, User $user)
        {
            // Code pour mettre à jour un utilisateur

            event(new UserUpdated($user, 'updated'));

            // Autres traitements si nécessaires

            return response()->json($user);
        }

        public function destroy(User $user)
        {
            // Code pour supprimer un utilisateur

            event(new UserUpdated($user, 'deleted'));

            // Autres traitements si nécessaires

            return response()->json(['message' => 'Utilisateur supprimé avec succès']);
        }
    }
?>