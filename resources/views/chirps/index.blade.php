<x-app-layout>
    {{-- @php
        $message = "Vous n'avez pas saisi le nom d'utilisateur";  
    @endphp 
    <x-alert :color="'bg-green-700 hover:bg-green-500'" :message="$message" />
    <x-alert :color="'bg-purple-700 hover:bg-red-500'" :message="'nouveau test'" />
    <x-card>
        <h2>Du Lorem </h2>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum ex cum quibusdam animi similique voluptatem quis molestias porro distinctio aliquam suscipit culpa, eveniet magnam, nihil tempora corrupti vel illum quia?
    </x-card> --}}
    <a href="{{ route('change.language' , 'fr') }}">Français</a> | <a href="{{ route('change.language' , 'en') }}">Anglais</a>
   

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action=" {{ route('chirps.store') }} ">
            @csrf
            <textarea name="message" placeholder=" {{ __('util.msg') }} " class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2"/>
            <x-primary-button class="mt-4"> {{ __('util.chirp') }} </x-primary-button>
        </form>
    </div>
</x-app-layout>