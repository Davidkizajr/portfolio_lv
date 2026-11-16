@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-10">Me contacter</h1>
    <div class="mt-10">
        <form action="{{ route("send-mail") }}" method="POST" class="space-y-4 max-w-2xl mx-auto">
            @csrf
            <div class="flex flex-col space-y-2">
                <label for="name" class="font-bold">Nom</label>
                <input type="text" name="name" id="name" class="border-gray-600 rounded-2xl bg-white dark:bg-gray-600 shadow-md p-4" required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="email" class="font-bold">Email</label>
                <input type="email" name="email" id="email" class="border-gray-600 rounded-2xl bg-white dark:bg-gray-600 shadow-md p-4" required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="subject" class="font-bold">Sujet</label>
                <input type="text" name="subject" id="subject" class="border-gray-600 rounded-2xl bg-white dark:bg-gray-600 shadow-md p-4" required>
            </div>
            <div class="flex flex-col space-y-2">
                <label for="submitted" class="font-bold">Message</label>
                <textarea name="submitted" id="submitted" class="border-gray-600 rounded-2xl bg-white dark:bg-gray-600 shadow-md p-4 h-52" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-2xl hover:bg-blue-600">Envoyer</button>
        </form>
    </div>
@endsection
