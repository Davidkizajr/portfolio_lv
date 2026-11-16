@props(['title', 'company', 'type' => null, 'date', 'location', 'description' => [], 'specialty' => []])

<div class="flex items-center border-gray-600 rounded-2xl bg-white dark:bg-gray-800 shadow-md dark:shadow-white p-6">
    <div>
        <h4 class="text-xl font-bold">{{ $company }} - {{ $title }}</h4>
        <p class="text-gray-600 dark:text-gray-300">{{ $type ? $type . ' |' : '' }} {{ $date }} | {{ $location }}</p>
        <!-- Vérification entre spécialité (pour scolaire) ou description (pour emploi) -->
        <!-- $specialty[0] représente simplement le titre (Parcours ou Spécialités) -->
        @if (is_array($specialty) && count($specialty) == 2)
            <p class="mt-2"><b>{{ $specialty[0] }} :</b> {{ $specialty[1] }}</p>
        @elseif (is_array($specialty) && count($specialty) > 2)
            <p class="mt-2"><b>{{ $specialty[0] }} :</b></p>
            <ul class="list-disc list-inside mt-2">
                @foreach (array_slice($specialty, 1) as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        @endif

        @if ($description)
            <ul class="list-disc list-inside mt-2">
                @foreach ($description as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
