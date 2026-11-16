<nav class="bg-white dark:bg-black shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300">
                David Kizayilawoko
            </a>
            <ul class="flex items-center space-x-10">
                <li>
                    <a href="{{ route('contact') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300">Contact</a>
                </li>
                <!-- Bouton pour le thème du site -->
                <button
                    type="button"
                    x-data="{
                        theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
                        toggle() {
                            this.theme = this.theme === 'dark' ? 'light' : 'dark';
                            document.documentElement.classList.toggle('dark', this.theme === 'dark');
                            localStorage.setItem('theme', this.theme);
                        }
                    }"
                    @click="toggle()"
                    aria-label="Toggle dark mode"
                    class="text-fg inline-flex h-9 w-9 items-center justify-center rounded-lg transition cursor-pointer"
                >
                    <span x-cloak x-show="theme === 'light'" aria-hidden="true"><x-tabler-sun-f class="text-amber-300" /></span>
                    <span x-cloak x-show="theme === 'dark'" aria-hidden="true"><x-tabler-moon-f class="text-blue-300" /></span>
                </button>
            </ul>
        </div>
    </div>
</nav>
