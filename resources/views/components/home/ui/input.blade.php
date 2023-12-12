@props(['title',  'model' => $attributes->whereStartsWith('wire:model')->first() , 'icon' => null ])

<div class="form-group mb-0">

    @if(! is_null($icon))
        <span class="{{ $icon }} form-icon"></span>
    @endif

    <input class="form-control  @error($model) form-control-error is-invalid @enderror" type="search" placeholder="{{ __('Search By Keyword') }}" wire:model.defer="{{ $model }}">

    @error($model)
      <p class="font-size-14 mt-n2 text-color-15">{{ $message }}</p>
    @enderror
</div>
