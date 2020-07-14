//音声認識機能
var rec3 = new webkitSpeechRecognition();

//設定
  rec3.lang = 'ja-JP'; 
  rec3.interimResults = false;
  
//マッチする認識が無い
  rec3.onnomatch = function(){
  $("#recognizedText").text("もう一度試してください");
};

//発声が終了した時にこのイベントが走る
  rec3.onresult = function(event) {
  if (event.results.length > 0) {
    content.value = event.results[0][0].transcript;
  }
}