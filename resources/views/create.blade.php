@extends('layout')

@section('header')
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="/index" class="navbar-brand d-flex align-items-center">
                    <strong>顧客管理（新規登録）</strong>
                </a>
            </div>
        </div>
    </header>
@endsection

@section('main-content')
    <main role="main">
        <div class="container-fluid" style="margin-top: 50px; padding-left: 100px;padding-right: 100px;">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="form" method="post" action="create">
                {{ csrf_field() }}
                <div class="col-md-8 order-md-1">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="last_name">姓 <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="last_name" placeholder="姓" value="{{ old('last_name','') }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="firstName">名 <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="first_name" placeholder="名" value="{{ old('first_name','') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="lastKana">姓かな <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="last_kana" placeholder="姓かな" value="{{ old('last_kana','') }}" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="firstKana">名かな <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="first_kana" placeholder="名かな" value="{{ old('first_name','') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="gender">性別 <span class="badge badge-danger">必須</span></label>
                            <div class="col-sm-10 text-left">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="1">
                                    <label class="form-check-label" for="inlineCheckbox1">男</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="2">
                                    <label class="form-check-label" for="inlineCheckbox2">女</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="birthday">生年月日 <span class="badge badge-danger">必須</span></label>
                            <input id="ymd-form" type="date" class="form-control" name="birthday" placeholder="生年月日" value="{{ old('birthday','') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="postCode">郵便番号 <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="post_code" placeholder="郵便番号" value="{{ old('post_code','') }}" required>
                        </div>
                    </div>

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

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="address">住所 <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="address" placeholder="住所" value="{{ old('address','') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="building">建物名</label>
                            <input type="text" class="form-control" name="building" placeholder="建物名" value="{{ old('building','') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="tel">電話番号 <span class="badge badge-danger">必須</span></label>
                            <input type="tel" class="form-control" name="tel" placeholder="番号（自宅）" value="{{ old('tel','') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="mobile">携帯番号 <span class="badge badge-danger">必須</span></label>
                            <input type="tel" class="form-control" name="mobile" placeholder="番号（携帯）" value="{{ old('mobile','') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="email">メールアドレス <span class="badge badge-danger">必須</span></label>
                            <input type="email" class="form-control" name="email" placeholder="メールアドレス" value="{{ old('email','') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="remarks">備考</label>
                            <textarea class="form-control" aria-label="With textarea" name="remarks" value="{{ old('remarks','') }}"></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <hr class="mb-4">
            <div class="form-group">
                <a  class="btn btn-secondary" href="index" style="width:150px">戻る</a>
                <button id="complete" type="submit" class="btn btn-success" style="width:150px"><i class="fas fa-database pr-1"></i> 登録</button>
            </div>
        </div>
    </main>
@endsection

<div id="complete-confirm" title="確認" style="display: none;">
    <p><span class="ui-icon ui-icon-info" style="float:left; margin:12px 12px 20px 0;"></span>登録しますか？</p>
</div>

@section('script')
    <script>
        $("#complete").click(function() {
            completeConfirm(function(result){
                if (result) {
                $("form").submit();
            }
            });
        });

        function completeConfirm(response){
            notScreenRelease = true;
            var buttons = {};
            buttons['キャンセル'] = function(){$(this).dialog('close');response(false)};
            buttons['作成'] = function(){$(this).dialog('close');response(true)};

            $("#complete-confirm").dialog({
                show: {
                    effect: "drop",
                    duration: 500
                },
                hide: {
                    effect: "drop",
                    duration: 500
                },
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: buttons
            });
        }

        $('#pref_id').change(function(event) {
            // 選択中の option の値を取得します
            const selected_pref_id = $(event.target).val();
            // 市区町村の選択状態をリセットします
            // 都道府県 x 市区町村の組み合わせ不⼀致防⽌に有効です
            const $city = $('#city_id');
            $city.val("");
            $city.children().remove();
            $city.attr('disabled', true);
            
            // Ajax 通信を⾏います
            $.ajax({
            type: 'GET',
            url: '/test-api',
            // GET パラメーターに、「今選択した都道府県のID」を指定します
            data: "pref_id=" + selected_pref_id,
            }).done(function (responseJson) {
            // API から受け取った結果を処理するためのコールバック処理
            responseJson.forEach(function (city) {
            // HTMLを⽣成し、市区町村の候補に追加します
            const html = '<option value="' + city.id + '">' + city.name +
           '</option>';
            $(html).appendTo($city);
            });
            // 候補の調整が完了したため、市区町村を選択できるようにします
            $city.attr('disabled', false);
            }).fail(function () {
            alert('市区町村データの取得に失敗しました。');
            });
           });
    </script>

@endsection

