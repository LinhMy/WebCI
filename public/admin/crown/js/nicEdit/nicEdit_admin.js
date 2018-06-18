// hien thi chinh sua ơ textaere
bkLib.onDomLoaded(function() {
    nicEditors.editors.push(
        new nicEditor().panelInstance(
            document.getElementById('content-posting')
        )
    );
});