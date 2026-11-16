@extends('layouts.app')

@section('content')

    @php
        $skills = [
            [
                'title' => 'Langages de programmation',
                'skills' => [
                    ['name' => 'HTML', 'icon' => 'fab-html5'],
                    ['name' => 'CSS', 'icon' => 'fab-css3-alt'],
                    ['name' => 'JavaScript', 'icon' => 'fab-js-square'],
                    ['name' => 'PHP', 'icon' => 'fab-php'],
                    ['name' => 'SQL', 'icon' => 'tabler-sql'],
                    ['name' => 'Python', 'icon' => 'fab-python'],
                    ['name' => 'C', 'icon' => 'tabler-letter-c'],
                    ['name' => 'C++', 'icon' => 'tabler-brand-cpp'],
                    ['name' => 'C#', 'icon' => 'tabler-brand-c-sharp']
                ]
            ],
            [
                'title' => 'Frameworks, librairies et versionnage',
                'skills' => [
                    ['name' => 'React', 'icon' => 'fab-react'],
                    ['name' => 'Tailwind CSS', 'icon' => 'tabler-brand-tailwind'],
                    ['name' => 'Node.js', 'icon' => 'fab-node'],
                    ['name' => 'Laravel', 'icon' => 'fab-laravel'],
                    ['name' => 'Git', 'icon' => 'fab-git-alt']
                ]
            ],
            [
                'title' => 'Bureautique et design',
                'skills' => [
                    ['name' => 'Office', 'icon' => 'tabler-brand-office'],
                    ['name' => 'Canva']
                ]
            ]
        ];

        $experiences = [
            'work' => [
                [
                    'title' => 'Informatique',
                    'experiences' => [
                        ['title' => 'Développeur web', 'company' => 'LalaChante', 'type' => 'Stage', 'date' => 'Avril à juillet 2026', 'location' => 'Télétravail', 'description' => ['Développement d\'un site dans le framework Laravel', 'Versionnage des tickets avec GitHub', 'Refactorisation du code et tests de pré-production (QA)']],
                        ['title' => 'Développeur web', 'company' => 'Korcep', 'type' => 'Stage', 'date' => 'Janvier à mars 2025', 'location' => 'Amiens', 'description' => ['Développement d\'un site en PHP, HTML, CSS et JS', 'Gestion d\'une base de données en SQL', 'Utilisation de Bootstrap et jQuery']]
                    ]
                ],
                [
                    'title' => 'Autres expériences',
                    'experiences' => [
                        ['title' => 'Agent technique', 'company' => 'Mairie de Poix-de-Picardie', 'type' => 'Emploi saisonnier', 'date' => 'Juillet à août 2025', 'location' => 'Poix-de-Picardie', 'description' => ['Travail pour la commune', 'Travaux manuels variés']],
                        ['title' => 'Conseiller de vente', 'company' => 'SNCF', 'type' => 'Emploi saisonnier', 'date' => 'Juillet à août 2024', 'location' => 'Abancourt', 'description' => ['Vente de billets de train et d\'abonnements', "Aide et renseignements pour le client", "Gestion du guichet (prise et fin de service)"]]
                    ]
                ]
            ],
            'education' => [
                'title' => 'Formation',
                'experiences' => [
                    ['title' => 'BUT Informatique', 'company' => 'IUT', 'date' => 'Septembre 2023 à août 2026', 'location' => 'Amiens', 'specialty' => ['Parcours', "Réalisation d'applications : Conception, Développement, Validation"]],
                    ['title' => 'Baccalauréat général', 'company' => 'Lycée Édouard Branly', 'date' => 'Septembre 2020 à juillet 2023', 'location' => 'Amiens', 'specialty' => ['Spécialités', "Mathématiques", "Numérique et Sciences Informatiques (NSI)"]]
                ]
            ]
        ];
    @endphp

    <!-- Hero section -->
    <div class="text-center p-10">
        <h1 class="text-3xl font-bold mt-4">Passionné d'informatique</h1>
        <p class="text-lg mt-4">La création de sites et applications web est ce que j'aime le plus dans le domaine de l'informatique.</p>
        <div class="rounded-full bg-green-500 text-white px-4 py-2 mt-4 inline-block">
            Actuellement ouvert à des offres d'emploi
        </div>
    </div>

    <!-- Skills -->
    <div>
        <h2 class="text-3xl font-bold mt-10 pb-2 border-b-2 border-black dark:border-white">Compétences informatiques</h2>
        @foreach ($skills as $skill)
            <x-sectionskill title="{{ $skill['title'] }}">
                @foreach ($skill['skills'] as $skillItem)
                    <x-skill language="{{ $skillItem['name'] }}">
                        <x-slot:icon>
                            @if ($skillItem['icon'] ?? false)
                                <x-icon :name="$skillItem['icon']" class="h-20 w-20" />
                            @else
                                <svg viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg" style="enable-background:new 0 0 192 192" xml:space="preserve" fill="#000000" class="h-20 w-20 text-black dark:text-white">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M95.2 170c-11.6 0-22-3.1-30.9-9.1-8.8-6-15.4-14.6-19.7-25.6-2.5-6.4-4-13.4-4.7-21.4-.8-9.5-.2-19.2 1.9-28.7 3.3-15.3 10-28.5 19.8-39.5 9.7-10.8 21.2-18.1 34.3-21.5 5.6-1.5 11.2-2.2 16.5-2.2 6.4 0 12.7 1.1 18.7 3.3 8.9 3.3 15 9 17.9 17 1.4 3.7 1.8 7.6 1.4 12-.6 6.2-2.6 11.7-6 16.4-3.9 5.4-8.6 8.7-14.3 10.1-1 .3-2.1.4-3.3.4-.5 0-.9 0-1.4-.1-1.7-.2-3.2-.9-4.2-2.2-1-1.3-1.4-3-1.2-4.7.3-2 1.1-3.7 1.9-5.1l.3-.6c1.6-3.2 3.1-6.2 3.9-9.4 1.3-5.4 1.3-9.5-.1-13.3-1.5-4-4.3-6.5-8.5-7.5-1.6-.4-3.2-.6-4.8-.6-3.6 0-7.4.9-11.4 2.7C93.4 44 86.7 50 81 58.7c-3.9 6-6.9 12.7-9.1 20.5-1.6 5.6-2.6 11.5-3.2 17.6-.3 2.9-.5 6.3-.5 9.6.1 9.7 1.5 17.4 4.5 24.2 3.3 7.6 7.8 12.9 13.9 16.3 4.1 2.3 8.7 3.5 13.6 3.5.8 0 1.7 0 2.6-.1 10.4-.8 19.6-5.5 28-14.3 4.3-4.5 7.9-9.7 11-15.9.5-.9 1-1.9 1.8-2.7 1-1.1 2.3-1.7 3.7-1.7 1.7 0 3.2.9 4.2 2.5 1.2 2 1.1 4.2.9 5.6-.6 4.1-2.1 8.1-4.6 12.8-7.2 12.9-17.1 22.4-29.4 28.3-6.3 3-13.1 4.7-20.1 5-1.1.1-2.1.1-3.1.1z" style="fill:none;stroke:currentColor;stroke-width:12;stroke-linejoin:round;stroke-miterlimit:10;">
                                        </path>
                                    </g>
                                </svg>
                            @endif
                        </x-slot:icon>
                    </x-skill>
                @endforeach
            </x-sectionskill>
        @endforeach
    </div>

    <!-- Experiences -->
    <div>
        <h2 class="text-3xl font-bold mt-10 pb-2 border-b-2 border-black dark:border-white">Expériences professionnelles</h2>
        @foreach ($experiences['work'] as $experience)
            <x-sectionexperience title="{{ $experience['title'] }}">
                @foreach ($experience['experiences'] as $exp)
                    <x-experience title="{{ $exp['title'] }}" company="{{ $exp['company'] }}" type="{{ $exp['type'] ?? null }}" date="{{ $exp['date'] }}" location="{{ $exp['location'] }}" :description="$exp['description']" />
                @endforeach
            </x-sectionexperience>
        @endforeach

        <h2 class="text-3xl font-bold mt-10 pb-2 border-b-2 border-black dark:border-white">Éducation</h2>
        <x-sectionexperience>
            @foreach ($experiences['education']['experiences'] as $exp)
                <x-experience title="{{ $exp['title'] }}" company="{{ $exp['company'] }}" date="{{ $exp['date'] }}" location="{{ $exp['location'] }}" :specialty="$exp['specialty']" />
            @endforeach
        </x-sectionexperience>
    </div>
@endsection
