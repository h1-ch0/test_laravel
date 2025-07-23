@props(['row'])

<h2 class="post-title"><a href="/lists/{{ $row['id'] }}">{{$row['id']}} : {{$row['subject']}} </a></h2>
{{-- <p>{{$row['content']}}</p> --}}
{{-- ㄴ 콘텐츠 그대로 가져오기 --}}
{{-- <p>{{ mb_substr($row['content'], 0, 10) }}</p> --}}
{{-- ㄴ 콘텐츠 10글자 가져오기(한글도 대응을 잘함) --}}
<p>{{ Str::words($row['content'],3,'...')}} </p>
{{-- ㄴ 콘텐츠 단어로 쪼개서 가져오기 내용, 단어, 끝마침--}}
{{-- <div class="post-meta">2025-07-17 | 작성자: 홍길동</div> --}}
{{-- <p class="post-excerpt">이곳은 게시물 간략 소개글이 들어갑니다. 중요한 내용을 요약하여 보여줍니다.</p> --}}