module.exports = {
  mode: 'jit',
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/rappasoft/laravel-livewire-tables/resources/views/tailwind/**/*.blade.php',
    './tailwind-safelist.txt'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/aspect-ratio'),
    require('tailwind-safelist-generator')({
      path: 'tailwind-safelist.txt',
      patterns: [
        'p-{spacing}',
        'px-{spacing}',
        'py-{spacing}',
        'pt-{spacing}',
        'pb-{spacing}',
        'pl-{spacing}',
        'pr-{spacing}',
        'm-{spacing}',
        'mx-{spacing}',
        'my-{spacing}',
        'mt-{spacing}',
        'mb-{spacing}',
        'ml-{spacing}',
        'mr-{spacing}',
        'rounded-{borderRadius}',
        'text-{colors}',
        'bg-{colors}',
        'border-{borderWidth}',
        '{screens}:gap-{spacing}'
      ],
    }),
  ],
}
