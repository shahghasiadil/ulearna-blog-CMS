{{-- @class(['post' => $post]) --}}

<div>
    <h4><a href="{{ route('profile', $post->user) }}">{{ $post->user->name }}</a></h4>
    <h5>{{ $post->title }}</h5>
    <p class="text-muted">{{ $post->created_at->diffForHumans() }}</p>

    @if (!empty($post->image_url))
        <div class="position-relative mb-3">
            <img src="{{ asset('storage/posts/' . $post->image_url) }}" alt="" class="img-thumbnail">
        </div>
    @else
        <div class="position-relative mb-3">
            <img src="{{ asset('assets/images/small/img-2.jpg') }}" alt="" class="img-thumbnail">
        </div>
    @endif


    <ul class="list-inline">
        <li class="list-inline-item mr-3">
            <a href="#" class="text-muted">
                <i class="bx bx-purchase-tag-alt align-middle text-muted mr-1"></i>
                {{ $post->category->name }}
            </a>
        </li>
        <li class="list-inline-item mr-3">
            <a href="#" class="text-muted">
                <i class="bx bx-comment-dots align-middle text-muted mr-1"></i>
                12
                Comments
            </a>
        </li>
        <li class="list-inline-item mr-3">
            <a href="#" class="text-muted">

                {{ $post->likes()->count() }} {{ Str::plural('like', $post->likes()->count()) }}
            </a>
        </li>
        <li class="list-inline-item mr-3">
            @if (!$post->likedBy(Auth::user()))
                <form action="{{ route('posts.likes', $post) }}" method="post">
                    @csrf
                    <button class="btn"> <i class="bx bx-like align-middle text-muted mr-1"></i>
                        Like</button>
                </form>

            @else
                <form action="{{ route('posts.unlike', $post) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn"> <i class="bx bx-dislike align-middle text-muted mr-1"></i>
                        Unlike</button>
                </form>
            @endif




        </li>
        @can('update', $post)
            <li class="list-inline-item mr-3">
                <form class="" action="{{ route('posts.edit', $post->id) }}">
                    <button type="submit" class="btn"> Edit <i
                            class="fas fa-edit align-middle text-muted mr-1"></i></button>
                </form>
            </li>
        @endcan


        @can('delete', $post)
            <li class="list-inline-item mr-3">
                <form class="" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn"> Delete <i
                            class="bx bx-trash-alt align-middle text-muted mr-1"></i></button>
                </form>
            </li>
        @endcan



    </ul>
    <p> {{ $post->body }}
    </p>

    <div>
        <a href="#" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
    </div>
</div>
