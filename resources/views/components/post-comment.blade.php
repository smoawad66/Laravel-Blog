{{-- @props(['comment']) --}}

<article class="flex bg-gray-900 border-gray-200 p-6 rounded-xl space-x-4">

    <div class="flex-shrink-0">
        <img src="{{ $comment->author->id == 1 ? '/images/elsayed410.jpg' : "https://i.pravatar.cc/60?u={$comment->author->id}" }}"
            alt="" width="60" height="60" class="rounded-xl">
    </div>

    <div>
        <header class="mb-4">
            <h3 class="font-bold"> {{ $comment->author->name }} </h3>
            <p class="text-xs mb-3"> {{ "@{$comment->author->username}" }} </p>
            <p class="text-xs"> Posted at<time> {{ $comment->created_at->format('j F, Y, g:i a') }} </time> </p>
        </header>

        <p>
            {{ $comment->body }}
        </p>

    </div>

</article>
