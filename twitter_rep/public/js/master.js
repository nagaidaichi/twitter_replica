function tweet(e) {
    var content = document.getElementById('tweetContent').value;
        if(!content) {
            return false;
        }else{
            return true;
        }
}

// document.getElementById("tweet").onclick = function() {
//     var content = document.getElementById("tweetContent").value;
//         if(!content){
//             return;
//         }
//   };