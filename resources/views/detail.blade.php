@extends('layout')

@section('header')
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="/index" class="navbar-brand d-flex align-items-center">
                    <strong>顧客管理（詳細）</strong>
                </a>
            </div>
        </div>
    </header>
@endsection

@section('main-content')
    <main role="main">
        <div class="container-fluid" style="margin-top: 50px; padding-left: 100px;padding-right: 100px;">
                {{ csrf_field() }}
                <div class="col-md-8 order-md-1">

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="lastName">姓</label>
                            <input type="text" class="form-control" name="last_name" value="{{ $customers->last_name }}" readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="firstName">名</label>
                            <input type="text" class="form-control" name="first_name"  value="{{ $customers->first_name }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="lastKana">姓かな</label>
                            <input type="text" class="form-control" name="last_kana" value="{{ $customers->last_kana }}" readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="firstKana">名かな</label>
                            <input type="text" class="form-control" name="first_kana" value="{{ $customers->first_kana }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="gender">性別</label>
                            <input type="text" class="form-control" name="gender" value="{{ $customers->gender }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="birthday">生年月日</label>
                            <input type="date" class="form-control" name="birthday" value="{{ $customers->birthday }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="postCode">郵便番号</label>
                            <input type="text" class="form-control" name="post_code" value="{{ $customers->post_code }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="prefId">都道府県</label>
                            <input type="text" class="form-control" name="pref_id" value="{{ $customers->prefectures }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="address">住所</label>
                            <input type="text" class="form-control" name="address" value="{{ $customers->address }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="building">建物名</label>
                            <input type="text" class="form-control" name="building" value="{{ $customers->building }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="tel">電話番号</label>
                            <input type="tel" class="form-control" name="tel" value="{{ $customers->tel }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="mobile">携帯番号</label>
                            <input type="tel" class="form-control" name="mobile" value="{{ $customers->mobile }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="email">メールアドレス</label>
                            <input type="email" class="form-control" name="email" value="{{ $customers->email }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="remarks">備考</label>
                            <textarea class="form-control" aria-label="With textarea" name="remarks" value="myremarks" readonly>{{ $customers->remarks }}</textarea>
                        </div>
                    </div>
                </div>
            <hr class="mb-4">
            <div class="form-group">
                <a  class="btn btn-secondary" href="/index" style="width:150px">戻る</a>
                <button id="complete" type="button" class="btn btn-danger" style="width:150px"><i class="fas fa-database pr-1"></i> 削除</button>
            </div>
        </div>
    </main>
@endsection

<div id="complete-confirm" title="確認" style="display: none;">
    <p><span class="ui-icon ui-icon-info" style="float:left; margin:12px 12px 20px 0;"></span>削除しますか？</p>
</div>

@section('script')
    <script>
        $("#complete").click(function() {
            completeConfirm(function(result){
                if (result) {
                    location.replace("{{ route('customer_delete', ['id' => $customers->id]) }}")
                }
            });
        });

        function completeConfirm(response){
            notScreenRelease = true;
            var buttons = {};
            buttons['キャンセル'] = function(){$(this).dialog('close');response(false)};
            buttons['削除'] = function(){$(this).dialog('close');response(true)};

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
