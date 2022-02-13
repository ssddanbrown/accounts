<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\ValidationException;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user to access the system';

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
        $details = [
            'name' => $this->ask("Enter an name for this user"),
            'email' => $this->ask("Enter an email address for this user"),
            'password' => $this->secret("Enter a password for this user"),
        ];

        try {
            $validatedDetails = Validator::validate($details, [
                'name' => ['required', 'string', 'min:3'],
                'email' => ['required', 'email', new Unique('users', 'email')],
                'password' => ['required', Password::default()],
            ]);
        } catch (ValidationException $exception) {
            $this->error("User details provided were invalid:");
            $errors = $exception->validator->errors();
            $this->error(implode("\n", $errors->all()));
            return 1;
        }

        /** @var User $user */
        $user = User::query()->create([
            'name' => $validatedDetails['name'],
            'email' => $validatedDetails['email'],
            'password' => Hash::make($validatedDetails['password']),
        ]);
        $this->line("Created new user with name \"{$user->name}\" and email \"{$user->email}\"");

        return 0;
    }
}
