<title>{{$siteSetting->name}} - About Us</title>

<x-layouts.app>
    <x-about.section-about-header :data="$setting"/>
    <x-about.section-stories :data="$setting"/>
    <x-about.section-profile />
    <x-about.section-values :data="$setting"/>
    <x-about.section-about :data="$setting"/>
    <x-home.section-running-text :data="$homesetting"/>
    <x-about.section-whats-next :data="$setting"/>
</x-layouts.app>