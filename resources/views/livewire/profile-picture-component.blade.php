<div>
    <input wire:model="picture"
        class="block w-full text-sm border rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-[#222222] border-gray-600 placeholder-gray-400"
        id="picture" name="picture" type="file" accept="image/*">

    @if ($picture)
        <img src="{{ $picture->temporaryUrl() }}" class="py-4 mx-auto rounded-full max-h-60">
    @else
        <img src="{{ asset(Auth::user()->picture) }}" class="py-4 mx-auto rounded-full max-h-60">
    @endif
</div>
