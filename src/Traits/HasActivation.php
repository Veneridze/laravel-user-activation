<?php
namespace Veneridze\LaravelUserActivation\Traits;
use Activation;
use Illuminate\Support\Carbon;
trait HasActivation {
    public function isActivated(): bool {
        return $this->activated_at != null;
    }

    public function deactivate(): void {
        $this->activated_at = null;
        $this->save();
    }
    public function activate(): void {
        $this->activated_at = Carbon::now();
        $this->save();
    }

    public function sendActivation(): void {
        
    }
}