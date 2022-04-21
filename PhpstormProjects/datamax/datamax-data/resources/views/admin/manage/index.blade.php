<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.parts.head',['title'=>'管理者管理'])
</head>
<body class="g-sidenav-show  bg-gray-200">
@include('admin.parts.sidemenu',['active'=>'manage'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('admin.parts.navbar')
        @can("isSuper")
        <div class="container-fluid py-1">
            @if (session('flash_message'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <span
                                            class="alert-text text-white"><strong>{{ session('flash_message') }}</strong></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                                <form>
                                    @csrf
                                    <div class="row">
                                        <h6 class="col-md-7 text-white text-capitalize ps-4">管理者一覧</h6>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="rom px-3">
                                <a href="{{route("admin.manage.create")}}">
                                    <button type="button" class="btn btn-outline-warning">新規作成</button>
                                </a>
                            </div>
                            <div class="rom px-3">

                            </div>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            管理者名
                                        </th>
                                        <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                            ログインID
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ロール
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            登録日付
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            最終更新日付
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            削除日付
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @isset($response)
                                        @foreach($response as $admin_data)
                                            <tr>
                                                <td class="text-center">
                                                    {{$admin_data->id}}
                                                </td>
                                                <td class="text-center">
                                                    {{$admin_data->name}}
                                                </td>
                                                <td class="text-center">
                                                    {{$admin_data->login_id}}
                                                </td>
                                                <td class="text-center">
                                                    {{$admin_data->role}}
                                                </td>
                                                <td class="text-center">
                                                    {{$admin_data->created_at}}
                                                </td>
                                                <td class="text-center">
                                                    {{$admin_data->updated_at}}
                                                </td>
                                                <td class="text-center">
                                                    {{$admin_data->deleted_at}}
                                                </td>
                                                <td class="text-center">
                                                    <a class="index_link"
                                                       href="{{route("admin.manage.edit", ["manage_id"=>$admin_data->id])}}">
                                                        <button class="btn btn-secondary">編集</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@else
    <div class="container-fluid">
        <div class="m-8 d-flex justify-content-center align-items-center">
            <h2 class="p-11">スーパーユーザーのみユーザ一覧が表示されます。</h2>
        </div>
    </div>
@endcan
@include('admin.parts.footer_script')
</body>

</html>