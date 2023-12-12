@props(['title', 'model' => $attributes->whereStartsWith('wire:model')->first() , 'value' => null ])

<div class="custom-checkbox mt-2">
    <input type="checkbox" id="{{ $model }}" value="{{ $value }}" wire:model="{{ $model }}">
    <label for="{{ $model }}" class="font-size-14">{{ $title }}</label>

    @error($model)
      <p class="pt-2 font-size-14 mt-n2 text-color-15">{{ $message }}</p>
    @enderror
</div>
