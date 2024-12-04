<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Dashboard</h1>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <!-- Isi konten dashboard disini -->
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <!-- Card Statistics -->
            <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800">
                <h2 class="mb-4 text-xl font-bold dark:text-white">Total Students</h2>
                <p class="text-2xl font-bold text-blue-600 dark:text-blue-500">150</p>
            </div>
            <!-- Tambahkan card statistik lainnya sesuai kebutuhan -->
        </div>
    </div>
</x-admin-layout>
