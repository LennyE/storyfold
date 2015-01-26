$('.no-formatting[contenteditable]').on('paste',function(e) {
    e.preventDefault();
    var text = (e.originalEvent || e).clipboardData.getData('text/plain') || prompt('Paste something..');
    window.document.execCommand('insertText', false, text);
});
