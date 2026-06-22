@props(['tone' => 'gold'])

{{-- Дві фіксовані варіації, щоб Tailwind гарантовано згенерував класи --}}
<div class="relative h-1 w-full overflow-hidden bg-transparent">
    @if ($tone === 'dark')
        <div class="absolute inset-0 bg-linear-to-r from-transparent via-[#0a0a0a] to-transparent opacity-80"></div>
    @else
        <div class="absolute inset-0 bg-linear-to-r from-transparent via-[#ffd700] to-transparent opacity-80"></div>
    @endif
</div>
