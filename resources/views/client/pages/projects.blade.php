<title>{{$siteSetting->name}} - Projects</title>

<x-layouts.app>
    <x-projects.section-projects-header :data="$setting"/>
    <x-projects.section-projects-list :data="$setting" :projects="$projects"/>
</x-layouts.app>