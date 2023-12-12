@props(['title' => null,  'model' => $attributes->whereStartsWith('wire:model')->first() , 'icon' => null ])

<div class="input-box">

    @if($title)
        <label class="label-text">{{ $title }}</label>
    @endif

    <div class="form-group">
        @if(! is_null($icon))
            <span class="{{ $icon }} form-icon"></span>
        @endif
        <input class="form-control form-control-styled @error($model) form-control-error is-invalid @enderror" {{ $attributes->merge(['type' => 'text']) }} wire:model.defer="{{ $model }}">
    </div>
    @error($model)
       <p class="font-size-14 mt-n2 text-color-15">{{ $message }}</p>
    @enderror
</div>
