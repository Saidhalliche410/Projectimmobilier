<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande de contact a été fait pour le bien <a href="#">{{$proprety->title}}</a>

    -Prénom:{{$data['firstname']}}
    -Nom:{{$data['lastname']}}
    -email:{{$data['email']}}
    -Numéro de télephome:{{$data['phone']}}

    **Message**
    <br>
    {{ $data['message']}}



</x-mail::message>
