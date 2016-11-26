<p>Bonjour {{ $customer->first_name }} {{ $customer->last_name }},</p>

<p>Vous avez droit à un bon de restauration.
    <a href="{{ env('CUSTOMER_APP_URL') }}?token={{ $customer->token }}">Cliquez-ici pour le récupérer</a>.
</p>

<p>Bien à vous,<br>
L'équipe Air France</p>
