<!DOCTYPE html> 
<html>
     <head> 
        <meta charset="UTF-8"> 
        <title>뉴스 헤드라인</title> 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js">
        </script> 
        </head> 
        <body> 
            <h2>크롤링 테스트</h2> 
            <ul id="news-list">
                </ul> 
                <script> $(document).ready(function(){$.ajax({ url:'/crawler.php', method: 'GET', dataType: 'json', success: function(data){ $.each(data, function(i, headline){ $('#news-list').append('<li>' + headline + '</li>'); }); }, error: function(){ $('#news-list').append('<li>데이터를 불러오는 데 실패했습니다.</li>'); } }); });

                 </script> </body> </html>
  {{-- $.ajax({ url:'resources/views/crawler.php', method: 'GET', dataType: 'json', success: function(data){ $.each(data, function(i, headline){ $('#news-list').append('<li>' + headline + '</li>'); }); }, error: function(){ $('#news-list').append('<li>데이터를 불러오는 데 실패했습니다.</li>'); } }); --}}
