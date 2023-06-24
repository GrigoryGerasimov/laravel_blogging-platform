<p>Dear <strong>{{ $name }}</strong>,</p>

<h4>You have a new comment to your Blog post!</h4>

<blockquote>
    <p>
        <i>Comment to Post {{ $comment->post->id }} {{ $comment->post->title }}</i>
    </p>
    <p>
        <i>{{ strip_tags($comment->content) }}</i>
    </p>
    <p>
        <i>Left by user {{ $comment->user->name }} at {{ $comment->created_at }}</i>
    </p>
</blockquote>
