<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class ContactService
{
    /*
     * Envoie le lien de la CustomerApp aux Customers
     *
     * @param $customers array
     * @param byEmail boolean
     * @param bySms boolean
     *
     */
    public static function sendCustomerAppLink($customers, $byEmail = null, $bySms = null) {

        if ($byEmail) {
            foreach ($customers as $customer) {
                Mail::send('emails.customerAppLink', ['customer' => $customer], function ($m) use ($customer) {
                    $m->from(config('settings.fromEmail'), 'Air France')
                        ->to($customer->email)
                        ->subject('Votre bon de restauration');
                });
            }
        }
        if ($bySms) {
            // TODO : Send CustomerApp Link via SMS
        }

    }
}