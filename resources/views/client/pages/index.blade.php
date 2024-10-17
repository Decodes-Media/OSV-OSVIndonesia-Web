<style>
    img.header-logo {
        display: none;
    }

    #toggle-btn {
        display: flex !important;
    }
</style>

<x-layouts.app>
    <x-home.section-banner :data="$setting"/>
    <x-home.section-highlights :data="$setting->video"/>
    <!-- <x-home.section-video /> -->
    <x-home.section-services :data="$setting"/>
    <x-home.section-running-text :data="$setting"/>
    <x-home.section-intro :data="$setting"/>
    <x-home.section-product-showcase :data="$setting->support_image"/>
    <x-global.section-clients :data="$clients"/>
    <x-global.section-cta />
</x-layouts.app>
