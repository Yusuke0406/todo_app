//音声認識機能
var rec = new webkitSpeechRecognition();
//設定
  rec.lang = 'ja-JP'; 

  rec.interimResults = false;

//発声が終了した時にこのイベントが走る
  rec.onresult = function(event) {
  if (event.results.length > 0) {
    cat_name.value = event.results[0][0].transcript;
  }
}


