<title>{{$siteSetting->name}} - Factory</title>

<x-layouts.app>
    <x-factories.section-factories-header/>
    <x-factories.section-factories-content :data="$setting"/>
    <x-factories.section-features :data="$setting->statistic_data"/>
    <x-factories.section-certificate :data="$setting"/>
    <x-global.section-cta />
</x-layouts.app>