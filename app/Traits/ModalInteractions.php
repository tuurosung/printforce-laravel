<?php

namespace App\Traits;

trait ModalInteractions
{
    public function openModal(): void
    {
        $this->dispatch('open-overlay', id: $this->modalId());
    }

    public function closeModal(): void
    {
        $this->dispatch('close-overlay', id: $this->modalId());
    }

    abstract protected function modalId(): string;
}
