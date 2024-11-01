<title>{{$siteSetting->name}} - Contact Us</title>

<x-layouts.app>
    <x-contact.section-contact-header :data="$setting"/>
    <x-contact.section-contact-info :data="$setting"/>
    <x-contact.section-maps :data="$setting"/>
    <!-- <x-global.section-cta /> -->
    <x-modals.modal-privacy-policy />
</x-layouts.app>