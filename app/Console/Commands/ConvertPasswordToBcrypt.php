<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ConvertPasswordToBcrypt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:convert-password-to-bcrypt';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::all();
        foreach ($user as $user) {
            if(!Hash::needsRehash($user->password)) {
                $this->info("pw for user {$user->id} is already using bcrypt");
                continue;
            }

            $oldPw = $user->password;
            $user->password = Hash::make($oldPw);
            $user->save();

            $this->info("pw for user {$user->id} has been converted to bcrypt");
        }
        $this->info("all pw have been converted to bcrypt");
        return 0;
    }
}
