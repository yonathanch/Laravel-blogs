@props(['active' => false])

<a 
class=" {{ $active ? ' bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium"
aria-current="{{ $active ? 'page' : false }}" {{ $attributes }}>{{ $slot }}</a>
{{-- aria-current request.. hnaya untuk aksebilitas untuk lebih baik/secara visual tidak berarti untuk pagenya tidak selalu aktif--}}