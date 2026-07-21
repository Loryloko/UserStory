<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\User;

#[Signature('app:make-user-revisor{email}')]
#[Description('Rende un utente registrato un revisore della piattaforma')]
class MakeUserRevisor extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
    $email = $this->argument('email');
        
        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("Utente con email {$email} non trovato!");
            return Command::FAILURE;
        }

        $user->is_revisor = true;
        $user->save();

        $this->info("L'utente {$user->name} ({$email}) è ora un revisore!");
        return Command::SUCCESS;    
    }
}
