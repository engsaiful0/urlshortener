<?php


namespace App\Traits;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

trait UserTrait
{
    /**
     * Update the User.
     *
     * @param Request $request
     * @param User $user
     * @param null $admin
     * @return User
     */
    protected function userUpdate(Request $request, User $user, $admin = null)
    {
        $user->name = $request->input('name');
        $user->timezone = $request->input('timezone');

        if ($user->email != $request->input('email')) {
            // If email registration site setting is enabled and the request is not from the Admin Panel
            if (config('settings.registration_verification') && $admin == null) {
                // Send send email validation notification
                $user->newEmail($request->input('email'));
            } else {
                $user->email = $request->input('email');
            }
        }

        if ($admin) {
            $user->role = $request->input('role');

            // Update the password
            if (!empty($request->input('password'))) {
                $user->password = Hash::make($request->input('password'));
            }

            // Update the email verified status
            if ($request->input('email_verified_at')) {
                $user->markEmailAsVerified();
            } else {
                $user->email_verified_at = null;
            }

            // Update the plan if it has changed, and the plan is not the default one
            if ($user->plan != $request->input('plan_id')) {
                // If the user previously had a subscription, attempt to cancel it
                if ($user->plan_subscription_id) {
                    $user->planSubscriptionCancel();
                }

                $user->plan_id = $request->input('plan_id');
                $user->plan_interval = null;
                $user->plan_currency = null;
                $user->plan_amount = null;
                $user->plan_payment_processor = null;
                $user->plan_subscription_id = null;
                $user->plan_subscription_status = null;
                $user->plan_created_at = Carbon::now();
                $user->plan_recurring_at = null;
                $user->plan_trial_ends_at = $user->plan_trial_ends_at ? Carbon::now() : null;
                $user->plan_ends_at = $request->input('plan_id') == 1 ? null : Carbon::createFromFormat('Y-m-d', $request->input('plan_ends_at'), $user->timezone ?? config('app.timezone'))->tz(config('app.timezone'));
            }
        }

        $user->save();

        return $user;
    }
}