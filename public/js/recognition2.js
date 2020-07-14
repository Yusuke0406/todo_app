//音声認識機能
var rec2 = new webkitSpeechRecognition();

//設定
  rec2.lang = 'ja-JP'; 
  rec2.interimResults = false;

//マッチする認識が無い
  rec2.onnomatch = function(){
  $("#recognizedText").text("もう一度試してください");
};

//発声が終了した時にこのイベントが走る
  rec2.onresult = function(event) {
  if (event.results.length > 0) {
    content.value = event.results[0][0].transcript;
  }
}