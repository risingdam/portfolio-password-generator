function selectElementContent(el) {
    if (document.body.createTextRange) {
        range = document.body.createTextRange()
        range.moveToElementText(el)
        range.select()
    } else if (window.getSelection) {
        selection = window.getSelection()
        range = document.createRange()
        range.selectNodeContents(el)
        selection.removeAllRanges()
        selection.addRange(range)
    }
    document.execCommand('copy')
}

const elements = document.querySelectorAll('.box')
elements.forEach(el => {
    el.addEventListener('click', function () {
        selectElementContent(this)
    })
})
