@extends('layout')


@section('header')
    <header>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container d-flex justify-content-between">
                <a href="index" class="navbar-brand d-flex align-items-center">
                    <strong>顧客管理</strong>
                </a>
            </div>
        </div>
    </header>
@endsection

@section('main-content')
    <main role="main">

        <div class="container-fluid" style="padding-left: 50px;padding-right: 50px;">
            <div class="py-5 text-center">

                <div class="alert alert-success" role="alert">
                    【メッセージサンプル】登録が完了しました。
                </div>

                <div style="margin-bottom:20px;">
                    <form id="form" method="get" action="/search">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="lastKana" class="col-sm-2 col-form-label">姓かな</label>
                                    <div class="col-sm-6">
                                        <label>
                                            <input type="text" class="form-control" name="last_kana" placeholder="姓かな">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="firstKana" class="col-sm-2 col-form-label">名かな</label>
                                    <div class="col-sm-6">
                                        <label>
                                            <input type="text" class="form-control" name="first_kana" placeholder="名かな">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="firstName" class="col-sm-2 col-form-label">性別</label>
                                    <div class="col-sm-10 text-left">
                                        <div class="form-check form-check-inline">
                                            <label>
                                                <input class="form-check-input" type="checkbox" name="gender1" value="1">
                                            </label>
                                            <label class="form-check-label" for="inlineCheckbox1">男</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label>
                                                <input class="form-check-input" type="checkbox" name="gender2" value="2">
                                            </label>
                                            <label class="form-check-label" for="inlineCheckbox2">女</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="prefId" class="col-sm-2 col-form-label">都道府県</label>
                                    <div class="col-sm-3">
                                        <label>
                                            <select class="custom-select d-block" name="pref_id">
                                                <option value="0"></option>
                                                @foreach($prefs as $pref)
                                                  <option value="{{ $pref->id }}">{{ $pref->name }}</option>
                                                @endforeach

                                            </select>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="form-group">
                        <button type="button" id="search" class="btn btn-primary" style="width:150px"><i class="fas fa-search pr-1"></i> 検索</button>
                    </div>

                    @if(count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    @endif

                    <div class="form-group row">
                        <a  class="btn btn-success" href="create" style="width:150px"><i class="fas fa-chalkboard-teacher pr-1"></i> 新規登録</a>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">名前</th>
                                <th scope="col">かな</th>
                                <th scope="col">性別</th>
                                <th scope="col">生年月日</th>
                                <th scope="col">郵便番号</th>
                                <th scope="col">都道府県</th>
                                <th scope="col">市区町村</th>
                                <th scope="col">電話番号</th>
                                <th scope="col">携帯番号</th>
                                <th scope="col">メールアドレス</th>
                                <th scope="col">作成日時</th>
                                <th scope="col">更新日時</th>
                                <th scope="col">削除日時</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="content">
                            @foreach( $customers as $customer )
                                <tr>
                                    <td scope="col">{{ $customer->id }}</td>
                                    <td scope="col"><a href="detail/{{ $customer->id }}">{{ $customer->last_name }} {{ $customer->first_name }}</a></td>
                                    <td scope="col">{{ $customer->last_kana }} {{ $customer->first_kana }}</td>
                                    <td scope="col">{{ $customer->gender }}</td>
                                    <td scope="col">{{ $customer->birthday->format('Y/n/d') }}</td>
                                    <td scope="col">{{ $customer->post_code }}</td>
                                    <td scope="col">{{ $customer->pref->name }}</td>
                                    <td scope="col">{{ $customer->city->name }}</td>
                                    <td scope="col">{{ $customer->tel }}</td>
                                    <td scope="col">{{ $customer->mobile }}</td>
                                    <td scope="col">{{ $customer->email }}</td>
                                    <td scope="col">{{ $customer->created_at }}</td>
                                    <td scope="col">{{ $customer->updated_at }}</td>
                                    <td scope="col">{{ $customer->deleted_at }}</td>
                                    <td scope="col"><a class="btn btn-info" href="edit/{{ $customer->id }}">編集</a></td>
                                </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {{ $customers->appends(Request::all())->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        $("#search").click(function() {
            $("form").submit();
        });
    </script>

@endsection
