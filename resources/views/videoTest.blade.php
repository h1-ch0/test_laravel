<x-layout>  

    <title>HLS Streaming TEST</title>

    <!-- Vite 또는 Mix에서 컴파일된 CSS -->
    @if (app()->environment('local'))
        @vite('resources/css/app.css')
    @else
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @endif

    <!-- Video.js 기본 CSS -->
    {{-- <link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/video-js.css') }}" rel="stylesheet"> --}}
<section class="text-center mx-auto">video title?</section>
<section class="bg-gray-100 flex items-center justify-center ">

    <div class="w-full max-w-3xl mx-auto">
        <video
            id="hls-video"
            class="video-js vjs-big-play-centered vjs-fluid"
            controls
            preload="auto"
            {{-- poster="{{ asset('images/video-poster.jpg') }}" --}}
            data-setup='{}'
            width="640"
            height="360"
        >
            {{-- <source src="https://example.com/path/to/playlist.m3u8" type="application/x-mpegURL"> --}}
            <source src="http://stream1.shopch.jp/HLS/out2/prog_index.m3u8" type="application/x-mpegURL">
            {{-- <source src="http://192.168.195.131:8080/live/test1/test1/1.m3u8" type="application/x-mpegURL"> --}}
            <p class="vjs-no-js">
                브라우저가 비디오 재생을 지원하지 않습니다.
                <a href="https://videojs.com/html5-video-support/" target="_blank">지원 정보</a>
            </p>
        </video>
    </div>

    <!-- Vite 또는 Mix에서 컴파일된 JS -->
    @if (app()->environment('local'))
        @vite('resources/js/app.jsx')
    @else <!-- Mix로 컴파일된 JS Don't touch-->
        <script src="{{ mix('js/app.jsx') }}"></script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const player = videojs('hls-video', {
                autoplay: false,
                controls: true,
                fluid: true,
                liveui: true       // 라이브 스트리밍 UI 사용
            });

            // 오류 핸들링 예시
            player.on('error', function () {
                console.error('Video.js 재생 오류:', player.error());
            });
        });
    </script>
</section>
</x-layout>