@extends('layouts.app')

@section('content')
    <div class="st-Wrapper">
        <div class="rp-Container">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="rp-List">
                        <div class="rp-Message">
                            <div class="rp-Message_User">
                                <span class="rp-Message_Name">{{ $post->screen_name }}</span>
                                <span class="rp-Message_Id">&#64;{{ $post->user_id }}</span>
                                @if($post->user_id === 'Anonymous')
                                    <i class="fas fa-user-secret"></i>
                                @endif
                                <span class="rp-Message_Time">{{ str_replace('-', '/', $post->created_at) }}</span>
                            </div>
                            <p>{!! nl2br(htmlspecialchars($post->comment)) !!}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="rp-NotComment">このルームはまだ誰も投稿していません！</div>
            @endif
            <div class="rp-pagination">{{ $posts->links() }}</div>
        </div>
        <div id="accordion" class="rp-Accordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <div id="collapseOne" class="collapse in" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="rp-Nav_Area">
                                <ul class="nav nav-tabs rp-Nav_Tabs" id="myTab" role="tablist">
                                    <li class="nav-item active rp-Nav_Tab">
                                        <a class="nav-link rp-normal" data-toggle="tab" href="#normal" role="tab" aria-controls="normal" aria-expanded="true">ノーマル</a>
                                    </li>
                                    <li class="nav-item rp-Nav_Tab">
                                        <a class="nav-link rp-file" data-toggle="tab" href="#file" role="tab" aria-controls="file" aria-expanded="false">ファイル選択</a>
                                    </li>
                                    <li class="nav-item rp-Nav_Tab">
                                        <a class="nav-link rp-gif" data-toggle="tab" href="#gif" role="tab" aria-controls="gif" aria-expanded="false">gif</a>
                                    </li>
                                    <li class="nav-item rp-Nav_Tab">
                                        <a class="nav-link rp-write" data-toggle="tab" href="#write" role="tab" aria-controls="write" aria-expanded="false">手書き</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane active" id="normal" role="tabpanel">
                                        <div class="rp-Post_Wrapper">
                                            <div class="rp-Post_Container">
                                                <form enctype="multipart/form-data" action="{{ url('/api/comment/store') }}" method="POST" class="rp-Form">
                                                    {{ csrf_field() }}
                                                    <textarea name="comment" placeholder="Please write here." class="rp-TextArea" autofocus required minlength="1" maxlength="1000"></textarea>
                                                    <div class="rp-Form_Other d-flex">
                                                        <input type="hidden" value="{{ Request::decodedPath() }}" name="room_id">
                                                        <button type="submit" class="st-Button rp-Button">投稿する</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="file" role="tabpanel">
                                        <div class="rp-Post_Wrapper">
                                            <div class="rp-Post_Container">
                                                <form enctype="multipart/form-data" action="{{ url('/api/comment/store') }}" method="POST" class="rp-Form">
                                                    {{ csrf_field() }}
                                                    <input type="file" name="image" class="rp-file mr-auto">
                                                    <div class="rp-Form_Other d-flex">
                                                        <input type="hidden" value="{{ Request::decodedPath() }}" name="room_id">
                                                        <button type="submit" class="st-Button rp-Button">投稿する</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="gif" role="tabpanel">
                                        <div class="rp-Post_Wrapper">
                                            <div class="rp-Post_Container">
                                                <form enctype="multipart/form-data" action="{{ url('/api/comment/store') }}" method="POST" class="rp-Form">
                                                    {{ csrf_field() }}
                                                    <p>工事中</p>
                                                    {{--<div class="rp-Form_Other d-flex">--}}
                                                        {{--<input type="hidden" value="{{ Request::decodedPath() }}" name="room_id">--}}
                                                        {{--<button type="submit" class="st-Button rp-Button">投稿する</button>--}}
                                                    {{--</div>--}}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="write" role="tabpanel">
                                        <div class="rp-Post_Wrapper">
                                            <div class="rp-Post_Container">
                                                <form enctype="multipart/form-data" action="{{ url('/api/comment/store') }}" method="POST" class="rp-Form">
                                                    {{ csrf_field() }}
                                                    <p>工事中</p>
                                                    {{--<div class="rp-Form_Other d-flex">--}}
                                                        {{--<input type="hidden" value="{{ Request::decodedPath() }}" name="room_id">--}}
                                                        {{--<button type="submit" class="st-Button rp-Button">投稿する</button>--}}
                                                    {{--</div>--}}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rp-Bar">
                        <button class="btn btn-link rp-BarText" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true">
                            <i class="fas fa-window-maximize"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
