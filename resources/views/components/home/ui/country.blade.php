@props(['title' => null, 'selectTitle' => 'Select Of Country' , 'model' => $attributes->whereStartsWith('wire:model')->first() , 'options' => null, 'value' => null, 'track_by' => 'id' , 'track_display' => 'name', 'field' => null])

<div class="input-box">
    @if($title)
        <label class="label-text">{{ $title }}</label>
    @endif
    <div class="form-group user-chosen-select-container" wire:ignore>
        <select class="user-chosen-select country" id="{{ is_null($field) ? $model : $model . '_' . $field }}">
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
