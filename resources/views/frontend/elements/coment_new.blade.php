<div class="comments-area">
    @if(isset($comments))
        <h4>{{(count($comments) < 10 && count($comments) > 1)?'0'.count($comments).' Comments':'Không có bình luận nào'}} </h4>
        @foreach($comments as $comment)
            @if($comment->comment_id == 0)
                <div class="{{($comment->comment_id == 0)?'blog-author':''}} mb-4">
                    <div class="media align-items-center">
                        <img width="90px" height="90px" class="mr-3" src="{{($comment->avatar != null)?$comment->avatar:'/frontend/template/assets/img/blog/author.png'}}" alt="">
                        <div class="media-body">
                            <a href="javascript:void(0)">
                                <h4>{{$comment->name}}</h4>
                            </a>
                            <p>{{$comment->message}}</p>
                            <div class="d-flex align-items-center">
                                <p class="date ml-0">{{formatDate($comment->created_at, 'F d, Y')}} at {{formatDate($comment->created_at, 'g:i a')}}</p>
                                @if((isset(Auth::user()->id)) && Auth::user()->id != $comment->user_id)
                                    <div class="reply-btn">
                                        <a href="javascript:void(0)" class="btn-reply btn__reply text-uppercase" name-user="{{$comment->name}}" id-comment="{{$comment->id}}">reply</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @foreach($comments_reply as $comment2)
                @if($comment2->comment_id == $comment->id)
                    <div class="{{($comment2->comment_id == 0)?'blog-author':''}} mb-4" style="padding-left: 9rem;">
                        <div class="media align-items-center">
                            <img width="90px" height="90px" class="mr-3" src="{{($comment2->avatar != null)?$comment2->avatar:'/frontend/template/assets/img/blog/author.png'}}" alt="">
                            <div class="media-body">
                                <a href="javascript:void(0)">
                                    <h4>{{$comment2->name}}</h4>
                                </a>
                                <p>{{$comment2->message}}</p>
                                <div class="d-flex align-items-center">
                                    <p class="date ml-0">{{formatDate($comment2->created_at, 'F d, Y')}} at {{formatDate($comment2->created_at, 'g:i a')}}</p>
                                    @if((isset(Auth::user()->id)) && Auth::user()->id != $comment2->user_id)
                                        <div class="reply-btn">
                                            <a href="javascript:void(0)" class="btn-reply btn__reply text-uppercase" name-user="{{$comment2->name}}" id-comment="{{$comment2->id}}">reply</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    @endif
</div>
<div class="comment-form">
    <h4>Leave a Reply</h4>
    <form class="form-contact comment_form" action="{{route($linkFormComment, $id)}}" method="post" id="commentForm">
        @csrf
        <input type="hidden" name="user_id" value="{{(isset(Auth::user()->id))?Auth::user()->id:''}}">
        <input type="hidden" name="new_id" id="new_id" value="{{(isset($item->id))?$item->id:''}}">
        <input type="hidden" value="0" name="comment_id" id="comment_id" />
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" {{!Auth::check()?'disabled':''}} id="message" cols="30" rows="9" placeholder="{{!Auth::check()?'Đăng nhập để viết bình luận':'Viết bình luận vào đây'}}"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" id="btnSendMessage" class="button button-contactForm btn_1 boxed-btn" {{!Auth::check()?'disabled':''}}>Send Message</button>
        </div>
    </form>
</div>