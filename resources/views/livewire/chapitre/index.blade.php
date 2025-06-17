<div class="ml-64 bg-gray-200">
    <div class="text-center text-2xl font-semibold p-4 bg-blue-300 text-white">
        {{ $cours->titre }}
    </div>
    @include('livewire.chapitre.modals.add')
    @include('livewire.chapitre.modals.edit')

    <div class="flex justify-end p-2">
        {{-- creer un chapitre  --}}
        <button wire:click="toggleAddChapitreModal"  class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-600 dark:focus:ring-blue-700" type="button">
            <div class="flex">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>creer un chapitre
            </div>
        </button>
    </div>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <span class="text-red-500 text-sm p-2 h-9 break-words overflow-y-auto">{{ $error }}</span>
        @endforeach
    @endif

    @if(session()->has('success'))
        <span class="text-green-500 text-sm p-2">{{ session('success') }}</span>
    @endif
    <div class="p-2 ">
        @if($cours->chapitres->isNotEmpty())
            @foreach ($cours->chapitres as $chapitre )
                <div>
                    <div class="relative overflow-x-auto mb-4  shadow-md sm:rounded-lg">
                        <table class=" w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        </button>

                            <caption class="relative p-3 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-blue-200 dark:text-white dark:bg-gray-800">

                                <p>
                                    <span>{{ $chapitre->titre }}</span>
                                    <span>
                                        {{ sprintf('%02d:%02d', intdiv($chapitre->temps_estime, 60), $chapitre->temps_estime % 60) }}
                                    </span>
                                </p>
                                <div class="flex space-x-2">
                                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">{{ $chapitre->description }}</p>
                                    @if($chapitre->has_evaluation)
                                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Evaluation</p>
                                    @endif

                                    @if ($chapitre->ressource)	e
                                        <p class="">
                                            <a href="{{ $chapitre->ressource }}" target="blank"> ressources ...</a>
                                        </p>

                                    @endif
                                </div>
                                <!-- Place pour bouton futur: éditer/supprimer -->
                                <div class="absolute top-4 right-4">
                                    <button  class="toggle-eyes bg-green-400  hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center" aria-controls="dropdown-example-{{ $chapitre->id }}" data-collapse-toggle="dropdown-example-{{  $chapitre->id }}" type="button">
                                        <div class="flex">
                                            <svg class="w-5 h-5 hidden eye text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-white  w-5 h-5 no-eye" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                            </svg>

                                        </div>
                                    </button>
                                    <!---btn ajouter chapitre--->
                                    <button wire:click="addSection({{ $chapitre->id }})"  class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                        <div class="flex" title="Ajouter une section">

                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>

                                        </div>
                                    </button>
                                    <!---btn editer chapitre--->
                                    <button wire:click="loadChapitresData({{$chapitre->id}})"   class=" text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" type="button">
                                        <div class="flex">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" >
                                            </svg>
                                        </div>
                                    </button>

                                    <!---btn supprimer chapitre--->
                                    <button wire:click="deleteChapitre({{$chapitre->id}})"  class=" text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-2 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" type="button">
                                        <div class="flex">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                        </div>
                                    </button>

                                </div>
                            </caption>

                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        titre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        video url
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        pdf url
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>

                                </tr>
                            </thead>
                            <tbody id="dropdown-example-{{  $chapitre->id }}">
                                @if($chapitre->sections->isNotEmpty())

                                    @foreach ($chapitre->sections as $section )
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white break-words">
                                                {{ $section->titre }}
                                            </th>

                                            <td class="px-6 py-4 break-words">
                                                @if ($section->videoUrl)

                                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                        {{$section->videoUrl}}
                                                    </a>
                                                @else
                                                    aucune video
                                                @endif
                                            </td>
                                            <td class="px-6 py-4  break-words">
                                                <a href="\Storage\{{$section->pdfUrl}}" target="_blank"  class="font-medium text-blue-600  dark:text-blue-500 hover:underline">
                                                    {{$section->pdfUrl}}
                                                </a>
                                            </td>

                                            <td class="px-6 py-4 break-words">
                                                {{$section->description}}
                                            </td>
                                            <td class="px-6 py-4">
                                                <!--button sup-->
                                                <form wire:submit.prevent='deleteSection({{ $section->id }})' class="inline-block">
                                                    <button type="submit" class="text-white hover:underline" title="Supprimer">
                                                    <div class="p-1 hover:bg-red-600 bg-red-500 rounded-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                                    </div>
                                                    </button>

                                                </form>
                                                <!--button modif-->
                                                <form wire:submit.prevent='loadSectionData({{ $chapitre->id }} , {{ $section->id }})'  class="inline-block">
                                                    <button type="submit" class=" text-white hover:underline" title="Modifer">
                                                        <div class="p-1 hover:bg-green-500 bg-green-400 rounded-lg">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" >
                                                            </svg>
                                                        </div>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center text-gray-500">Aucune section trouvée</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                        {{ $updateSection }}
                        <form wire:submit.prevent=@if($updateSection)"updateChapitreSection" @else "storeSection({{ $chapitre->id }})"@endif

                         enctype="multipart/form-data" class="@if($chapitreSection == $chapitre->id && $addSectionModal ) flex @else hidden @endif  flex-wrap items-center gap-4 p-4">

                            <div class="flex flex-col">
                                <label class="mb-2 text-sm font-semibold text-blue-500 dark:text-white">
                                    Titre
                                </label>
                                <input type="text" wire:model.defer="titre_section" placeholder="Titre"
                                class="border border-gray-300 rounded-lg px-3 py-2 w-48 focus:outline-none focus:ring focus:border-blue-300" required>
                                @error('titre_section')
                                    <span class="text-red-500 text-sm p-2">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="flex flex-col">
                                <label class="mb-2 text-sm font-semibold text-blue-500 dark:text-white">
                                    Video url
                                </label>
                                <input type="file" wire:model.defer="videoUrl" placeholder="URL Vidéo"
                                class="border border-gray-300 rounded-lg px-3 py-2 w-64 focus:outline-none focus:ring focus:border-blue-300 bg-white">

                                @error('videoUrl')
                                    <span class="text-red-500 text-sm p-2">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="flex flex-col">
                                <label class="mb-2 text-sm font-semibold text-blue-500 dark:text-white">
                                    pdf url
                                </label>

                                <input type="file" wire:model.defer="pdfUrl" placeholder="URL PDF"
                                    class="border border-gray-300 rounded-lg px-3 py-2 w-64 focus:outline-none focus:ring focus:border-blue-300 bg-white" required>

                                @error('pdfUrl')
                                    <span class="text-red-500 text-sm p-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="mb-2 text-sm font-semibold text-blue-500 dark:text-white">
                                    description
                                </label>

                                <textarea id="description_section" wire:model.defer="description_section" rows="1" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description du chapitre" ></textarea>

                                @error('description_section')
                                    <span class="text-red-500 text-sm p-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex gap-4">
                                <button type="submit"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                                    @if($updateSection)

                                        mettre a jour
                                    @else
                                        Ajouter
                                    @endif

                                </button>
                                <button type="reset"
                                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-200">
                                    annuler
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            @endforeach
        @else
                <p class="text-center text-2xl text-slate-500 font-semibold bg-slate-200 p-4">
                    Aucun chapitre
                </p>
        @endif

    </div>

</div>


<script defer>
    document.querySelectorAll('.toggle-eyes').forEach(element => {
        element.addEventListener('click', function(e) {
            // Toujours utiliser currentTarget ici pour pointer vers le bouton sur lequel l'écouteur est attaché
            const eye = e.currentTarget.querySelector('.eye');
            const noEye = e.currentTarget.querySelector('.no-eye');

            if (eye && noEye) {
                eye.classList.toggle('hidden');
                noEye.classList.toggle('hidden');
            }
        });
    });
    document.querySelectorAll('.add-section').forEach(element => {
        element.addEventListener('click', function(e) {
            // Utilise parentElement ou closest selon la structure
            const form = e.currentTarget.parentElement.parentElement.parentElement.parentElement.querySelector('.form-section');
            if (form) {
                console.log('he');
                form.classList.toggle('flex');
                form.classList.toggle('hidden');
            }
        });
    });
</script>
