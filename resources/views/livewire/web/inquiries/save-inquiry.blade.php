<form wire:submit="save" id="form">
    
    <div class="bg-tertiary h-full rounded-xl px-6 py-6 sm:px-8 sm:py-8 size-full border-[3px] border-tertiary-border space-y-4">

        {{-- Nombres y Apellidos --}}
        <div class="flex flex-col space-y-4 md:flex-row md:space-y-0 md:space-x-4 lg:flex-col lg:space-y-4 lg:space-x-0">
            
            {{-- Apellidos --}}
            <div class="flex-1">
                <x-label class="mb-1">
                    <span class="text-primary text-base md:text-lg font-bold">
                        Apellidos
                    </span>
                    
                    <span class="text-red-500 text-base md:text-lg font-bold">*</span>
                </x-label>
                <x-input class="w-full" placeholder="Ingrese sus apellidos" wire:model.live="inquiry.lastname" />
                <x-input-error for="inquiry.lastname" />
            </div>
            
            {{-- Nombres --}}
            <div class="flex-1">
                <x-label class="mb-1">
                    <span class="text-primary text-base md:text-lg font-bold">
                        Nombres
                    </span>
                    
                    <span class="text-red-500 text-base md:text-lg font-bold">*</span>
                </x-label>
                <x-input class="w-full" placeholder="Ingrese sus nombres" wire:model.live="inquiry.name"/>
                <x-input-error for="inquiry.name" />
            </div>

        </div>

        {{-- Institución Educativa --}}
        <div>
            <x-label class="mb-1">
                <span class="text-primary text-base md:text-lg font-bold">
                    Institución Educativa / Corporación Educativa
                </span>
                <span class="text-red-500 text-base md:text-lg font-bold">*</span>
            </x-label>
            <x-input class="w-full" placeholder="El nombre de tu institución" wire:model.live="inquiry.institution_name" />
            <x-input-error for="inquiry.institution_name" />
        </div>

        {{-- Ciudad / Región --}}
        <div>
            <x-label class="mb-1">
                <span class="text-primary text-base md:text-lg font-bold">
                    Ciudad / Región
                </span>
                <span class="text-red-500 text-base md:text-lg font-bold">*</span>
            </x-label>
            <x-input class="w-full" placeholder="Desde dónde nos escribes" wire:model.live="inquiry.location" />
            <x-input-error for="inquiry.location" />
        </div>

        {{-- Capacitación --}}
        <div>
            <x-label class="mb-1">
                <x-label class="mb-1">
                    <span class="text-primary text-base md:text-lg font-bold">
                        Capacitación
                    </span>
                </x-label>
            </x-label>

            <x-select id="" class="w-full" wire:model.live="inquiry.training_id">
                <option value="">
                    Seleccione una capacitación (Opcional)
                </option>
                @foreach ($trainings as $training)
                    <option value="{{ $training->id }}">
                        {{ $training->name }}
                    </option>
                @endforeach
            </x-select>
            <x-input-error for="inquiry.training_id" />
        </div>

        {{-- Número de contacto --}}
        <div>
            <x-label class="mb-1">
                <x-label class="mb-1">
                    <span class="text-primary text-base md:text-lg font-bold">
                        Teléfono o celular
                    </span>
                    
                    <span class="text-red-500 text-base md:text-lg font-bold">*</span>
                </x-label>
            </x-label>
            <x-input class="w-full" placeholder="Ingrese su número de contacto" wire:model.live="inquiry.contact_number" />
            <x-input-error for="inquiry.contact_number" />
        </div>

        {{-- Mensaje de Consulta --}}
        <div>
            <x-label class="mb-1">
                <x-label class="mb-1">
                    <span class="text-primary text-base md:text-lg font-bold">
                        Mensaje
                    </span>
                    
                    <span class="text-red-500 text-base md:text-lg font-bold">*</span>
                </x-label>
            </x-label>
            <textarea name="message"
                class="w-full h-60 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                placeholder="Ingresa tu mensaje aquí" wire:model.live="inquiry.message"></textarea>

            <x-input-error for="inquiry.message" />
        </div>

        {{-- Botón de enviar --}}
        <div class="flex w-full justify-center">

            <button type="submit" wire:loading.attr="disabled" wire:target="save"
                class="text-white text-lg font-medium bg-tertiary-contrast-1 py-2 px-6 rounded-lg">

                <div wire:loading.remove wire:target="save">
                    Enviar <i class="fa-solid fa-paper-plane ml-1"></i>
                </div>

                <div wire:loading wire:loading.flex wire:target="save" class="flex items-center justify-center">
                    Cargando 
                    <svg aria-hidden="true" class="ml-2 w-5 h-5 animate-spin fill-slate-500"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                </div>

            </button>
        </div>
    </div>
</form>
