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
    public static function sendCustomerAppLink($customers, $byEmail = null, $bySms = null)
    {

        if ($byEmail) {
            foreach ($customers as $customer) {
                if ($customer->email) {
                    Mail::send('emails.customerAppLink', ['customer' => $customer], function ($m) use ($customer) {
                        $m->from(config('settings.fromEmail'), config('settings.fromName'))
                            ->to($customer->email)
                            ->subject('Votre bon de restauration');
                    });
                }
            }
        }
        if ($bySms) {
            foreach ($customers as $customer) {
                if ($customer->phone_number) {
                    $callrApi = new \CALLR\API\Client;
                    $callrApi->setAuthCredentials('buddyweb_1', 'GDPyTf6AI0');

                    $from = 'SMS'; // restricted API only allow SMS as sender
                    $to = $customer->phone_number;
                    $text = 'Bonjour ' . $customer->first_name . ' ' . $customer->last_name . ', suite à l\'irrégularité subie, vous bénéficiez d\'un bon de restauration. Cliquez sur le lien pour y accéder : ' . env('CUSTOMER_APP_URL') . '/?token=' . $customer->token;

                    $result = $callrApi->call('sms.send', [$from, $to, $text, null]);
                }
            }
        }

    }
}