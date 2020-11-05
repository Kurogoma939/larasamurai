@extends('layout')

@section('header')
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="index" class="navbar-brand d-flex align-items-center">
                    <strong>顧客管理（新規登録）</strong>
                </a>
            </div>
        </div>
    </header>
@endsection

@section('main-content')
    <main role="main">
        <div class="container-fluid" style="margin-top: 50px; padding-left: 100px;padding-right: 100px;">
            <div class="alert alert-danger" role="alert">
                【メッセージサンプル】エラーです。
            </div>

            <form id="form" method="post" action="index.html">
                <div class="col-md-8 order-md-1">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="lastName">姓 <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="last_name" placeholder="姓" value="" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="firstName">名 <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="first_name" placeholder="名" value="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="lastKana">姓かな <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="last_kana" placeholder="姓かな" value="" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="firstKana">名かな <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="first_kana" placeholder="名かな" value="" required>
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
                            <input type="date" class="form-control" name="birthday" placeholder="生年月日" value="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="postCode">郵便番号 <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="post_code" placeholder="郵便番号" value="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="prefId">都道府県 <span class="badge badge-danger">必須</span></label>
                            <select class="custom-select d-block w-100" name="pref_id" required>

                                @foreach($prefs as $pref)
                                    <option value="{{ $pref->id }}">{{ $pref->name }}</option>
                                @endforeach>

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="address">住所 <span class="badge badge-danger">必須</span></label>
                            <input type="text" class="form-control" name="address" placeholder="住所" value="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="building">建物名</label>
                            <input type="text" class="form-control" name="building" placeholder="建物名" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="tel">電話番号 <span class="badge badge-danger">必須</span></label>
                            <input type="tel" class="form-control" name="tel" placeholder="番号（自宅）" value="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="mobile">携帯番号 <span class="badge badge-danger">必須</span></label>
                            <input type="tel" class="form-control" name="mobile" placeholder="番号（携帯）" value="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="email">メールアドレス <span class="badge badge-danger">必須</span></label>
                            <input type="email" class="form-control" name="email" placeholder="メールアドレス" value="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="remarks">備考</label>
                            <textarea class="form-control" aria-label="With textarea" name="remarks"></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <hr class="mb-4">
            <div class="form-group">
                <a  class="btn btn-secondary" href="index" style="width:150px">戻る</a>
                <button id="complete" type="button" class="btn btn-success" style="width:150px"><i class="fas fa-database pr-1"></i> 登録</button>
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
                buttons['登録'] = function(){$(this).dialog('close');response(true)};

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
        </script>
@endsection
