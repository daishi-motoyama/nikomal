<ul class="nav nav-tabs justify-content-center mb-3" id="myTab">
    <li class="nav-item" role="presentation">
        <a class="nav-link text-muted active" id="comments_tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">
            コメント
            <span class="badge badge-white badge-pill">{{ $post->postComments->count() }}</span>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link text-muted" id="likes_tab" data-toggle="tab" href="#likes" role="tab" aria-controls="likes" aria-selected="true">
            いいね
            <span class="badge badge-white badge-pill">{{ $post->likes->count() }}</span>
        </a>
     </li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="comments" aria-labelledby="comments_tab">
        {{-- コメントフォーム --}}
        @if (Auth::check())
            @include('comments.comment_form')
        @endif
        {{-- コメント一覧 --}}
        @include('posts.comments')
    </div>
     <div class="tab-pane" id="likes" aria-labelledby="likes_tab">
         {{-- いいねユーザー一覧 --}}
         @include('posts.like_users')
    </div>
</div>
