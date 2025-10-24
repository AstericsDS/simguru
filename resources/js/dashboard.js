import { initFlowbite } from "flowbite";

Livewire.hook('component.init', ({ component, cleanup }) => {
    initFlowbite();
})