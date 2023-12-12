@props(['title', 'model' => $attributes->whereStartsWith('wire:model')->first() ])

<div class="custom-checkbox mt-2">
    <input type="checkbox" id="{{ $model }}" wire:model.defer="{{ $model }}">
    <label for="{{ $model }}" class="font-size-14">By signing up, you agree to our <a href="{{ route('page.info' , 'terms-and-conditions') }}" class="text-color-2">Terms and Conditions</a> and
        <a class="text-color-2" href="{{ route('page.info' , 'privacy-policy') }}">Privacy Policy</a></label>

    @error($model)
      <p class="font-size-14 mt-1 text-color-15">{{ $message }}</p>
    @enderror
</div>
