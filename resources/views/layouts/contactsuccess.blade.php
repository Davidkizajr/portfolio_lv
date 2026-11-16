@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-10">Merci pour votre message !</h1>
    <div class="mt-10 text-center">
        <p class="mb-10">Nous avons bien reçu votre message et nous vous répondrons dans les plus brefs délais.</p>
        <a href="{{ route('contact') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-2xl hover:bg-blue-600">
            Retour au formulaire de contact
        </a>
    </div>
@endsection
