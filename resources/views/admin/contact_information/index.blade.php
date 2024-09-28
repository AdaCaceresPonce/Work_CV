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


            <div class="card mx-auto">
                <!-- Campos del formulario -->

                <div>

                    <div>

                        <x-admin.section-title class="mb-6">
                            <x-slot name="title">Datos principales</x-slot>
                            <x-slot name="description">Los medios de contacto para que se comuniquen tus clientes</x-slot>
                        </x-admin.section-title>

                        <div class="mb-4">
                            <x-label class="mb-1 text-[15px] font-black">Correo electrónico</x-label>
                            <x-input class="w-full" placeholder="Ingrese el correo electrónico de contacto"
                                name="email" value="{{ old('email', $contact_information->email) }}" />
                            <x-input-error for="email" />
                        </div>

                        <div class="mb-4">
                            <x-label class="mb-1 text-[15px] font-black">Teléfono</x-label>
                            <x-input class="w-full" placeholder="Ingrese el teléfono de contacto" name="phone"
                                value="{{ old('phone', $contact_information->phone) }}" />
                            <x-input-error for="phone" />
                        </div>
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">Celular</x-label>
                            <x-input class="w-full" placeholder="Ej: +51987654321" name="cellphone"
                                value="{{ old('cellphone', $contact_information->cellphone) }}" />
                            <x-input-error for="cellphone" />
                        </div>

                    </div>

                    <x-admin.section-border />

                    <div class="card">

                        <x-admin.section-title class="mb-6">
                            <x-slot name="title">
                                <i class="fa-brands fa-whatsapp text-[#017561] mr-1"></i> WhatsApp
                            </x-slot>
                        </x-admin.section-title>

                        <div class="mb-4">
                            <x-label class="mb-1 text-[15px] font-black">Número para Whatsapp</x-label>
                            <x-input class="w-full" placeholder="Ej: +51987654321" name="whatsapp_number"
                                value="{{ old('whatsapp_number', $contact_information->whatsapp_number) }}" />
                            <x-input-error for="whatsapp_number" />
                        </div>

                        <div>
                            <x-label class="mb-1 text-[15px] font-black">Mensaje predeterminado que enviará el cliente</x-label>
                            <x-input class="w-full" placeholder="Ej: Hola, estoy interesado, quiero más información."
                                name="whatsapp_message"
                                value="{{ old('whatsapp_message', $contact_information->whatsapp_message) }}" />
                            <x-input-error for="whatsapp_message" />
                        </div>

                    </div>

                    <x-admin.section-border />

                    <div>
                        <x-admin.section-title class="mb-6">
                            <x-slot name="title">Redes Sociales</x-slot>
                            <x-slot name="description">Rellena aquellas que utilizas más</x-slot>
                        </x-admin.section-title>

                        <div class="mb-4">
                            <x-label class="mb-1 text-[15px] font-black">Enlace Facebook</x-label>
                            <x-input class="w-full" placeholder="Ingrese el enlace de la página de Facebook (Opcional)"
                                name="facebook_link"
                                value="{{ old('facebook_link', $contact_information->facebook_link) }}" />
                        </div>
                        <div class="mb-4">
                            <x-label class="mb-1 text-[15px] font-black">Enlace Twitter</x-label>
                            <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Twitter (Opcional)"
                                name="twitter_link"
                                value="{{ old('twitter_link', $contact_information->twitter_link) }}" />
                        </div>
                        <div>
                            <x-label class="mb-1 text-[15px] font-black">Enlace Instagram</x-label>
                            <x-input class="w-full" placeholder="Ingrese el enlace de perfil de Instagram (Opcional)"
                                name="instagram_link"
                                value="{{ old('instagram_link', $contact_information->instagram_link) }}" />
                        </div>
                    </div>

                </div>

                <x-admin.section-border />

                <div class="flex justify-end">

                    <x-button>Guardar cambios</x-button>
                </div>
            </div>
        </form>

    </div>

</x-admin-layout>
