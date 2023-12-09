<?php

    namespace App\Events;

    use App\Models\User;
    use Illuminate\Foundation\Events\Dispatchable;
    use Illuminate\Queue\SerializesModels;

    class UserUpdated
    {
        use Dispatchable, SerializesModels;

        /**
         * L'utilisateur concerné.
         *
         * @var \App\Models\User
         */
        public $user;

        /**
         * Type d'action (created, updated, deleted).
         *
         * @var string
         */
        public $action;

        /**
         * Crée une nouvelle instance de l'événement.
         *
         * @param  \App\Models\User  $user
         * @param  string  $action
         * @return void
         */
        public function __construct(User $user, $action)
        {
            $this->user = $user;
            $this->action = $action;
        }
    }
?>