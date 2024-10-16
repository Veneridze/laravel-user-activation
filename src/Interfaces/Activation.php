<?php
interface Activation {
    /**
     * Summary of isActivated
     * @return bool
     */
    public function isActivated(): bool;
    /**
     * Summary of deactivate
     * @return void
     */
    public function deactivate(): void;
    /**
     * Summary of activate
     * @return void
     */
    public function activate(): void;
    /**
     * Summary of sendActivation
     * @return void
     */
    public function sendActivation(): void;
}