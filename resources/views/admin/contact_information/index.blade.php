<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Información de Contacto',
    ],
]">

    <div class="mx-auto max-w-[1230px]">

        <x-validation-errors class="mb-3 p-4 border-2 border-red-500 rounded-md" />

        <form action="{{ route('admin.contact_information.update', $contact_information) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="card-gray mx-auto">
                <!-- Campos del formulario -->

                <div>
                    <div class="mb-4 grid cols-1 gap-4">
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">Teléfono</x-label>
                            <x-input class="w-full" placeholder="Ingrese el teléfono de contacto" name="phone"
                                value="{{ old('phone', $contact_information->phone) }}" />
                            <x-input-error for="phone" />
                        </div>
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">Celular</x-label>
                            <x-input class="w-full" placeholder="Ingrese el celular de contacto" name="cellphone"
                                value="{{ old('cellphone', $contact_information->cellphone) }}" />
                            <x-input-error for="cellphone" />
                        </div>
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">Correo electrónico</x-label>
                        <x-input class="w-full" placeholder="Ingrese el correo electrónico de contacto" name="email"
                            value="{{ old('email', $contact_information->email) }}" />
                        <x-input-error for="email" />
                    </div>

                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">Enlace Facebook</x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de la página de Facebook (Opcional)"
                            name="facebook_link"
                            value="{{ old('facebook_link', $contact_information->facebook_link) }}" />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">Enlace Twitter</x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Twitter (Opcional)"
                            name="twitter_link" value="{{ old('twitter_link', $contact_information->twitter_link) }}" />
                    </div>
                    <div class="mb-4">
                        <x-label class="mb-1 text-[15px] font-black">Enlace Instagram</x-label>
                        <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Instagram (Opcional)"
                            name="instagram_link"
                            value="{{ old('instagram_link', $contact_information->instagram_link) }}" />
                    </div>
                </div>
                <div class="flex justify-end">

                    <x-button>Actualizar</x-button>
                </div>
            </div>
        </form>

    </div>

</x-admin-layout>
