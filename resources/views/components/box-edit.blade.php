<div class="mt-0 print:hidden">
    <span class="bg-red-500 text-white px-6 pb-1">
        {{ $title ?? '変更' }}
    </span>
    <div {{ $attributes->class(['border-4 border-red-500 p-3']) }}>
        {{ $slot }}
    </div>
</div>
