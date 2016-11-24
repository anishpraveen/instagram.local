

setInterval(function() {
    var time = formatAMPM();
    document.getElementById('lClock').innerHTML=time;
}, 1000 * 60 * 1); // millisec * sec * min

/**
 * Gets current time and converts to AM PM time
 * 
 * @returns time (string)
 */
function formatAMPM() {
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var sec = date.getSeconds();
    var ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    //var strTime = hours + '.' + minutes + ':' + sec + ' ' + ampm;
    var strTime = hours + '.' + minutes + ' ' + ampm;
    return strTime;
}
