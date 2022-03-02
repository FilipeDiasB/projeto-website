@component('mail::message')
Ola, você recebeu um novo contato a partir do seu site!

Nome: <b>{{ $reply_name }}</b>

Email: {{ $reply_email }}

Assunto: {{ $subject }}

Mensagem:

@component('mail::panel')
    {{ $message }}
@endcomponent

@endcomponent
