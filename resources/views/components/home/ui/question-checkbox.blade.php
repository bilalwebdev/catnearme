@props(['title', 'model' => $attributes->whereStartsWith('wire:model')->first() , 'popup' => null, 'disabled' => null ])

<div class="custom-checkbox mt-2">
    <input type="checkbox" id="{{ $model }}" wire:model.defer="{{ $model }}" {{ $disabled ? 'disabled' : '' }}>
    <label for="{{ $model }}" class="font-size-14">
        {{ $title }}
        <i class="la la-question tip ml-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $popup }}"></i>
    </label>

    @error($model)
      <p class="font-size-14 mt-1">{{ $message }}</p>
    @enderror
</div>
