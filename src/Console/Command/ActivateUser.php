<?php
namespace Veneridze\LaravelUserActivation\Console\Command;
use Illuminate\Console\Command;
use App\Models\User;
class ActivateUser extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:activate {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Активировать учётную запись пользователя';

    /**
     * Execute the console command.
     */
    public function handle($user): void
    {
        $user = User::findOrFail($user);
        if(!$user->isActivated()) {
            $user->activate();
            $this->info("Учётная запись активирована");
        } else {
            $this->info("Учётная запись уже активирована");
        }
    }
}