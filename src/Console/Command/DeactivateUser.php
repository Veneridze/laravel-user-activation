<?php
namespace Veneridze\LaravelUserActivation\Console\Command;
use Illuminate\Console\Command;
use App\Models\User;
class DeactivateUser extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:deactivate {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Деактивировать учётную запись пользователя';

    /**
     * Execute the console command.
     */
    public function handle(User $user): void
    {
        if($user->isActivated()) {
            $user->deactivate();
            $this->info("Учётная запись деактивирована");
        } else {
            $this->error("Учётная запись уже деактивирована");
        }
    }
}