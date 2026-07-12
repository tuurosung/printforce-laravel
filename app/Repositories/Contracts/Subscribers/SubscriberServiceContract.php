<?php

namespace App\Contracts\Subscribers;

use App\Data\Subscribers\SubscriberData;
use App\Models\Subscribers;
use Illuminate\Database\Eloquent\Collection;

interface SubscriberServiceContract
{
    public function getSubscribers(): Collection;
    public function createSubscriber(SubscriberData $data): bool;
    public function updateSubscriber(Subscribers $subscriber, SubscriberData $data): bool;
    public function deleteSubscriber(Subscribers $subscriber): bool;


    // Business Logic
    public function getDaysRemaining(Subscribers $subscriber): int;
    public function isExpired(Subscribers $subscriber): bool;
    public function renewSubscription(Subscribers $subscriber, int $days): bool;


}
