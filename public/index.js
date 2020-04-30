function selectElementContent(element) {
    if (document.body.createTextRange) {
        const range = document.body.createTextRange()
        range.moveToElementText(element)
        range.select()
    } else if (window.getSelection) {
        const selection = window.getSelection()
        const range = document.createRange()
        range.selectNodeContents(element)
        selection.removeAllRanges()
        selection.addRange(range)
    }
    document.execCommand('copy')
}

const excls = document.querySelectorAll('.box')
excls.forEach(element => {
    element.addEventListener('click', () => {
        selectElementContent(this)
    })
})
