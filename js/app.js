// Highlight code
hljs.highlightAll();

// Toggle code
document.onkeypress = function (e) {
    if(e.key == 'c')
    {
    	document.querySelector('.toggle-code').click();
    }
};