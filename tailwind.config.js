import preset from "./vendor/filament/support/tailwind.config.preset";

export default {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./vendor/solution-forest/filament-tree/resources/**/*.blade.php",
        "./vendor/bezhansalleh/filament-exceptions/resources/views/**/*.blade.php", // Language Switch Views
    ],
};
