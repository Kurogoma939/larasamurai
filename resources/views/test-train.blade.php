<div class="row">
    <div class="col-md-2 mb-3">
        <label for="prefId">都道府県 <span class="badge badge-danger">必須</span></label>
        <select id="pref_id" class="custom-select d-block w-100" name="pref_id" required>
            <option value="{{ old('$pref->id') }}">{{ old('$pref->name') }}</option>
            @foreach($prefs as $pref)
                <option value="{{ $pref->id }}">{{ $pref->name }}</option>
            @endforeach>
        </select>
    </div>

    <div>
        <label for="cityId">市区町村 <span class="badge badge-danger">必須</span></label>
        <select id="city_id" class="custom-select" name="city_id" required>
            <option value="{{old('$city->id')}}">{{old('$city->name')}}</option>
            @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
        </select>
    </div>

</div>


<script>
    $('#pref_id').change(function() {
            $.ajax({
                type: 'GET',
                url: '/test',
                dataType: 'json',
            }).done(function () {
                $(function() {
                    var $child = $('#city_id');

                    $('#pref_id').change(function() {
                        var val1 = $(this).val();

                        $child.find('option').each(function() {
                            var val2 = $(this).data('val');
                            if (val1 != val2) {
                                $(this).not('#pref_id').remove();
                            }
                        });
                    });
                });

            }).fail(function () {
                alert('市区町村データの取得に失敗しました。');
            });
        }
    );
</script>

<!--
①都道府県が選ばれたら発火
②citiesテーブルの都道府県リストと一致しない部分を排除
-->

