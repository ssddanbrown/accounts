<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class ResetUserPasswordCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:reset-password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset the password for a user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userEmail = $this->ask('Enter the email of the user you want to reset the password for');
        /** @var User $user */
        $user = User::query()->where('email', '=', $userEmail)->first();
        if (empty($userEmail) || ! $user) {
            $this->error('An email for an existing user needs to be provided.');

            return 1;
        }

        $this->line("User found with name \"{$user->name}\".");
        $newPassword = $this->secret('Enter a new password for this user');
        try {
            Validator::validate(['password' => $newPassword], ['password' => ['required', Password::default()]]);
        } catch (ValidationException $exception) {
            $this->error('The provided password was invalid');
            $errors = $exception->validator->errors();
            $this->error(implode("\n", $errors->all()));

            return 1;
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        $this->line('User password updated!');

        return 0;
    }
}
