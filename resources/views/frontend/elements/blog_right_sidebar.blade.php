<div class="blog_right_sidebar">
    <aside class="single_sidebar_widget search_widget">
        <form action="{{route('fe_blog.search')}}" method="get">
            <div class="form-group">
                <div class="input-group mb-3">
                    <input type="text" name="key_word" value="{{(isset($key_word))?$key_word:''}}" class="form-control" placeholder='Tìm kiếm từ khóa'>
                    <div class="input-group-append">
                        <button class="btns" type="button"><i class="ti-search"></i></button>
                    </div>
                </div>
            </div>
            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Tìm kiếm</button>
        </form>
    </aside>

    <aside class="single_sidebar_widget post_category_widget">
        <h4 class="widget_title">Danh mục</h4>
        <ul class="list cat-list">
            @foreach($countCategoryBlog as $count)
            <li>
                <a href="{{route('category', $count['id'])}}" class="d-flex">
                    <p>{{$count['name']}}</p>
                    <p>({{$count['count']}})</p>
                </a>
            </li>
            @endforeach
        </ul>
    </aside>

    <aside class="single_sidebar_widget popular_post_widget">
        <h3 class="widget_title">Tin nóng</h3>
        @foreach($trending_now as $item)
        <div class="media post_item">
            <a href="{{route('details', $item->id)}}">
                <img src="{{$item->image}}" width="100%" alt="post">
            </a>
            <div class="media-body" style="width: 60%;">
                <a href="{{route('details', $item->id)}}">
                    <h3 style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 100%;">{{$item->title}}</h3>
                </a>
                <p>{{formatDate($item->created_at, 'F')}} {{formatDate($item->created_at, 'd')}}, {{formatDate($item->created_at, 'Y')}}</p>
            </div>
        </div>
        @endforeach
    </aside>
    <aside class="single_sidebar_widget tag_cloud_widget">
        <h4 class="widget_title">Thẻ</h4>
        <ul class="list">
            @foreach($list_tag as $item)
            <li>
                <a class="px-2" href="javascript:void(0)">{{$item->tag}} ({{$item->tag_count}})</a>
            </li>
            @endforeach
        </ul>
    </aside>

    <aside class="single_sidebar_widget instagram_feeds">
        <h4 class="widget_title">Instagram Feeds</h4>
        <ul class="instagram_row flex-wrap">
            <li>
                <a href="#">
                    <img class="img-fluid" src="/frontend/template/assets/img/post/post_5.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="/frontend/template/assets/img/post/post_6.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="/frontend/template/assets/img/post/post_7.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="/frontend/template/assets/img/post/post_8.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="/frontend/template/assets/img/post/post_9.png" alt="">
                </a>
            </li>
            <li>
                <a href="#">
                    <img class="img-fluid" src="/frontend/template/assets/img/post/post_10.png" alt="">
                </a>
            </li>
        </ul>
    </aside>


    <aside class="single_sidebar_widget newsletter_widget">
        <h4 class="widget_title">Bản tin</h4>

        <form action="#">
            <div class="form-group">
                <input type="email" class="form-control" onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'Enter email'" placeholder='Nhập email' required>
            </div>
            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                    type="submit">Theo dõi</button>
        </form>
    </aside>
</div>