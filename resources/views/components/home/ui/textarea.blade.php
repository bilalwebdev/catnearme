@props(['title',  'model' => $attributes->whereStartsWith('wire:model')->first() , 'icon' => 'la la-pencil form-icon' ])

<div class="input-box">
    <label class="label-text">{{ $title }}</label>
    <div class="form-group">
        <span class="{{ $icon }} form-icon"></span>
        <textarea wire:model.defer="{{ $model }}" {{ $attributes->merge(['class' => 'message-control form-control']) }}></textarea>
    </div>

    @error($model)
       <p class="font-size-14 mt-n2 text-color-15">{{ $message }}</p>
    @enderror

</div>
