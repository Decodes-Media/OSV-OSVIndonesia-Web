<title>{{$siteSetting->name}} - Specialities</title>

<x-layouts.app>
    <x-specialities.section-specialities-header :data="$setting"/>
    <x-specialities.section-specialities-hospitality :data="$setting"/>
    <x-specialities.section-specialities-oem-manufacturer :data="$setting" :material="$material"/>
    <x-specialities.section-specialities-white-label :data="$setting"/>
    <x-global.section-cta />
</x-layouts.app>