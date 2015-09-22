function openwrapper(url, x, y){
// Show popup elements
document.getElementById('iframewrapper').style.display='block'; 
document.getElementById('grey').style.display='block';

// Resize elements
document.getElementById('iframewrapper').style.width=x + "px";
document.getElementById('iframewrapper').style.height=y + "px";
document.getElementById('Iframe').style.height=(y - 10) + "px";

// Position elements
document.getElementById('iframewrapper').style.marginLeft="-" + (x / 2) + "px";
document.getElementById('iframewrapper').style.marginTop="-" + (y / 2) + "px";
document.getElementById('iframeX').style.left=(x - 15) + "px";

// Stop scroll event 'bubble'
 document.getElementById('Iframe').src = url;
$('#Iframe').on('mousewheel DOMMouseScroll', function(ev) {
ev.preventDefault();
});
}