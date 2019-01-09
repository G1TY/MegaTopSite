 <button class="btn btn-success" id = "play" onclick = qqq()>Click</button>
 <script>
     let link = "../../../music/123.mp3";
        let audio = new Audio(link);
		function qqq(){
            audio.play();
		}
    </script>