@props(['title' => null, 'selectTitle' => 'Select Of Breed' , 'model' => $attributes->whereStartsWith('wire:model')->first() , 'options' => null, 'track_by' => 'id' , 'track_display' => 'title' , 'field' => null, 'value' => null])

<div class="input-box" wire:ignore>

    @if($title)
        <label class="label-text">{{ $title }}</label>
    @endif

    <div class="form-group user-chosen-select-container">
        <select class="user-chosen-select custom-chosen" id="{{ is_null($field) ? $model : $model . '_' . $field }}">
            <option value="">{{ $selectTitle }}</option>
            @foreach($options as $option)
                <option value="{{ $option[$track_by] }}" {{ $option[$track_by] == $value ? 'selected' : ''  }}>{{ $option[$track_display] }}</option>
            @endforeach
        </select>
    </div><!-- end form-group -->

    @push('scripts')
        <script>
            @if(is_null($field))
                $('#{{ $model }}').chosen().change(function (e) {
                   @this.set('{{ $model }}', e.target.value)
                })
            @else
                $('#{{ $model }}_{{ $field }}').chosen().change(function (e) {
                    @this.set('{{ $model }}.{{ $field }}', e.target.value)
                })
            @endif
        </script>
    @endpush
</div>
