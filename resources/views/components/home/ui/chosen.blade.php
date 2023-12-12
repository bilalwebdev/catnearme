@props(['title' => 'Region', 'selectTitle' => 'Select ...' , 'model' => $attributes->whereStartsWith('wire:model')->first() , 'options' => null, 'value' => null,  'trackBy' => 'id' , 'select' => 'title'])

<div>
    <label class="label-text">{{ $title }}</label>
    <select class="form-control-select w-100 @error($model) form-control-error @enderror" style="height: 40px; margin-bottom: 15px" id="{{ $model }}" wire:model.defer="{{ $model }}">
        <option>{{ $selectTitle }}</option>
        @foreach($options as $option)
            <option value="{{ $option[$trackBy] }}">{{ $option[$select] }}</option>
        @endforeach
    </select>

    @error($model)
    <p class="font-size-14 mt-n2 text-color-15">{{ $message }}</p>
    @enderror

</div>
