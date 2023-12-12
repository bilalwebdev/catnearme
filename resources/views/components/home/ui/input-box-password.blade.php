@props(['title' , 'model' => $attributes->whereStartsWith('wire:model')->first() ])

<div class="input-box">
    <label class="label-text">{{ $title }}</label>
    <div class="form-group">
        <span class="la la-lock form-icon"></span>
        <input class="form-control form-control-styled @error($model) form-control-error is-invalid @enderror" {{ $attributes->merge(['type' => 'password']) }} autocomplete="off" wire:model.defer="{{ $model }}">
    </div>
    @error($model)
      <p class="font-size-14 mt-n2 text-color-15">{{ $message }}</p>
    @enderror
</div>
