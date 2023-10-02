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

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">


            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-europe-africa" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM3.668 2.501l-.288.646a.847.847 0 0 0 1.479.815l.245-.368a.809.809 0 0 1 1.034-.275.809.809 0 0 0 .724 0l.261-.13a1 1 0 0 1 .775-.05l.984.34c.078.028.16.044.243.054.784.093.855.377.694.801-.155.41-.616.617-1.035.487l-.01-.003C8.274 4.663 7.748 4.5 6 4.5 4.8 4.5 3.5 5.62 3.5 7c0 1.96.826 2.166 1.696 2.382.46.115.935.233 1.304.618.449.467.393 1.181.339 1.877C6.755 12.96 6.674 14 8.5 14c1.75 0 3-3.5 3-4.5 0-.262.208-.468.444-.7.396-.392.87-.86.556-1.8-.097-.291-.396-.568-.641-.756-.174-.133-.207-.396-.052-.551a.333.333 0 0 1 .42-.042l1.085.724c.11.072.255.058.348-.035.15-.15.415-.083.489.117.16.43.445 1.05.849 1.357L15 8A7 7 0 1 1 3.668 2.501Z"/>
            </svg> --}}

        <form method="POST" action=" {{ route('chirps.store') }} ">
            @csrf
            <textarea name="message" placeholder=" {{ __('util.msg') }} "
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4"> {{ __('util.chirp') }} </x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y divide-solid divide-gray-300">
            @foreach ($chirps as $chirp)
                <div class="p-6 flex space-x-2">
                    <svg class="h-6 w-6 text-gray-600 -scale-x-100" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                        <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                      </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-blue-400">
                                    {{ $chirp->user->name }}
                                </span>
                                <small class="ml-2 text-sm text-gray-600">
                                    {{ $chirp->created_at->format('g:i a, j M Y') }}
                                </small>
                                {{-- eq => equals (pour égale à) --}}
                                @if (!$chirp->created_at->eq($chirp->updated_at))
                                <small class="text-gray-600 sm"> Modifié {{$chirp->updated_at->diffForHumans()}} </small>                                   
                                @endif
                            </div>
                            {{-- ne s'affiche que pour les commentaire de l'utilisateur --}}
                            @if ($chirp->user()->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil h-6 w-6 text-gray-700" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                        </svg>    
                                    </button> 
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('chirps.edit', $chirp)">
                                        {{ __('util.edit') }}
                                    </x-dropdown-link>
                                    <form action="{{ route('chirps.destroy', $chirp) }}" method="post">  
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('chirps.destroy', $chirp)" onclick="event.preventDefault(); this.closest('form').submit()">
                                            {{ __('util.sup') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                            @endif
                        </div>
                        <p class="mt-4 text-lg text-gray-900">
                            {{ $chirp->message }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>


    </div>

</x-app-layout>
