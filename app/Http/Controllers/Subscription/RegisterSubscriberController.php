<?php

namespace App\Http\Controllers\Subscription;

use App\Models\User;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Subscription\RegisterSubscriberRequest;

class RegisterSubscriberController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterSubscriberRequest $request)
    {
        $registration = DB::transaction(function () use ($request) {

            $request->validated();

            // create subscriber
            $createdSubscriber = $this->createSubscriber($request->subscriberData());

            if (!$createdSubscriber) {
                return redirect()->back()->with('error', 'Registration failed. Please try again.');
            }

            $createdSubscriber->refresh();

            // create administrator user
            $subscriberId = $createdSubscriber->subscriber_id;
            $createdUser = $this->createAdministrator($subscriberId, $request->userData());

            if (!$createdUser) {
                return redirect()->back()->with('error', 'Registration failed. Please try again.');
            }

            Auth::login($createdUser);
        });

        return redirect()->route('dashboard');

    }


    private function createSubscriber($subscriberData)
    {
        $createdSubscriber = Subscribers::create([
            'subscriber_id' => $this->generateSubscriberId(),
            'subscription_plan' => 'trial',
            'last_payment_date' => now()->format('Y-m-d'),
            'next_payment_date' => now()->addDays(14)->format('Y-m-d'),
            ...$subscriberData
        ]);

        if (!$createdSubscriber) {
            DB::rollBack();
            return false;
        }

        return $createdSubscriber;
    }


    private function createAdministrator($subscriberId, $userData)
    {
        $createdUser = User::create([
            'subscriber_id' => $subscriberId,
            'firstname' => $userData['firstname'],
            'lastname' => $userData['lastname'],
            'name' => $userData['firstname'] . ' ' . $userData['lastname'],
            'email' => $userData['email'],
            'phone_number' => $userData['phone_number'],
             'password' => Hash::make($userData['password']),
            'access_level' => 'administrator'
        ]);

        if (!$createdUser) {
            DB::rollBack();
            return false;
        }

        return $createdUser;
    }


    /**
     *  Generate a unique subscriber id
     *
     *  Loops until a unique subscriber id is generated
     *
     * @return string
     */
    public function generateSubscriberId(): string
    {
        do {
            $subscriberId = $this->generateRandomId();
        } while ($this->testForUniqueness($subscriberId));

        return $subscriberId;
    }


    /**
     * Generate a random random numeric id
     *
     * @return string
     */
    protected function generateRandomId()
    {
        $id = '';

        for ($i = 0; $i < 16; $i++) {
            $id .= random_int(1, 9);
        }

        return $id;
    }


    /**
     * Test the generated id for uniqueness
     * 
     * @param mixed $subscriberId
     * @return bool
     */
    protected function testForUniqueness($subscriberId): bool
    {
        return DB::table('subscriptions')
            ->where('subscriber_id', $subscriberId)
            ->exists();
    }
}
