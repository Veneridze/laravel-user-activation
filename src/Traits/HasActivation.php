<?php
namespace Veneridze\LaravelUserActivation\Traits;
use Activation;
use Illuminate\Support\Carbon;
use Str;
use Veneridze\LaravelUserActivation\Events\Activated;
use Veneridze\LaravelUserActivation\Events\Deactivated;
use Veneridze\LaravelUserActivation\Events\NeedActivate;
trait HasActivation {
    public function isActivated(): bool {
        return $this->activated_at != null;
    }

    public function deactivate(): void {
        if($this->isActivated()) {
            $this->activated_at = null;
            $this->activation_key = null;
            $this->save();
            Deactivated::dispatch($this);
        } else {
            throw new \Exception("Учётная запись уже деактивирована");
        }
    }
    public function activate(): void {
        if(!$this->isActivated()) {
            $this->activated_at = Carbon::now();
            $this->activation_key = null;
            $this->save();
            Activated::dispatch($this);
        } else {
            throw new \Exception("Учётная запись уже активирована");
        }
    }

    public function sendActivation(): void {
        if(!$this->isActivated()) {
            $this->activation_key = Str::uuid();
            $this->save();
            NeedActivate::dispatch($this);
        } else {
            throw new \Exception("Учётная запись уже активирована");
        }
    }
}