<a {{ $attributes->merge([
    'class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-white hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition duration-150 ease-in-out'
]) }}>
    {{ $slot }}
</a>
