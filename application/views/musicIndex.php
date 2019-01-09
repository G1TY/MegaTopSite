<br>
<!--<div class="container-fluid">-->
<!--    <div class="col-sm-6" id="timeFrom">-->
<!--        0:00-->
<!--    </div>-->
<!--    <div class="col-sm-6 text-right" id="timeTo">-->
<!--        0:00-->
<!--    </div>-->
<!--</div>-->
<!--<div class="container-fluid">-->
<!--    <div class="container-fluid">-->
<!--        <input id="timeLine" type="range" value="0" style="padding: 15px 0">-->
<!--    </div>-->
<!--</div>-->
<!--<br>-->
<!--<div id="btnBlock" class="container-fluid text-center">-->
<!--    <button class="brn btn-success" id="prev"><i id="btnIconPrev" class="glyphicon glyphicon-backward"></i></button>-->
<!--    <button class="brn btn-success" id="play"><i id="btnIcon" class="glyphicon glyphicon-play"></i></button>-->
<!--    <button class="brn btn-success" id="next"><i id="btnIconNext" class="glyphicon glyphicon-forward"></i></button>-->
<!--</div>-->
<!--<br>-->
<div class="container-fluid" id="musicList">

</div>
<div class="container-fluid" id="imgMusic">

</div>
<div class="container-fluid">
        0:00
</div>
<div class="container-fluid">
    <input id="timeLine" type="range" value="0" style="padding: 15px 0">
</div>
<div id="controlsBox" class="container-fluid">
    <button class="brn btn-success" id="prev"><i id="btnIconPrev" class="glyphicon glyphicon-backward"></i></button>
    <button class="brn btn-success" id="play"><i id="btnIcon" class="glyphicon glyphicon-play"></i></button>
    <button class="brn btn-success" id="next"><i id="btnIconNext" class="glyphicon glyphicon-forward"></i></button>
</div>
<script>
    $(document).ready(function(){

        let musicList = ["123.mp3","GONE.Fludd - МАМБЛ.mp3","LIZER - Пачка Сигарет.mp3"];
        let linkDir = '../../../music/';
        let audioLink = linkDir + musicList[0];
        let music = new Audio('../../../music/123.mp3');
        let isChanging = true;
        $(music).appendTo($(`#musicList`));

        $('#play').on("click",function () {
            music.paused ? music.play() : music.pause();
            $('#btnIcon').toggleClass('glyphicon-play').toggleClass('glyphicon-pause');
        });

        $(music).bind("timeupdate",function(){
            if (isChanging) {
                $('#timeLine')[0].max = music.duration;
                $('#timeLine')[0].value = music.currentTime;
            }
            let s = Math.floor(parseInt(music.currentTime % 60));
            let m = Math.floor(parseInt(music.currentTime / 60));
            if(s<10){
                s = '0'+s;
            }
            $('#time').html(m+':'+s);

        });

        $('#timeLine').on("mousedown",function(){
            isChanging = false;
        }).on("mouseup",function () {
            music.currentTime = $('#timeLine')[0].value;
            isChanging = true;
        });

        $('#timeLine').on("change",function(){
                music.currentTime = $('#timeLine')[0].value;
        });
        function getImg(id){
            $.ajax({
                url: '/Music/apiGetImg',
                method: 'POST',
                dataType:'json',
                data: {id:id},
                success: function(obj){
                    console.log('here');
                }
            });
        }
        getImg(1);

    });
</script>